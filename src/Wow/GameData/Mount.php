<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;

class Mount extends GenericDataEndpoint
{
    use Searchable;

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'mount';
    }
}