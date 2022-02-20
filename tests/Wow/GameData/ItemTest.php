<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Item;

final class ItemTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testItemGet(): void
    {
        $client = new Item(cache: $this->cache);

        $this->assertEquals('Brutal Gladiator\'s Dragonhide Legguards', $client->get(35000)->name->en_US);

        $this->assertEquals('Netherweave Cloth', $client->get(21877, ['version' => EndpointVersion::classic])->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testItemClasses(): void
    {
        $client = new Item(cache: $this->cache);

        $this->assertObjectHasAttribute('item_classes', $client->classes());

        $this->assertObjectHasAttribute('item_classes', $client->classes(['version' => EndpointVersion::classic]));
    }

    /**
     * @throws ApiException
     */
    public function testItemClass(): void
    {
        $client = new Item(cache: $this->cache);

        $this->assertCount(11, $client->class(1)->item_subclasses);

        $this->assertCount(8, $client->class(1, ['version' => EndpointVersion::classic])->item_subclasses);
    }

    /**
     * @throws ApiException
     */
    public function testItemSubclass(): void
    {
        $client = new Item(cache: $this->cache);

        $this->assertEquals('Soul Bag', $client->subclass(1,1)->display_name->en_US);

        $this->assertEquals('Soul Bag', $client->subclass(1, 1, ['version' => EndpointVersion::classic])->display_name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testItemSets(): void
    {
        $client = new Item(cache: $this->cache);
        $this->assertObjectHasAttribute('item_sets', $client->sets());
    }

    /**
     * @throws ApiException
     */
    public function testItemSet(): void
    {
        $client = new Item(cache: $this->cache);
        $this->assertEquals('The Gladiator', $client->set(1)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testItemMedia(): void
    {
        $client = new Item(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/inv_pants_leather_07.jpg', $client->media(35000)->assets[0]->value);
        $this->assertEquals('https://render.worldofwarcraft.com/classic-us/icons/56/inv_sword_04.jpg', $client->media(25, ['version' => EndpointVersion::classic])->assets[0]->value);
    }

    /**
     * @throws ApiException
     */
    public function testItemSearch(): void
    {
        $client = new Item(cache: $this->cache);
        $this->assertEquals('Botarangue', $client->search(function($searchOptions) {
            $searchOptions->where('name.en_US', 'Booterang')->order_by('id');
        })->results[0]->data->name->pt_BR);
    }
}
