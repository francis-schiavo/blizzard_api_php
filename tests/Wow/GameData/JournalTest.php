<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Journal;

final class JournalTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testJournalExpansions(): void
    {
        $client = new Journal(cache: $this->cache);
        $this->assertObjectHasAttribute('tiers', $client->expansions());
    }

    /**
     * @throws ApiException
     */
    public function testJournalExpansion(): void
    {
        $client = new Journal(cache: $this->cache);
        $this->assertEquals('Wrath of the Lich King', $client->expansion(72)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testJournalInstances(): void
    {
        $client = new Journal(cache: $this->cache);
        $this->assertObjectHasAttribute('instances', $client->instances());
    }

    /**
     * @throws ApiException
     */
    public function testJournalInstance(): void
    {
        $client = new Journal(cache: $this->cache);
        $this->assertEquals('Ragefire Chasm', $client->instance(226)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testJournalEncounters(): void
    {
        $client = new Journal(cache: $this->cache);
        $this->assertObjectHasAttribute('encounters', $client->encounters());
    }

    /**
     * @throws ApiException
     */
    public function testJournalEncounter(): void
    {
        $client = new Journal(cache: $this->cache);
        $this->assertEquals('Glubtok', $client->encounter(89)->name->en_US);
    }
}
