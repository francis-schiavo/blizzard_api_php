<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\Profile;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\Profile\CharacterProfile;
use BlizzardApi\Wow\Profile\Guild;

final class GuildTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testGuildGet()
    {
        $client = new Guild(cache: $this->cache);
        $this->assertEquals('Mitocracia', $client->get('Azralon', 'Mitocracia')->name);
    }

    /**
     * @throws ApiException
     */
    public function testGuildRoster()
    {
        $client = new Guild(cache: $this->cache);
        $this->assertObjectHasAttribute('members', $client->roster('Azralon', 'Mitocracia'));
    }

    /**
     * @throws ApiException
     */
    public function testGuildAchievements()
    {
        $client = new Guild(cache: $this->cache);
        $this->assertObjectHasAttribute('achievements', $client->achievements('Azralon', 'Mitocracia'));
    }

    /**
     * @throws ApiException
     */
    public function testGuildActivity()
    {
        $client = new Guild(cache: $this->cache);
        $this->assertEquals('Mitocracia', $client->activity('Azralon', 'Mitocracia')->guild->name);
    }
}
