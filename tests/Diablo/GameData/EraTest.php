<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Diablo\GameData\Era;
use BlizzardApi\Tests\ApiTestCase;

final class EraTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testEraIndex()
    {
        $client = new Era(cache: $this->cache);
        $this->assertObjectHasAttribute('era', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testEraGet()
    {
        $client = new Era(cache: $this->cache);
        $this->assertObjectHasAttribute('leaderboard', $client->get(1));
    }

    /**
     * @throws ApiException
     */
    public function testEraLeaderboard()
    {
        $client = new Era(cache: $this->cache);
        $this->assertObjectHasAttribute('row', $client->leaderboard(1, 'rift-barbarian'));
    }
}
