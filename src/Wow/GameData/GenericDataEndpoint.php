<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Enumerators\Region;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Cache\ICacheProvider;
use BlizzardApi\Wow\Request;
use stdClass;

abstract class GenericDataEndpoint extends Request
{
    /**
     * @var string Endpoint URI
     */
    protected string $endpoint;

    /**
     * @var EndpointNamespace Endpoint namespace
     */
    protected EndpointNamespace $namespace;

    /**
     * @var int Cache duration
     */
    protected int $ttl;

    /**
     * @param Region|null $region One of the supported API regions: Region::US, REGION_EU, REGION_KO or REGION_TW
     * @param string|null $accessToken A valid token created by the OAuth2 authorization_code flow
     * @param ICacheProvider|null $cache An implementation of ICacheProvider
     * @throws ApiException
     */
    public function __construct(Region|null $region = null, string|null $accessToken = null, ICacheProvider|null $cache = null)
    {
        parent::__construct($region, $accessToken, $cache);
        $this->endpointSetup();
    }

    protected abstract function endpointSetup();

    /**
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function index(array $options = []): stdClass
    {
        $url = sprintf('%s/index', $this->endpointUri());
        return $this->apiRequest($url, $this->defaultOptions($options));
    }

    /**
     * @param string|null $variant
     * @param BaseURL $scope
     * @return string
     */
    protected function endpointUri(string $variant = null, BaseURL $scope = BaseURL::game_data): string
    {
        $uri = $variant ? "$this->endpoint-$variant" : $this->endpoint;
        return sprintf('%s/%s', $this->baseUrl($scope), $uri);
    }

    protected function defaultOptions($options = []): array
    {
        return array_merge(['namespace' => $this->namespace, 'version' => EndpointVersion::retail, 'ttl' => $this->ttl], $options);
    }

    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function get(int $id, array $options = []): stdClass
    {
        $url = sprintf('%s/%d', $this->endpointUri(), $id);
        return $this->apiRequest($url, $this->defaultOptions($options));
    }
}