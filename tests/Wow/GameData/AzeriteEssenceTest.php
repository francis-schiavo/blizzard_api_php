<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\AzeriteEssence;

final class AzeriteEssenceTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testAzeriteEssenceIndex(): void
    {
        $client = new AzeriteEssence(cache: $this->cache);
        $this->assertObjectHasAttribute('azerite_essences', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testAzeriteEssenceGet(): void
    {
        $client = new AzeriteEssence(cache: $this->cache);
        $this->assertEquals('Azeroth\'s Undying Gift', $client->get(2)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testAzeriteEssenceMedia(): void
    {
        $client = new AzeriteEssence(cache: $this->cache);
        $this->assertObjectHasAttribute('assets', $client->media(2));
    }
}
