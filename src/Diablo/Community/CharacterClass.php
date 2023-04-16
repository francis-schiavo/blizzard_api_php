<?php

namespace BlizzardApi\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Diablo\Request;
use BlizzardApi\Enumerators\BaseURL;
use stdClass;

class CharacterClass extends Request
{
    /**
     * Returns information about a class
     *
     * @param string $classSlug Class slug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string $classSlug, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/hero/$classSlug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    /**
     * Returns information about a skill
     *
     * @param string $classSlug Artisan slug
     * @param string $skillSlug Recipe slug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function skill(string $classSlug, string $skillSlug, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/hero/$classSlug/skill/$skillSlug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
