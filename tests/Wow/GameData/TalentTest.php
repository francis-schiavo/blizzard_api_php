<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Talent;

final class TalentTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testTalentIndex() {
        $client = new Talent(cache: $this->cache);
        $this->assertObjectHasAttribute('talents', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testTalentGet() {
        $client = new Talent(cache: $this->cache);
        $this->assertEquals(15, $client->get(23106)->level);
    }

    /**
     * @throws ApiException
     */
    public function testPvpTalents() {
        $client = new Talent(cache: $this->cache);
        $this->assertObjectHasAttribute('pvp_talents', $client->pvpTalents());
    }

    /**
     * @throws ApiException
     */
    public function testPvpTalent() {
        $client = new Talent(cache: $this->cache);
        $this->assertEquals('Bane of Fragility', $client->pvpTalent(11)->spell->name->en_US);
    }
}
