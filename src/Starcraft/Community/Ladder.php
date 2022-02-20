<?php

namespace BlizzardApi\Starcraft\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\Region;
use BlizzardApi\Starcraft\Request;
use stdClass;

class Ladder extends Request
{
    /**
     * @param Region $region Account ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function grandmaster(Region $region, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/ladder/grandmaster/{$region->id()}",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }

    /**
     * @param Region $region Account ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function season(Region $region, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/ladder/season/{$region->id()}",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }
}
