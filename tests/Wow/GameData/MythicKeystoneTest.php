<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\MythicKeystone;

final class MythicKeystoneTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testMythicKeystoneIndex(): void
    {
        $client = new MythicKeystone(cache: $this->cache);
        $data = $client->index();

        $this->assertObjectHasAttribute('dungeons', $data);
        $this->assertObjectHasAttribute('seasons', $data);
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystoneDungeons(): void
    {
        $client = new MythicKeystone(cache: $this->cache);
        $this->assertObjectHasAttribute('dungeons', $client->dungeons());
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystoneDungeon(): void
    {
        $client = new MythicKeystone(cache: $this->cache);
        $this->assertEquals('Mists of Tirna Scithe', $client->dungeon(375)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystonePeriods(): void
    {
        $client = new MythicKeystone(cache: $this->cache);
        $this->assertObjectHasAttribute('periods', $client->periods());
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystonePeriod(): void
    {
        $client = new MythicKeystone(cache: $this->cache);
        $this->assertEquals(1523977199000, $client->period(641)->end_timestamp);
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystoneSeasons(): void
    {
        $client = new MythicKeystone(cache: $this->cache);
        $this->assertObjectHasAttribute('seasons', $client->seasons());
    }

    /**
     * @throws ApiException
     */
    public function testMythicKeystoneSeason(): void
    {
        $client = new MythicKeystone(cache: $this->cache);
        $this->assertEquals(1548169200000, $client->season(1)->end_timestamp);
    }
}
