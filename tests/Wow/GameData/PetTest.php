<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Pet;

final class PetTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPetIndex() {
        $client = new Pet(cache: $this->cache);
        $this->assertObjectHasAttribute('pets', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testPetGet(): void
    {
        $client = new Pet(cache: $this->cache);
        $this->assertEquals('Mechanical Squirrel', $client->get(39)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testPetMedia(): void
    {
        $client = new Pet(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/inv_pet_mechanicalsquirrel.jpg', $client->media(39)->assets[0]->value);
    }

    /**
     * @throws ApiException
     */
    public function testPetAbilityIndex() {
        $client = new Pet(cache: $this->cache);
        $this->assertObjectHasAttribute('abilities', $client->abilities());
    }

    /**
     * @throws ApiException
     */
    public function testPetAbility(): void
    {
        $client = new Pet(cache: $this->cache);
        $this->assertEquals('Bite', $client->ability(110)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testPetAbilityMedia(): void
    {
        $client = new Pet(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/ability_druid_ferociousbite.jpg', $client->abilityMedia(110)->assets[0]->value);
    }
}
