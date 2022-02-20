<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\Profile;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\Profile\CharacterProfile;

final class CharacterProfileTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testCharacterGet()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertEquals(147161356, $client->get('Azralon', 'Schiller')->id);
    }

    /**
     * @throws ApiException
     */
    public function testCharacterAchievements()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('total_quantity', $client->achievements('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterAchievementStatistics()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('categories', $client->achievementStatistics('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterAppearance()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('customizations', $client->appearance('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterCollections()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $data = $client->collections('Azralon', 'Schiller');

        $this->assertObjectHasAttribute('pets', $data);
        $this->assertObjectHasAttribute('mounts', $data);
    }

    /**
     * @throws ApiException
     */
    public function testCharacterPets()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('pets', $client->pets('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterMounts()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('mounts', $client->mounts('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterEncounters()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $data = $client->encounters('Azralon', 'Schiller');

        $this->assertObjectHasAttribute('dungeons', $data);
        $this->assertObjectHasAttribute('raids', $data);
    }

    /**
     * @throws ApiException
     */
    public function testCharacterDungeons()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('expansions', $client->dungeons('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterRaids()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('expansions', $client->raids('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterEquipment()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('equipped_items', $client->equipment('Azralon', 'Schiller'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterHunterPets()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('hunter_pets', $client->hunterPets('Azralon', 'Schiavo'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterMedia()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('assets', $client->media('Azralon', 'Schiavo'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterStatus()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertEquals(1, $client->status('Azralon', 'Schiavo')->is_valid);
    }

    /**
     * @throws ApiException
     */
    public function testCharacterQuests()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('quests', $client->quests('Azralon', 'Schiavo'));

    }

    /**
     * @throws ApiException
     */
    public function testCharacterReputation()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('reputations', $client->reputation('Azralon', 'Schiavo'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterSpecializations()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('specializations', $client->specializations('Azralon', 'Schiavo'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterStatistics()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('power_type', $client->statistics('Azralon', 'Schiavo'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterTitles()
    {
        $client = new CharacterProfile(cache: $this->cache);
        $this->assertObjectHasAttribute('titles', $client->titles('Azralon', 'Schiavo'));
    }
}
