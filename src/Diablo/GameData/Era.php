<?php

namespace BlizzardApi\Diablo\GameData;

use BlizzardApi\Cache\CacheDuration;

class Era extends GenericDataEndpoint
{
    protected function endpointSetup()
    {
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'era';
    }
}