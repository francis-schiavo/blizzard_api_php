<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Wow\Request;
use Error;
use stdClass;

class MythicRaidLeaderboard extends Request
{
    public function index()
    {
        throw new Error('The MythicRaidLeaderboard endpoint does not have an index method.');
    }

    /**
     * Returns the leaderboard for a given raid and faction
     * @param string $raid The raid for a leaderboard
     * @param string $faction Player faction (`alliance` or `horde`)
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string $raid, string $faction, array $options = []): stdClass
    {
        $raidBySlug = $this->createSlug($raid);
        $factionBySlug = $this->createSlug($faction);
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::game_data)}/leaderboard/hall-of-fame/$raidBySlug/$factionBySlug",
            array_merge(['namespace' => EndpointNamespace::dynamic, 'ttl' => CacheDuration::CACHE_DAY->value, 'version' => EndpointVersion::retail], $options)
        );
    }
}
