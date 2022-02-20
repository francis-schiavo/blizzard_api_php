<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\MythicKeystoneLeaderboard;

final class MythicKeystoneLeaderboardTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testMythicKeystoneLeaderboardIndex(): void
    {
        $client = new MythicKeystoneLeaderboard(cache: $this->cache);
        $this->assertObjectHasAttribute('current_leaderboards', $client->index(11));
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystoneLeaderboardDungeons(): void
    {
        $client = new MythicKeystoneLeaderboard(cache: $this->cache);
        $this->assertEquals(1523977199000, $client->get(11, 197, 641)->period_end_timestamp);
    }
}
