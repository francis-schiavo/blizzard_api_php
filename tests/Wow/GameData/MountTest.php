<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Mount;

final class MountTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testMountIndex(): void
    {
        $client = new Mount(cache: $this->cache);
        $this->assertObjectHasAttribute('mounts', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testMountGet(): void
    {
        $client = new Mount(cache: $this->cache);
        $this->assertEquals('Brown Horse', $client->get(6)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testMountSearch(): void
    {
        $client = new Mount(cache: $this->cache);
        $this->assertEquals('Tartaruga de Montaria', $client->search(function($searchOptions) {
            $searchOptions->where('name.en_US', 'Turtle')->order_by('id');
        })->results[0]->data->name->pt_BR);
    }
}
