<?php

namespace BlizzardApi\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Diablo\Request;
use stdClass;

class Follower extends Request
{
    /**
     * Returns information about a follower
     *
     * @param string $followerSlug Class slug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string $followerSlug, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/follower/$followerSlug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
