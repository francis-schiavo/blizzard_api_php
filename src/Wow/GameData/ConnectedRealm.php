<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;

class ConnectedRealm extends GenericDataEndpoint
{
    use Searchable;

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_MONTH->value;
        $this->endpoint = 'connected-realm';
    }
}