<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;

class Region extends GenericDataEndpoint
{
    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'region';
    }
}