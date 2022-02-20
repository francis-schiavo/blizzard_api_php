<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\WowToken;

final class WowTokenTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testWowTokenIndex() {
        $client = new WowToken(cache: $this->cache);
        $this->assertObjectHasAttribute('price', $client->index());
    }
}
