<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use Error;
use stdClass;

class Covenant extends GenericDataEndpoint
{
    /**
     * Returns an index of Soulbinds
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function soulbinds(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/covenant/soulbind/index", $this->defaultOptions($options));
    }

    /**
     * Returns a Soulbind by ID
     * @param int $id Soulbind ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function soulbind(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/covenant/soulbind/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of conduits
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function conduits(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/covenant/conduit/index", $this->defaultOptions($options));
    }

    /**
     * Returns a Soulbind by ID
     * @param int $id Soulbind ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function conduit(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/covenant/conduit/$id", $this->defaultOptions($options));
    }

    /**
     * Returns media for a covenant by ID
     * @param $id integer The ID of the covenant
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/covenant/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'covenant';
    }
}