<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Enumerators\PvpBracket;
use stdClass;

class PvpRegion extends GenericDataEndpoint
{
    /**
     * Returns an index of seasons within a region
     * @param int $region_id The ID of the region
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function seasons(int $region_id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$region_id/pvp-season/index", $this->defaultOptions($options));
    }

    protected function defaultOptions($options = []): array
    {
        return array_merge(['namespace' => $this->namespace, 'version' => EndpointVersion::classic, 'ttl' => $this->ttl], $options);
    }

    /**
     * Returns a seasons within a region
     * @param int $region_id The ID of the region
     * @param int $season_id The ID of the season
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function season(int $region_id, int $season_id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$region_id/pvp-season/$season_id", $this->defaultOptions($options));
    }

    /**
     * Returns a leaderboard index for a season
     * @param int $region_id The ID of the region
     * @param int $season_id The ID of the season
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function leaderboards(int $region_id, int $season_id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$region_id/pvp-season/$season_id/pvp-leaderboard/index", $this->defaultOptions($options));
    }

    /**
     * Returns a leaderboard index for a season
     * @param int $region_id The ID of the region
     * @param int $season_id The ID of the season
     * @param PvpBracket $bracket
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function leaderboard(int $region_id, int $season_id, PvpBracket $bracket, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$region_id/pvp-season/$season_id/pvp-leaderboard/$bracket->value", $this->defaultOptions($options));
    }

    /**
     * Returns rewards for a season
     * @param int $region_id The ID of the region
     * @param int $season_id The ID of the season
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function rewards(int $region_id, int $season_id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$region_id/pvp-season/$season_id/pvp-reward/index", $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'pvp-region';
    }
}
