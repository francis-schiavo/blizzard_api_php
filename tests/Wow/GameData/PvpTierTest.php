<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\PvpTier;

final class PvpTierTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testPvpSeasonIndex()
    {
        $client = new PvpTier(cache: $this->cache);
        $this->assertObjectHasAttribute('tiers', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testPvpSeasonGet(): void
    {
        $client = new PvpTier(cache: $this->cache);
        $this->assertEquals('Unranked', $client->get(1)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testPvpSeasonLeaderboards()
    {
        $client = new PvpTier(cache: $this->cache);
        $this->assertEquals('https://render.worldofwarcraft.com/us/icons/56/ui_rankedpvp_01.jpg', $client->media(1)->assets[0]->value);
    }

}
