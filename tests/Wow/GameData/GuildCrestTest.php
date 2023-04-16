<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\GuildCrest;

final class GuildCrestTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testGuildCrestIndex(): void
    {
        $client = new GuildCrest(cache: $this->cache);
        $data = $client->index();
        $this->assertCount(6, $data->borders);
        $this->assertCount(196, $data->emblems);

        if ($this->ignoreClassicTests()) {
            return;
        }

        $data = $client->index(['version' => EndpointVersion::classic]);
        $this->assertCount(6, $data->borders);
    }

    /**
     * @throws ApiException
     */
    public function testGuildCrestBorderMedia(): void
    {
        $client = new GuildCrest(cache: $this->cache);

        $this->assertEquals(
            'https://render.worldofwarcraft.com/us/guild/tabards/border_00.png',
            $client->borderMedia(0)->assets[0]->value
        );

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertEquals(
            'https://render.worldofwarcraft.com/classic-us/guild/tabards/border_00.png',
            $client->borderMedia(0, ['version' => EndpointVersion::classic])->assets[0]->value
        );
    }

    /**
     * @throws ApiException
     */
    public function testGuildCrestEmblemMedia(): void
    {
        $client = new GuildCrest(cache: $this->cache);

        $this->assertEquals(
            'https://render.worldofwarcraft.com/us/guild/tabards/emblem_00.png',
            $client->emblemMedia(0)->assets[0]->value
        );

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertEquals(
            'https://render.worldofwarcraft.com/classic-us/guild/tabards/emblem_00.png',
            $client->emblemMedia(0, ['version' => EndpointVersion::classic])->assets[0]->value
        );
    }
}
