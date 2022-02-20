<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Request;
use Error;
use stdClass;

class WowToken extends GenericDataEndpoint
{
    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     */
    public function get(int $id, array $options = []): stdClass
    {
        throw new Error('The WowToken endpoint does not have a get method.');
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_HOUR->value;
        $this->endpoint = 'token';
    }
}