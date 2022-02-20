<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Realm;

final class RealmTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testRealmIndex(): void
    {
        $client = new Realm(cache: $this->cache);

        $this->assertObjectHasAttribute('realms', $client->index());
        $this->assertObjectHasAttribute('realms', $client->index(['version' => EndpointVersion::classic]));
        $this->assertObjectHasAttribute('realms', $client->index(['version' => EndpointVersion::classic1x]));
    }

    /**
     * @throws ApiException
     */
    public function testRealmGet(): void
    {
        $client = new Realm(cache: $this->cache);

        $this->assertEquals('Azralon', $client->get('azralon')->name->en_US);
        $this->assertEquals('Myzrael', $client->get('myzrael', ['version' => EndpointVersion::classic])->name->en_US);
        $this->assertEquals('Atiesh', $client->get('atiesh', ['version' => EndpointVersion::classic1x])->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testRealmSearch(): void
    {
        $client = new Realm(cache: $this->cache);

        $this->assertCount(2, $client->search(function($searchOptions) {
            $searchOptions->where('name.en_US', ['Azralon', 'Nemesis']);
        })->results);

        $this->assertCount(2, $client->search(function($searchOptions) {
            $searchOptions->where('name.en_US', ['Mankrik', 'Pagle']);
        }, options: ['version' => EndpointVersion::classic])->results);
    }

}
