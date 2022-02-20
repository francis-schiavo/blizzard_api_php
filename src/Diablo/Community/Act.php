<?php

namespace BlizzardApi\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Diablo\Request;
use stdClass;

class Act extends Request
{
    /**
     * Returns a list of all acts
     *
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function index(array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/act",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    /**
     * Returns information about an act
     *
     * @param int $id Act ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(int $id, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/act/$id",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
