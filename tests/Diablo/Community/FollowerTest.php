<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Diablo\Community\Follower;
use BlizzardApi\Tests\ApiTestCase;

final class FollowerTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testFollowerGet()
    {
        $client = new Follower(cache: $this->cache);
        $this->assertObjectHasAttribute('skills', $client->get('templar'));
    }
}
