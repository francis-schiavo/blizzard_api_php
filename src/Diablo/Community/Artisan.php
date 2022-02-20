<?php

namespace BlizzardApi\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Diablo\Request;
use stdClass;

class Artisan extends Request
{
    /**
     * Returns information about an artisan
     *
     * @param string $artisan_slug Artisan slug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string $artisan_slug, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/artisan/$artisan_slug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    /**
     * Returns information about a recipe
     *
     * @param string $artisanSlug Artisan slug
     * @param string $recipeSlug Recipe slug
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function recipe(string $artisanSlug, string $recipeSlug, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/data/artisan/$artisanSlug/recipe/$recipeSlug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
