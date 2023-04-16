<?php

namespace BlizzardApi\Diablo\GameData;

use BlizzardApi\Cache\CacheDuration;

class Season extends GenericDataEndpoint
{
    protected function endpointSetup(): void
    {
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'season';
    }
}