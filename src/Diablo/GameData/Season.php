<?php

namespace BlizzardApi\Diablo\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;

class Season extends GenericDataEndpoint
{
    protected function endpointSetup()
    {
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'season';
    }
}