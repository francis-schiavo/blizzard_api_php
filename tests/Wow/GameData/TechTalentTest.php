<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Spell;
use BlizzardApi\Wow\GameData\TechTalent;

final class TechTalentTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testTalentIndex() {
        $client = new TechTalent(cache: $this->cache);
        $this->assertObjectHasAttribute('talents', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testTalentGet() {
        $client = new TechTalent(cache: $this->cache);
        $this->assertEquals('Run Without Tiring', $client->get(863)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testTechTalentMedia(): void
    {
        $client = new TechTalent(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/ability_racial_runningwild.jpg', $client->media(863)->assets[0]->value);
    }

    /**
     * @throws ApiException
     */
    public function testTechTalentTrees() {
        $client = new TechTalent(cache: $this->cache);
        $this->assertObjectHasAttribute('talent_trees', $client->trees());
    }

    /**
     * @throws ApiException
     */
    public function testTechTalentTree() {
        $client = new TechTalent(cache: $this->cache);
        $this->assertEquals(12, $client->tree(275)->max_tiers);
    }
}
