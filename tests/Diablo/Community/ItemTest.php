<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Diablo\Community\Item;
use BlizzardApi\Tests\ApiTestCase;

final class ItemTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testItemGet()
    {
        $client = new Item(cache: $this->cache);
        $this->assertEquals('unique_sword_2h_104_x1_demonhunter_male', $client->get('corrupted-ashbringer-Unique_Sword_2H_104_x1')->icon);
    }
}
