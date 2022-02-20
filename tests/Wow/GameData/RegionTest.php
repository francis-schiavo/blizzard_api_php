<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Region;

final class RegionTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPlayableClassIndex() {
        $client = new Region(cache: $this->cache);

        $this->assertObjectHasAttribute('regions', $client->index());
        $this->assertObjectHasAttribute('regions', $client->index(['version' => EndpointVersion::classic]));
        $this->assertObjectHasAttribute('regions', $client->index(['version' => EndpointVersion::classic1x]));
    }

    /**
     * @throws ApiException
     */
    public function testPlayableClassGet(): void
    {
        $client = new Region(cache: $this->cache);

        $this->assertEquals('North America', $client->get(1)->name->en_US);
        $this->assertEquals('Classic North America', $client->get(41, ['version' => EndpointVersion::classic])->name->en_US);
        $this->assertEquals('Classic Era North America', $client->get(81, ['version' => EndpointVersion::classic1x])->name->en_US);
    }
}
