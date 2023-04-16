<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\PlayableClass;

final class PlayableClassTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPlayableClassIndex()
    {
        $client = new PlayableClass(cache: $this->cache);

        $this->assertObjectHasAttribute('classes', $client->index());

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertObjectHasAttribute('classes', $client->index(['version' => EndpointVersion::classic]));
    }

    /**
     * @throws ApiException
     */
    public function testPlayableClassGet(): void
    {
        $client = new PlayableClass(cache: $this->cache);

        $this->assertEquals('Druid', $client->get(11)->name->en_US);

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertEquals('Druid', $client->get(11, ['version' => EndpointVersion::classic])->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testPlayableClassMedia(): void
    {
        $client = new PlayableClass(cache: $this->cache);
        $this->assertEquals('https://render.worldofwarcraft.com/us/icons/56/classicon_druid.jpg', $client->media(11)->assets[0]->value);
    }
}
