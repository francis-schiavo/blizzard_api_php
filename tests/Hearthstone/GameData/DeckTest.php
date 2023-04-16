<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Hearthstone\GameData\Deck;
use BlizzardApi\Tests\ApiTestCase;

final class DeckTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testDeckGet()
    {
        $client = new Deck(cache: $this->cache);
        $this->assertObjectHasAttribute('hero', $client->get('AAECAQcG+wyd8AKS+AKggAOblAPanQMMS6IE/web8wLR9QKD+wKe+wKz/AL1gAOXlAOalAOSnwMA'));
    }
}
