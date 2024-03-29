<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Hearthstone\GameData\Metadata;
use BlizzardApi\Tests\ApiTestCase;

final class MetadataTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testMetadataIndex()
    {
        $client = new Metadata(cache: $this->cache);
        $this->assertObjectHasAttribute('sets', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testMetadataGet()
    {
        $client = new Metadata(cache: $this->cache);
        $this->assertIsArray($client->get('sets'));
    }
}
