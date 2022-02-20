<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;
use stdClass;

class AzeriteEssence extends GenericDataEndpoint
{
    use Searchable;

    /**
     * Returns media for an azerite essence by ID
     * @param int $id The ID of the azerite essence
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {

        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/azerite-essence/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_HOUR->value;
        $this->endpoint = 'azerite-essence';
    }
}
