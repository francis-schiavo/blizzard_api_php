<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Enumerators\PvpBracket;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\PvpSeason;

final class PvpSeasonTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPvpSeasonIndex()
    {
        $client = new PvpSeason(cache: $this->cache);

        $this->assertObjectHasAttribute('seasons', $client->index());

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertObjectHasAttribute('seasons', $client->index(['version' => EndpointVersion::classic]));
    }

    /**
     * @throws ApiException
     */
    public function testPvpSeasonGet(): void
    {
        $client = new PvpSeason(cache: $this->cache);

        $this->assertObjectHasAttribute('season_start_timestamp', $client->get(27));

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertObjectHasAttribute('season_start_timestamp', $client->get(2, ['version' => EndpointVersion::classic]));
    }

    /**
     * @throws ApiException
     */
    public function testPvpSeasonLeaderboards()
    {
        $client = new PvpSeason(cache: $this->cache);
        $this->assertObjectHasAttribute('leaderboards', $client->leaderboards(27));
    }

    /**
     * @throws ApiException
     */
    public function testPvpSeasonLeaderboard()
    {
        $client = new PvpSeason(cache: $this->cache);
        $this->assertObjectHasAttribute('entries', $client->leaderboard(27, PvpBracket::x3));
    }

    /**
     * @throws ApiException
     */
    public function testPvpSeasonRewards()
    {
        $client = new PvpSeason(cache: $this->cache);
        $this->assertObjectHasAttribute('rewards', $client->rewards(27));
    }
}
