<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Diablo\GameData\Season;
use BlizzardApi\Tests\ApiTestCase;

final class SeasonTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testSeasonIndex()
    {
        $client = new Season(cache: $this->cache);
        $this->assertObjectHasAttribute('season', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testSeasonGet()
    {
        $client = new Season(cache: $this->cache);
        $this->assertObjectHasAttribute('leaderboard', $client->get(1));
    }

    /**
     * @throws ApiException
     */
    public function testSeasonLeaderboard()
    {
        $client = new Season(cache: $this->cache);
        $this->assertObjectHasAttribute('row', $client->leaderboard(1, 'rift-barbarian'));
    }
}
