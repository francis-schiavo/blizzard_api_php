<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Creature;

final class CreatureTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testCreatureGet(): void
    {
        $client = new Creature(cache: $this->cache);

        $this->assertEquals('Young Mastiff', $client->get(42722)->name->en_US);

        $this->assertEquals('Raptor', $client->get(107, ['version' => EndpointVersion::classic])->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testCreatureFamilies(): void
    {
        $client = new Creature(cache: $this->cache);

        $this->assertObjectHasAttribute('creature_families', $client->families());

        $this->assertObjectHasAttribute('creature_families', $client->families(['version' => EndpointVersion::classic]));
    }



    /**
     * @throws ApiException
     */
    public function testCreatureFamilyMedia(): void
    {
        $client = new Creature(cache: $this->cache);

        $this->assertEquals(
            'https://render-us.worldofwarcraft.com/icons/56/ability_hunter_pet_wolf.jpg',
            $client->familyMedia(1)->assets[0]->value
        );

        $this->assertEquals(
            'https://render.worldofwarcraft.com/classic-us/icons/56/ability_hunter_pet_wolf.jpg',
            $client->familyMedia(1, ['version' => EndpointVersion::classic])->assets[0]->value
        );
    }

    /**
     * @throws ApiException
     */
    public function testCreatureTypes(): void
    {
        $client = new Creature(cache: $this->cache);

        $this->assertObjectHasAttribute('creature_types', $client->types());

        $this->assertObjectHasAttribute('creature_types', $client->types(['version' => EndpointVersion::classic]));
    }

    /**
     * @throws ApiException
     */
    public function testCreatureType(): void
    {
        $client = new Creature(cache: $this->cache);

        $this->assertEquals('Beast', $client->type(1)->name->en_US);

        $this->assertEquals('Beast', $client->type(1, ['version' => EndpointVersion::classic])->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testCreatureDisplayMedia(): void
    {
        $client = new Creature(cache: $this->cache);

        $this->assertEquals(
            'https://render-us.worldofwarcraft.com/npcs/zoom/creature-display-30221.jpg',
            $client->displayMedia(30221)->assets[0]->value
        );

        $this->assertEquals(
            'https://render.worldofwarcraft.com/classic-us/npcs/zoom/creature-display-180.jpg',
            $client->displayMedia(180, ['version' => EndpointVersion::classic])->assets[0]->value
        );
    }
}
