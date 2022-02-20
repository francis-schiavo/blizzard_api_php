<?php

namespace BlizzardApi\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Hearthstone\Request;
use stdClass;

class Deck extends Request
{
    /**
     * @param string|int $id
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string|int $id, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/deck/$id",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
