<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Diablo\Community\Artisan;
use BlizzardApi\Tests\ApiTestCase;

final class ArtisanTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testArtisanIndex()
    {
        $client = new Artisan(cache: $this->cache);
        $this->assertObjectHasAttribute('training', $client->get('blacksmith'));
    }

    /**
     * @throws ApiException
     */
    public function testArtisanRecipe()
    {
        $client = new Artisan(cache: $this->cache);
        $this->assertObjectHasAttribute('reagents', $client->recipe('blacksmith', 'apprentice-flamberge'));
    }
}
