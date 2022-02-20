<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Profession;

final class ProfessionTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testProfessionIndex() {
        $client = new Profession(cache: $this->cache);
        $this->assertObjectHasAttribute('professions', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testProfessionGet(): void
    {
        $client = new Profession(cache: $this->cache);
        $this->assertEquals('Blacksmithing', $client->get(164)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testProfessionMedia(): void
    {
        $client = new Profession(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/trade_blacksmithing.jpg', $client->media(164)->assets[0]->value);
    }

    /**
     * @throws ApiException
     */
    public function testProfessionSkillTierGet(): void
    {
        $client = new Profession(cache: $this->cache);
        $this->assertEquals(300, $client->skillTier(164, 2477)->maximum_skill_level);
    }

    /**
     * @throws ApiException
     */
    public function testRecipe(): void
    {
        $client = new Profession(cache: $this->cache);
        $this->assertEquals('Rough Sharpening Stone', $client->recipe(1631)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testRecipeMedia(): void
    {
        $client = new Profession(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/inv_stone_sharpeningstone_01.jpg', $client->recipeMedia(1631)->assets[0]->value);
    }
}
