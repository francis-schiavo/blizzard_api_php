<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\ModifiedCrafting;

final class ModifiedCraftingTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testModifiedCraftingIndex(): void
    {
        $client = new ModifiedCrafting(cache: $this->cache);
        $data = $client->index();

        $this->assertObjectHasAttribute('categories', $data);
        $this->assertObjectHasAttribute('slot_types', $data);
    }

    /**
     * @throws ApiException
     */
    public function testModifiedCraftingCategories(): void
    {
        $client = new ModifiedCrafting(cache: $this->cache);
        $this->assertObjectHasAttribute('categories', $client->categories());
    }

    /**
     * @throws ApiException
     */
    public function testModifiedCraftingCategory(): void
    {
        $client = new ModifiedCrafting(cache: $this->cache);
        $this->assertEquals('Specify Haste', $client->category(1)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testModifiedCraftingSlotTypes(): void
    {
        $client = new ModifiedCrafting(cache: $this->cache);
        $this->assertObjectHasAttribute('slot_types', $client->slotTypes());
    }

    /**
     * @throws ApiException
     */
    public function testModifiedCraftingSlotType(): void
    {
        $client = new ModifiedCrafting(cache: $this->cache);
        $this->assertEquals('Modify Item Level - Major', $client->slotType(16)->description->en_US);
    }
}
