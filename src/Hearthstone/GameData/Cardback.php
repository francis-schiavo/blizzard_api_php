<?php

namespace BlizzardApi\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Hearthstone\Request;
use stdClass;

class Cardback extends Request
{
    /**
     * @param array $searchOptions
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function search(array $searchOptions = [], array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/cardbacks",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options, $searchOptions)
        );
    }

    /**
     * @param string|int $idOrSlug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string|int $idOrSlug, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/cardbacks/$idOrSlug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
