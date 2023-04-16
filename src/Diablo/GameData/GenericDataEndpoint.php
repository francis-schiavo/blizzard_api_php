<?php

namespace BlizzardApi\Diablo\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\ICacheProvider;
use BlizzardApi\Diablo\Request;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\Region;
use stdClass;

abstract class GenericDataEndpoint extends Request
{
    /**
     * @var string Endpoint URI
     */
    protected string $endpoint;

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
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/$this->endpoint/", $this->defaultOptions($options));
    }

    protected function defaultOptions($options = []): array
    {
        return array_merge(['ttl' => $this->ttl], $options);
    }

    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function get(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/$this->endpoint/$id", $this->defaultOptions($options));
    }

    /**
     * @param int $id
     * @param string $leaderboard_id
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function leaderboard(int $id, string $leaderboard_id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/$this->endpoint/$id/leaderboard/$leaderboard_id", $this->defaultOptions($options));
    }
}
