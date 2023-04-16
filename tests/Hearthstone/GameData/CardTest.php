<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Hearthstone\GameData\Card;
use BlizzardApi\Tests\ApiTestCase;

final class CardTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testCardSearch()
    {
        $client = new Card(cache: $this->cache);
        $searchOptions = [
            'set' => 'rise-of-shadows', 'class' => 'mage', 'mana_cost' => 10, 'attack' => 4, 'health' => 10,
            'collectible' => 1, 'rarity' => 'legendary', 'type' => 'minion', 'minion_type' => 'dragon',
            'keyword' => 'battlecry', 'text_filter' => 'kalecgos', 'page' => 1, 'page_size' => 5,
            'sort' => 'name', 'order' => 'desc'
        ];
        $data = $client->search($searchOptions);
        $this->assertEquals(1, $data->cardCount);
        $this->assertEquals(53002, $data->cards[0]->id);
    }

    /**
     * @throws ApiException
     */
    public function testCardGet()
    {
        $client = new Card(cache: $this->cache);
        $this->assertObjectHasAttribute('slug', $client->get(254));
    }
}
