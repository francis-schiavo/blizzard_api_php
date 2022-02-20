<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Wow\Request;
use stdClass;

class MythicKeystoneLeaderboard extends Request
{
    /**
     * Returns an index of Mythic Keystone Leaderboard dungeon instances for a connected realm
     * @param int $connectedRealmId The ID of the connected realm
     * @param array $options Request options
     * @return stdClass
     * @throws
     */
    public function index(int $connectedRealmId, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri($connectedRealmId)}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a weekly Mythic Keystone Leaderboard by period
     * @param int $connectedRealm The ID of the connected realm
     * @param int $dungeon The ID of the dungeon
     * @param int $period The unique identifier for the leaderboard period
     * @param array $options Request options
     * @return stdClass
     * @throws
     */
    public function get(int $connectedRealm, int $dungeon, int $period, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri($connectedRealm)}/$dungeon/period/$period", $this->defaultOptions($options));
    }

    private function defaultOptions($options = []): array
    {
        return array_merge(['namespace' => EndpointNamespace::dynamic, 'version' => EndpointVersion::retail, 'ttl' => CacheDuration::CACHE_DAY->value], $options);
    }

    /**
     * @param int $connectedRealmId
     * @return string
     */
    private function endpointUri(int $connectedRealmId): string
    {
        return "{$this->baseUrl(BaseURL::game_data)}/connected-realm/{$connectedRealmId}/mythic-leaderboard";
    }
}