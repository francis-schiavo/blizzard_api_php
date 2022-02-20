<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Spell;

final class SpellTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testSpellGet() {
        $client = new Spell(cache: $this->cache);
        $this->assertEquals('Eye of the Tiger', $client->get(196607)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testSpellMedia(): void
    {
        $client = new Spell(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/ability_druid_primalprecision.jpg', $client->media(196607)->assets[0]->value);
    }

    /**
     * @throws ApiException
     */
    public function testSpellSearch(): void
    {
        $client = new Spell(cache: $this->cache);
        $this->assertEquals('Tranquilidade', $client->search(function($searchOptions) {
            $searchOptions->where('name.en_US', 'Tranquility')->order_by('id');
        })->results[0]->data->name->pt_BR);
    }
}
