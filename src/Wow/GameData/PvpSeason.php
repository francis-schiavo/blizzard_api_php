<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\PvpBracket;
use stdClass;

class PvpSeason extends GenericDataEndpoint
{
    /**
     * Returns an index of PVP Leaderboards for a PVP Season
     * @param int $id The ID of the PvP season
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function leaderboards(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$id/pvp-leaderboard/index", $this->defaultOptions($options));
    }

    /**
     * Returns a PvP leaderboard of a specific PvP bracket for a PvP season
     * @param int $id The ID of the PvP season
     * @param PvpBracket $bracket The PvP bracket type
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function leaderboard(int $id, PvpBracket $bracket, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$id/pvp-leaderboard/$bracket->value", $this->defaultOptions($options));
    }

    /**
     * Returns an index of PVP rewards for a PvP season.
     * @param int $id The ID of the PvP season
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function rewards(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$id/pvp-reward/index", $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_WEEK->value;
        $this->endpoint = 'pvp-season';
    }
}
