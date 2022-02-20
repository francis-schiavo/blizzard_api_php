<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Hearthstone\GameData\Cardback;

final class CardbackTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testCardBackSearch() {
        $client = new Cardback(cache: $this->cache);
        $this->assertObjectHasAttribute('cardBacks', $client->search());
    }

    /**
     * @throws ApiException
     */
    public function testCardbackGet() {
        $client = new Cardback(cache: $this->cache);
        $this->assertObjectHasAttribute('slug', $client->get(1));
    }
}
