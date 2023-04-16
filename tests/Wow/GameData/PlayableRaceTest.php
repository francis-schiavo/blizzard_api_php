<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\PlayableRace;

final class PlayableRaceTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPlayableClassIndex()
    {
        $client = new PlayableRace(cache: $this->cache);

        $this->assertObjectHasAttribute('races', $client->index());

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertObjectHasAttribute('races', $client->index(['version' => EndpointVersion::classic]));
    }

    /**
     * @throws ApiException
     */
    public function testPlayableClassGet(): void
    {
        $client = new PlayableRace(cache: $this->cache);

        $this->assertEquals('Tauren', $client->get(6)->name->en_US);

        if ($this->ignoreClassicTests()) {
            return;
        }

        $this->assertEquals('Tauren', $client->get(6, ['version' => EndpointVersion::classic])->name->en_US);
    }
}
