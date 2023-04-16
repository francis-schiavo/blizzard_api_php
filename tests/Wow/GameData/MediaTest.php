<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Media;

final class MediaTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testMediaSearch(): void
    {
        $client = new Media(cache: $this->cache);
        $this->assertEquals('https://render.worldofwarcraft.com/us/icons/56/inv_sword_04.jpg', $client->search(function ($searchOptions) {
            $searchOptions->where('tags', 'item')->order_by('id');
        })->results[0]->data->assets[0]->value);
    }
}
