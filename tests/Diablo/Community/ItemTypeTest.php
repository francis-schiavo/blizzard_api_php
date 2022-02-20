<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Diablo\Community\ItemType;

final class ItemTypeTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testItemTypeIndex() {
        $client = new ItemType(cache: $this->cache);
        $this->assertIsArray($client->index());
    }

    /**
     * @throws ApiException
     */
    public function testItemTypeGet() {
        $client = new ItemType(cache: $this->cache);
        $this->assertIsArray($client->get('sword2h'));
    }
}
