<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Diablo\Community\Artisan;

final class ArtisanTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testArtisanIndex() {
        $client = new Artisan(cache: $this->cache);
        $this->assertObjectHasAttribute('training', $client->get('blacksmith'));
    }

    /**
     * @throws ApiException
     */
    public function testArtisanRecipe() {
        $client = new Artisan(cache: $this->cache);
        $this->assertObjectHasAttribute('reagents', $client->recipe('blacksmith', 'apprentice-flamberge'));
    }
}
