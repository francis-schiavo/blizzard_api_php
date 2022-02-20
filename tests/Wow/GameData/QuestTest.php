<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Quest;

final class QuestTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testQuestIndex() {
        $client = new Quest(cache: $this->cache);
        $data = $client->index();

        $this->assertObjectHasAttribute('categories', $data);
        $this->assertObjectHasAttribute('areas', $data);
        $this->assertObjectHasAttribute('types', $data);
    }

    /**
     * @throws ApiException
     */
    public function testQuestGet(): void
    {
        $client = new Quest(cache: $this->cache);
        $this->assertEquals('Sharptalon\'s Claw', $client->get(2)->title->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testQuestCategories() {
        $client = new Quest(cache: $this->cache);
        $this->assertObjectHasAttribute('categories', $client->categories());
    }

    /**
     * @throws ApiException
     */
    public function testQuestCategory(): void
    {
        $client = new Quest(cache: $this->cache);
        $this->assertEquals('Epic', $client->category(1)->category->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testQuestAreas() {
        $client = new Quest(cache: $this->cache);
        $this->assertObjectHasAttribute('areas', $client->areas());
    }

    /**
     * @throws ApiException
     */
    public function testQuestArea(): void
    {
        $client = new Quest(cache: $this->cache);
        $this->assertEquals('Mulgore', $client->area(215)->area->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testQuestTypes() {
        $client = new Quest(cache: $this->cache);
        $this->assertObjectHasAttribute('types', $client->types());
    }

    /**
     * @throws ApiException
     */
    public function testQuestType(): void
    {
        $client = new Quest(cache: $this->cache);
        $this->assertEquals('Group', $client->type(1)->type->en_US);
    }
}
