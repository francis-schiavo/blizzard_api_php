<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\MythicKeystoneAffix;

final class MythicKeystoneAffixTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testMythicKeystoneAffixIndex(): void
    {
        $client = new MythicKeystoneAffix(cache: $this->cache);
        $this->assertObjectHasAttribute('affixes', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystoneAffixGet(): void
    {
        $client = new MythicKeystoneAffix(cache: $this->cache);
        $this->assertEquals('Overflowing', $client->get(1)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystoneAffixMedia(): void
    {
        $client = new MythicKeystoneAffix(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/inv_misc_volatilewater.jpg', $client->media(1)->assets[0]->value);
    }
}
