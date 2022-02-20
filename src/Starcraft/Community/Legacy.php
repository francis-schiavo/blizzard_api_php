<?php

namespace BlizzardApi\Starcraft\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\Region;
use BlizzardApi\Starcraft\Request;
use stdClass;

class Legacy extends Request
{
    /**
     * @param Region $region Account ID
     * @param int $realmId Realm ID
     * @param int $profileId Profile ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function profile(Region $region, int $realmId, int $profileId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/legacy/profile/{$region->id()}/$realmId/$profileId",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }

    /**
     * @param Region $region Account ID
     * @param int $realmId Realm ID
     * @param int $profileId Profile ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function ladders(Region $region, int $realmId, int $profileId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/legacy/profile/{$region->id()}/$realmId/$profileId/ladder",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }

    /**
     * @param Region $region Account ID
     * @param int $realmId Realm ID
     * @param int $profileId Profile ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function match(Region $region, int $realmId, int $profileId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/legacy/profile/{$region->id()}/$realmId/$profileId/matches",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }

    /**
     * @param Region $region Account ID
     * @param int $ladderId Ladder ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function ladder(Region $region, int $ladderId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/legacy/ladder/{$region->id()}/$ladderId",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }

    /**
     * @param Region $region Account ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function achievements(Region $region, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/legacy/data/achievements/{$region->id()}",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }

    /**
     * @param Region $region Account ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function rewards(Region $region, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/legacy/data/rewards/{$region->id()}",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }
}
