<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Diablo\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Diablo\Community\CharacterClass;
use BlizzardApi\Tests\ApiTestCase;

final class CharacterClassTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testCharacterClassIndex()
    {
        $client = new CharacterClass(cache: $this->cache);
        $this->assertObjectHasAttribute('skillCategories', $client->get('barbarian'));
    }

    /**
     * @throws ApiException
     */
    public function testCharacterClassGet()
    {
        $client = new CharacterClass(cache: $this->cache);
        $this->assertObjectHasAttribute('skill', $client->skill('barbarian', 'bash'));
    }
}
