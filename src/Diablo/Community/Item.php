<?php

namespace BlizzardApi\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Diablo\Request;
use stdClass;

class Item extends Request
{
    /**
     * Returns information about item types
     *
     * @param string $itemSlugAndId Item type slug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string $itemSlugAndId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/item/$itemSlugAndId",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
