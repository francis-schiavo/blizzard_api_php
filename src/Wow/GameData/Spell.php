<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;
use Error;
use stdClass;

class Spell extends GenericDataEndpoint
{
    use Searchable;

    /**
     * @param array $options
     * @return stdClass
     */
    public function index(array $options = []): stdClass
    {
        throw new Error("Spell endpoint doesn't have an index method.");
    }


    /**
     * Returns media for a spell by ID
     * @param $id int The ID of the spell
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/spell/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'spell';
    }
}