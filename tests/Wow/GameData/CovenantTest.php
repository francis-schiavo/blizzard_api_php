<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Covenant;

final class CovenantTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testCovenantIndex(): void
    {
        $client = new Covenant(cache: $this->cache);
        $this->assertObjectHasAttribute('covenants', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testCovenantGet(): void
    {
        $client = new Covenant(cache: $this->cache);
        $this->assertEquals('Night Fae', $client->get(3)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testSoulbinds(): void
    {
        $client = new Covenant(cache: $this->cache);
        $this->assertObjectHasAttribute('soulbinds', $client->soulbinds());
    }

    /**
     * @throws ApiException
     */
    public function testSoulbind(): void
    {
        $client = new Covenant(cache: $this->cache);
        $this->assertEquals('Niya', $client->soulbind(1)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testConduits(): void
    {
        $client = new Covenant(cache: $this->cache);
        $this->assertObjectHasAttribute('conduits', $client->conduits());
    }

    /**
     * @throws ApiException
     */
    public function testConduit(): void
    {
        $client = new Covenant(cache: $this->cache);
        $this->assertEquals('Fueled by Violence', $client->conduit(10)->name->en_US);
    }
}
