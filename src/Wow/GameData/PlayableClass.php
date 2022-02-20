<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use stdClass;

class PlayableClass extends GenericDataEndpoint
{
    /**
     * Returns media for a playable class by ID
     * @param int $id The ID of the playable class
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/playable-class/$id", $this->defaultOptions($options));
    }

    /**
     * Returns the PVP Talent slots for a playable class by ID
     * @param int $id The ID of the playable class
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function pvpTalentSlots(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$id/pvp-talent-slots", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'playable-class';
    }
}