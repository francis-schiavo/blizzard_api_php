<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Achievement;

final class AchievementTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testAchievementIndex(): void
    {
        $client = new Achievement(cache: $this->cache);
        $this->assertObjectHasAttribute('achievements', $client->index());
    }

    /**
     * @throws ApiException
     */
    public function testAchievementGet(): void
    {
        $client = new Achievement(cache: $this->cache);
        $this->assertEquals('Level 10', $client->get(6)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testAchievementCategories(): void
    {
        $client = new Achievement(cache: $this->cache);
        $data = $client->categories();
        $this->assertObjectHasAttribute('root_categories', $data);
        $this->assertObjectHasAttribute('categories', $data);
        $this->assertObjectHasAttribute('guild_categories', $data);
    }

    /**
     * @throws ApiException
     */
    public function testAchievementCategory(): void
    {
        $client = new Achievement(cache: $this->cache);
        $this->assertEquals('Feats of Strength', $client->category(81)->name->en_US);
    }

    /**
     * @throws ApiException
     */
    public function testAchievementMedia(): void
    {
        $client = new Achievement(cache: $this->cache);
        $this->assertEquals('https://render-us.worldofwarcraft.com/icons/56/achievement_level_10.jpg', $client->media(6)->assets[0]->value);
    }
}
