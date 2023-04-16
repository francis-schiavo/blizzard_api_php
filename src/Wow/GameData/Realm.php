<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;
use stdClass;

class Realm extends GenericDataEndpoint
{
    use Searchable;

    /**
     * @param int|string $id Realm ID or slug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(int|string $id, array $options = []): stdClass
    {
        $url = sprintf('%s/%s', $this->endpointUri(), $id);
        return $this->apiRequest($url, $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'realm';
    }
}