<?php

namespace BlizzardApi\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Diablo\Request;
use stdClass;

class ItemType extends Request
{
    /**
     * Returns information about item types
     *
     * @param array $options Request options
     * @return array
     * @throws ApiException
     */
    public function index(array $options = []): array
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/item-type",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    /**
     * Returns information about item types
     *
     * @param string $itemTypeSlug Item type slug
     * @param array $options Request options
     * @return array
     * @throws ApiException
     */
    public function get(string $itemTypeSlug, array $options = []): array
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/item-type/$itemTypeSlug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
