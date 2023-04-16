<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Toy;

final class ToyTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testHeirloomIndex(): void
    {
        $client = new Toy(cache: $this->cache);
        $data = $client->index();
        $this->assertObjectHasAttribute('toys', $data);
    }

    /**
     * @throws ApiException
     */
    public function testToyGet(): void
    {
        $client = new Toy(cache: $this->cache);
        $data = $client->get(30);
        $this->assertEquals('Murloc Costume', $data->item->name->en_US);
    }
}
