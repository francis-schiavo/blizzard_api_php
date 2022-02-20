<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use stdClass;

class Talent extends GenericDataEndpoint
{

    /**
     * Returns an index of PvP talents
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function pvpTalents(array $options = []): stdClass
    {
        $this->endpoint = 'pvp-talent';
        return $this->apiRequest("{$this->endpointUri()}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a PvP talent by ID
     * @param $id int The ID of the PvP talent
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function pvpTalent(int $id, array $options = []): stdClass
    {
        $this->endpoint = 'pvp-talent';
        return $this->apiRequest("{$this->endpointUri()}/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'talent';
    }
}
