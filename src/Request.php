<?php

namespace BlizzardApi;

use BlizzardApi\Cache\ICacheProvider;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Enumerators\Game;
use BlizzardApi\Enumerators\OAuth2Scope;
use BlizzardApi\Enumerators\Region;
use Exception;
use stdClass;

class Request
{
    /**
     * @var string $accessToken Cached access token.
     */
    protected string $accessToken;

    /**
     * @var Region $region API region
     */
    protected Region $region;

    /**
     * @var Game $game Game name
     */
    protected Game $game = Game::None;

    /**
     * @var ICacheProvider|null $cache Cache provider
     */
    protected ICacheProvider|null $cache;

    /**
     * Creates an interface for calling API Endpoints
     * @param Region|null $region One of the supported API regions: Region::US, REGION_EU, REGION_KO or REGION_TW
     * @param string|null $accessToken Allow to specify an access_token for the requests, useful for specifying a
     *   token obtained using authorization_code flow.
     * @param ICacheProvider|null $cache An implementation of ICacheProvider
     * @throws ApiException In case a token cannot be obtained.
     */
    public function __construct(Region|null $region = null, string|null $accessToken = '', ICacheProvider|null $cache = null)
    {
        $this->region = $region ?: Configuration::$region;
        $this->cache = $cache;

        # Using an externally created token
        if ($accessToken) {
            $this->accessToken = $accessToken;
        } elseif (Configuration::$storeAccessTokenInSession && $this->fetch_session_token($accessToken)) {
            # Checking for a token in the session
            $this->accessToken = $accessToken;
        } else {
            if (Configuration::$storeAccessTokenInCache && $this->fetch_cached_token($accessToken)) {
                $this->accessToken = $accessToken;
            } else {
                # Creating a new client_credentials token
                $this->accessToken = $this->createAccessToken();
            }
        }
    }

    /**
     * Attempts to locate a cached accessToken
     * @param string|null $accessToken Reference to the accessToken variable
     * @return bool True if a token was found
     */
    private function fetch_session_token(string|null &$accessToken): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            return false;
        }

        if (!isset($_SESSION[Configuration::$accessTokenSessionKey])) {
            return true;
        }

        $accessToken = $_SESSION[Configuration::$accessTokenSessionKey];
        return false;
    }

    /**
     * Attempts to locate a cached accessToken
     * @param string|null $accessToken Reference to the accessToken variable
     * @return bool True if a token was found
     */
    private function fetch_cached_token(string|null &$accessToken): bool
    {
        if (!$this->cache) {
            return false;
        }

        return $this->cache->retrieve('access_token', $accessToken);
    }

    /**
     * Used to create a new access token using the OAuth2
     * Api client and secret must be configured using the BlizzardAPi\Config class.
     *
     * If the argument $code is provided the authorization code flow will be used:
     * @see https://develop.battle.net/documentation/guides/using-oauth/authorization-code-flow
     *
     * If no $code argument is provided an access token will be created using the client credentials flow
     * @see https://develop.battle.net/documentation/guides/using-oauth/client-credentials-flow
     *
     * @param string|null $code An optional authorization code
     * @return string
     * @throws ApiException
     */
    public function createAccessToken(string $code = null): string
    {
        if ($code !== null) {
            $postFields = [
                'grant_type' => 'authorization_code',
                'redirect_uri' => Configuration::$redirectURI,
                'code' => $code
            ];
        } else {
            $postFields = ['grant_type' => 'client_credentials'];
        }

        $curl_handle = curl_init();
        try {
            curl_setopt($curl_handle, CURLOPT_URL, $this->baseUrl(BaseURL::oauth_token));
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($curl_handle, CURLOPT_USERPWD, Configuration::$apiKey . ':' . Configuration::$apiSecret);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data']);
            $response = curl_exec($curl_handle);
            $status = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

            if ($status !== 200) {
                throw new ApiException("Failed to create client_credentials access token. Code $status");
            }

            $token = json_decode($response);
            $access_token = $token->access_token;
            $this->cache?->store('access_token', $access_token, $token->expires_in);

            return $access_token;
        } finally {
            curl_close($curl_handle);
        }
    }

    /**
     * @param BaseURL $scope API scope to apply the base URL
     * @return string Base URL to call endpoints
     */
    protected function baseUrl(BaseURL $scope): string
    {
        return sprintf($scope->value, $this->region->value, $this->game->value);
    }

    /**
     * Creates a valid url for authorizing a user using BNet OAuth2 provider for the current region.
     * @see https://develop.battle.net/documentation/guides/using-oauth/authorization-code-flow
     *
     * @param OAuth2Scope ...$scopes The desired OAuth2 scopes.
     * @return string The url for the login button.
     */
    public function authorizationURL(OAuth2Scope ...$scopes): string
    {
        $queryString = http_build_query([
            'auth_flow' => 'auth_code',
            'client_id' => Configuration::$apiKey,
            'scope' => implode(' ', $scopes),
            'response_type' => 'code',
            'redirect_uri' => Configuration::$redirectURI
        ]);
        return sprintf("%s?%s", $this->baseUrl(BaseURL::oauth_auth), $queryString);
    }

    /**
     * @param string $url The endpoint url
     * @param array $options An array containing options for a single request
     * @return stdClass|array
     * @throws ApiException
     */
    public function apiRequest(string $url, array $options = []): stdClass|array
    {
        $url = $this->prepareURL($url, $options);

        $data = '';
        if (is_object($this->cache) && $this->cache->retrieve($url, $data)) {
            return json_decode($data);
        }

        $responseCode = 0;
        $data = $this->execute($url, $responseCode);
        if ($responseCode === 200) {
            if ($this->cache) {
                $ttl = $options['ttl'] ?? 86400;
                $this->cache->store($url, $data, $ttl);
            }
        } else {
            throw new ApiException("Request to '$url' failed", $responseCode);
        }
        return json_decode($data);
    }

    /**
     * @param string $url The endpoint URL
     * @param array $options Options and additional query string parameters
     * @return string Well formed URL
     */
    protected function prepareURL(string $url, array $options): string
    {
        $queryString = $this->extractQueryString($options);
        if ($queryString) {
            if (str_contains($url, '?')) {
                $url .= "&$queryString";
            } else {
                $url .= "?$queryString";
            }
        }
        return $url;
    }

    /**
     * @param array $options An array containing options for a single request
     * @return string The query string params for this request
     */
    private function extractQueryString(array &$options): string
    {
        $defaultOptions = [
            'ttl' => 86400,
            'region' => $this->region,
            'accessToken' => $this->accessToken,
            'namespace' => EndpointNamespace::static,
            'version' => EndpointVersion::retail
        ];

        $queryString = array_diff_key($options, $defaultOptions);

        if (array_key_exists('namespace', $options)) {
            $queryString['namespace'] = $this->endpointNamespace($options['namespace'], $options['version']);
        }

        $options = array_intersect_key($options, $defaultOptions);
        return http_build_query($queryString);
    }

    /**
     * @param EndpointNamespace $namespace The endpoint namespace
     * @param EndpointVersion $version The desired version of the endpoint
     * @return string The appropriate namespace for the endpoint namespace, version and region
     */
    protected function endpointNamespace(EndpointNamespace $namespace, EndpointVersion $version = EndpointVersion::retail): string
    {
        return sprintf($namespace->value, sprintf($version->value, $this->region->value));
    }

    /**
     * @param string $url API endpoint full url with querystring params
     * @param int $responseStatus HTTP response code
     * @return string|null JSON object response
     */
    public function execute(string $url, int &$responseStatus): string|null
    {
        try {
            $curl_handle = curl_init();
            try {
                curl_setopt($curl_handle, CURLOPT_URL, $url);
                curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl_handle, CURLOPT_HTTPHEADER, ["Authorization: Bearer $this->accessToken"]);
                $response = curl_exec($curl_handle);
                $responseStatus = (int)curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
            } catch (Exception) {
                $responseStatus = 0;
                $response = null;
            } finally {
                curl_close($curl_handle);
            }
        } finally {
            return $response;
        }
    }

    /**
     * @param string $input Original name
     * @return string slugfied version of the input
     */
    protected function createSlug(string $input): string
    {
        return rawurlencode(str_replace([' ', "'"], ['-', ''], mb_strtolower($input)));
    }
}