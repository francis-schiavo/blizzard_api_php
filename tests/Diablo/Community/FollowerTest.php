<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Diablo\Community\Follower;

final class FollowerTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testFollowerGet() {
        $client = new Follower(cache: $this->cache);
        $this->assertObjectHasAttribute('skills', $client->get('templar'));
    }
}
