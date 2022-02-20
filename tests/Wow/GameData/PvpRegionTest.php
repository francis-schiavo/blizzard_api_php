<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\PvpBracket;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\PvpRegion;

final class PvpRegionTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPvpRegionIndex() {
        $client = new PvpRegion(cache: $this->cache);
        $this->assertObjectHasAttribute('pvp_regions', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testPvpRegionSeasons() {
        $client = new PvpRegion(cache: $this->cache);
        $this->assertObjectHasAttribute('seasons', $client->seasons(1));
    }

    /**
     * @throws ApiException
     */
    public function testPvpRegionSeason(): void
    {
        $client = new PvpRegion(cache: $this->cache);
        $this->assertObjectHasAttribute('season_start_timestamp', $client->season(1, 2));
    }

    /**
     * @throws ApiException
     */
    public function testPvpRegionLeaderboards() {
        $client = new PvpRegion(cache: $this->cache);
        $this->assertObjectHasAttribute('leaderboards', $client->leaderboards(1, 2));
    }

    /**
     * @throws ApiException
     */
    public function testPvpRegionLeaderboard() {
        $client = new PvpRegion(cache: $this->cache);
        $this->assertObjectHasAttribute('entries', $client->leaderboard(1, 2, PvpBracket::x3));
    }

    /**
     * @throws ApiException
     */
    public function testPvpRegionRewards() {
        $client = new PvpRegion(cache: $this->cache);
        $this->assertObjectHasAttribute('rewards', $client->rewards(1, 2));
    }
}
