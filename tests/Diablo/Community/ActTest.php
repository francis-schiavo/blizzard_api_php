<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Diablo\Community\Act;

final class ActTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testActIndex() {
        $client = new Act(cache: $this->cache);
        $this->assertObjectHasAttribute('acts', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testActGet() {
        $client = new Act(cache: $this->cache);
        $this->assertObjectHasAttribute('quests', $client->get(1));
    }
}
