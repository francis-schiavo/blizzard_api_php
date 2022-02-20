<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\PowerType;

final class PowerTypeTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPlayableClassIndex() {
        $client = new PowerType(cache: $this->cache);
        $this->assertObjectHasAttribute('power_types', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testPlayableClassGet(): void
    {
        $client = new PowerType(cache: $this->cache);
        $this->assertEquals('Mana', $client->get(0)->name->en_US);
    }
}
