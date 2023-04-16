<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\PlayableSpecialization;

final class PlayableSpecializationTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPlayableSpecializationIndex()
    {
        $client = new PlayableSpecialization(cache: $this->cache);
        $this->assertObjectHasAttribute('character_specializations', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testPlayableSpecializationGet(): void
    {
        $client = new PlayableSpecialization(cache: $this->cache);
        $this->assertEquals('Arcane', $client->get(62)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testPlayableSpecializationMedia(): void
    {
        $client = new PlayableSpecialization(cache: $this->cache);
        $this->assertEquals('https://render.worldofwarcraft.com/us/icons/56/spell_nature_lightning.jpg', $client->media(262)->assets[0]->value);
    }
}
