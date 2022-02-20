<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Reputation;

final class ReputationTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testReputationFactions() {
        $client = new Reputation(cache: $this->cache);
        $this->assertObjectHasAttribute('factions', $client->factions());
    }

    /**
     * @throws ApiException
     */
    public function testReputationFaction(): void
    {
        $client = new Reputation(cache: $this->cache);
        $this->assertEquals('The Oracles', $client->faction(1105)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testReputationTiers() {
        $client = new Reputation(cache: $this->cache);
        $this->assertObjectHasAttribute('reputation_tiers', $client->tiers());
    }

    /**
     * @throws ApiException
     */
    public function testReputationTier(): void
    {
        $client = new Reputation(cache: $this->cache);
        $this->assertEquals('Nat Pagle', $client->tier(26)->faction->name->en_US);
    }
}
