<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\MythicRaidLeaderboard;

final class MythicRaidLeaderboardTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testMythicKeystoneIndex(): void
    {
        $client = new MythicRaidLeaderboard(cache: $this->cache);
        $this->assertEquals('hall-of-fame', $client->get('uldir', 'alliance')->criteria_type);
    }
}
