<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\ConnectedRealm;

final class ConnectedRealmsTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testConnectedRealmsIndex(): void
    {
        $client = new ConnectedRealm(cache: $this->cache);
        $this->assertObjectHasAttribute('connected_realms', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testConnectedRealmGet(): void
    {
        $client = new ConnectedRealm(cache: $this->cache);
        $this->assertEquals(11, $client->get(11)->realms[0]->id);
    }

    /**
     * @throws ApiException
     */
    public function testConnectedRealmPagination(): void
    {
        $client = new ConnectedRealm(cache: $this->cache);
        $this->assertCount(10, $client->search(null, 1, 10)->results);
    }

    /**
     * @throws ApiException
     */
    public function testConnectedRealmSearch(): void
    {
        $client = new ConnectedRealm(cache: $this->cache);
        $this->assertEquals(60, $client->search(function ($searchOptions) {
            $searchOptions->where('id', 60);
        }, 1, 10)->results[0]->data->id);
    }

    /**
     * @throws ApiException
     */
    public function testConnectedRealmSearchOr(): void
    {
        $client = new ConnectedRealm(cache: $this->cache);
        $this->assertCount(2, $client->search(function ($searchOptions) {
            $searchOptions->where('id', [60, 67]);
        }, 1, 10)->results);
    }

    /**
     * @throws ApiException
     */
    public function testConnectedRealmSearchRange(): void
    {
        $client = new ConnectedRealm(cache: $this->cache);
        $this->assertCount(17, $client->search(function ($searchOptions) {
            $searchOptions->where('id', null, min: 60, max: 100);
        })->results);
    }
}
