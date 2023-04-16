<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Heirloom;

final class HeirloomTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testHeirloomIndex(): void
    {
        $client = new Heirloom(cache: $this->cache);
        $data = $client->index();
        $this->assertCount(132, $data->heirlooms);
    }

    /**
     * @throws ApiException
     */
    public function testHeirloomGet(): void
    {
        $client = new Heirloom(cache: $this->cache);
        $data = $client->get(1);
        $this->assertEquals("Dignified Headmaster's Charge", $data->item->name->en_US);
    }
}
