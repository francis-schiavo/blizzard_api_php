<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;
use Error;
use stdClass;

class Media extends GenericDataEndpoint
{
    use Searchable;

    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     */
    public function get(int $id, array $options = []): stdClass
    {
        throw new Error('The Media endpoint does not have a get method.');
    }

    /**
     * @param array $options
     * @return stdClass
     */
    public function index(array $options = []): stdClass
    {
        throw new Error('The Media endpoint does not have an index method.');
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'media';
    }
}