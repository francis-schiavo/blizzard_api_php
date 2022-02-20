<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Title;

final class TitleTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testTitleIndex() {
        $client = new Title(cache: $this->cache);
        $this->assertObjectHasAttribute('titles', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testTitleGet() {
        $client = new Title(cache: $this->cache);
        $this->assertEquals('Lieutenant Commander', $client->get(10)->name->en_US);
    }
}
