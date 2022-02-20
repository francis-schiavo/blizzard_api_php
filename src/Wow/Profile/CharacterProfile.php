<?php

namespace BlizzardApi\Wow\Profile;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Enumerators\PvpBracket;
use BlizzardApi\Wow\Request;
use stdClass;

class CharacterProfile extends Request
{
    /**
     * Return character basic data
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, null, $options);
    }

    /**
     * Return character achievements
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function achievements(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'achievements', $options);
    }

    /**
     * Return character achievement statistics
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function achievementStatistics(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'achievements/statistics', $options);
    }

    /**
     * Return character appearance
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function appearance(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'appearance', $options);
    }

    /**
     * Return character collections
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function collections(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'collections', $options);
    }

    /**
     * Return character pets
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function pets(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'collections/pets', $options);
    }

    /**
     * Return character mounts
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function mounts(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'collections/mounts', $options);
    }

    /**
     * Return character encounters
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function encounters(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'encounters', $options);
    }

    /**
     * Return character dungeons
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function dungeons(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'encounters/dungeons', $options);
    }

    /**
     * Return character raids
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function raids(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'encounters/raids', $options);
    }

    /**
     * Return character equipment
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function equipment(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'equipment', $options);
    }

    /**
     * Return character hunter pets
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function hunterPets(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'hunter-pets', $options);
    }

    /**
     * Return character media
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'character-media', $options);
    }

    /**
     * Return character mythic keystone profile
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function mythicKeystoneProfile(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'mythic-keystone-profile', $options);
    }

    /**
     * Return character mythic keystone seasons
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param int|null $season The ID of a M+ season or null for all seasons
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function mythicKeystoneSeason(string $realm, string $character, int|null $season, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, "mythic-keystone-profile/season/$season", $options);
    }

    /**
     * Return character professions
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function professions(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'professions', $options);
    }

    /**
     * Return character status
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function status(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'status', $options);
    }

    /**
     * Return character pvp summary
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function pvpSummany(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'pvp-summary', $options);
    }

    /**
     * Return character pvp bracket
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param PvpBracket $bracket Pvp bracket
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function pvpBracket(string $realm, string $character, PvpBracket $bracket, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, "pvp-bracket/$bracket->value", $options);
    }

    /**
     * Return character quests
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param bool $completed Only completed quests
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function quests(string $realm, string $character, bool $completed = false, array $options = []): stdClass
    {
        if ($completed) {
            return $this->characterRequest($realm, $character, 'quests', $options);
        } else {
            return $this->characterRequest($realm, $character, 'quests/completed', $options);
        }

    }

    /**
     * Return character reputation
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function reputation(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'reputations', $options);
    }

    /**
     * Return character soulbinds
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function soulbinds(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'soulbinds', $options);
    }

    /**
     * Return character specializations
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function specializations(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'specializations', $options);
    }

    /**
     * Return character statistics
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function statistics(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'statistics', $options);
    }

    /**
     * Return character titles
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $character Character name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function titles(string $realm, string $character, array $options = []): stdClass
    {
        return $this->characterRequest($realm, $character, 'titles', $options);
    }

    protected function defaultOptions($options = []): array
    {
        return array_merge(['namespace' => EndpointNamespace::profile, 'version' => EndpointVersion::retail, 'ttl' => CacheDuration::CACHE_HOUR->value], $options);
    }

    /**
     * @param string $realm Realm name
     * @param string $character Character name
     * @param string|null $variant Endpoint variant
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    private function characterRequest(string $realm, string $character, string|null $variant = null, array $options = []): stdClass
    {
        $uri = "{$this->baseUrl(BaseURL::profile)}/character/{$this->createSlug($realm)}/{$this->createSlug($character)}";

        if ($variant) {
            $uri .= "/$variant";
        }

        return $this->apiRequest($uri, $this->defaultOptions($options));
    }
}