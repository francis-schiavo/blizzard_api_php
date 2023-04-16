<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Diablo\Community\Act;
use BlizzardApi\Tests\ApiTestCase;

final class ActTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testActIndex()
    {
        $client = new Act(cache: $this->cache);
        $this->assertObjectHasAttribute('acts', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testActGet()
    {
        $client = new Act(cache: $this->cache);
        $this->assertObjectHasAttribute('quests', $client->get(1));
    }
}
