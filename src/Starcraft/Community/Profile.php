<?php

namespace BlizzardApi\Starcraft\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\Region;
use BlizzardApi\Starcraft\Request;
use stdClass;

class Profile extends Request
{
    /**
     * @param Region $region Account ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function static(Region $region, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/static/profile/{$region->id()}",
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
    public function metadata(Region $region, int $realmId, int $profileId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/metadata/profile/{$region->id()}/$realmId/$profileId/ladder",
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
    public function profile(Region $region, int $realmId, int $profileId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/profile/{$region->id()}/$realmId/$profileId/ladder",
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
    public function ladderSummary(Region $region, int $realmId, int $profileId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/profile/{$region->id()}/$realmId/$profileId/ladder/summary",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }

    /**
     * @param Region $region Account ID
     * @param int $realmId Realm ID
     * @param int $profileId Profile ID
     * @param int $ladderId Ladder ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function ladder(Region $region, int $realmId, int $profileId, int $ladderId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/profile/{$region->id()}/$realmId/$profileId/ladder/$ladderId",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }
}
