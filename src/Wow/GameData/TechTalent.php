<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use stdClass;

class TechTalent extends GenericDataEndpoint
{
    /**
     * Returns an index of tech talents trees
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function trees(array $options = []): stdClass
    {
        $this->endpoint = 'pvp-talent';
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/tech-talent-tree/index", $this->defaultOptions($options));
    }

    /**
     * Returns a tech talents tree
     * @param int $id
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function tree(int $id, array $options = []): stdClass
    {
        $this->endpoint = 'pvp-talent';
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/tech-talent-tree/$id", $this->defaultOptions($options));
    }

    /**
     * Returns a tech talents media
     * @param int $id
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        $this->endpoint = 'pvp-talent';
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/tech-talent/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'tech-talent';
    }
}
