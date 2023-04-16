<?php

namespace BlizzardApi\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Diablo\Request;
use BlizzardApi\Enumerators\BaseURL;
use stdClass;

class Profile extends Request
{
    /**
     * Returns information about an account
     *
     * @param string $battletag User battletag
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function index(string $battletag, array $options = []): stdClass
    {
        $battletag = $this->parseBattletag($battletag);
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/profile/$battletag/",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    private function parseBattletag($battletag): string
    {
        return str_replace($battletag, '#', '-');
    }

    /**
     * Returns information about a hero
     *
     * @param string $battletag User battletag
     * @param int $heroId Hero ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function hero(string $battletag, int $heroId, array $options = []): stdClass
    {
        $battletag = $this->parseBattletag($battletag);
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/profile/$battletag/hero/$heroId",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    /**
     * Returns information about a hero
     *
     * @param string $battletag User battletag
     * @param int $heroId Hero ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function heroItems(string $battletag, int $heroId, array $options = []): stdClass
    {
        $battletag = $this->parseBattletag($battletag);
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/profile/$battletag/hero/$heroId/items",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    /**
     * Returns information about a hero
     *
     * @param string $battletag User battletag
     * @param int $heroId Hero ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function heroFollowerItems(string $battletag, int $heroId, array $options = []): stdClass
    {
        $battletag = $this->parseBattletag($battletag);
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/profile/$battletag/hero/$heroId/follower-items",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
