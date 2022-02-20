<?php

namespace BlizzardApi\Wow\Profile;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Wow\Request;
use stdClass;

class Guild extends Request
{
    /**
     * Return guild basic data
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $guild Guild name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string $realm, string $guild, array $options = []): stdClass
    {
        return $this->guildRequest($realm, $guild, null, $options);
    }

    /**
     * Return guild members
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $guild Guild name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function roster(string $realm, string $guild, array $options = []): stdClass
    {
        return $this->guildRequest($realm, $guild, 'roster', $options);
    }

    /**
     * Return guild achievements
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $guild Guild name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function achievements(string $realm, string $guild, array $options = []): stdClass
    {
        return $this->guildRequest($realm, $guild, 'achievements', $options);
    }

    /**
     * Return guild activity
     *
     * @see https://develop.battle.net/documentation/api-reference/world-of-warcraft-profile-api
     *
     * @param string $realm Realm name
     * @param string $guild Guild name
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function activity(string $realm, string $guild, array $options = []): stdClass
    {
        return $this->guildRequest($realm, $guild, 'activity', $options);
    }

    protected function defaultOptions($options = []): array
    {
        return array_merge(['namespace' => EndpointNamespace::profile, 'version' => EndpointVersion::retail, 'ttl' => CacheDuration::CACHE_HOUR->value], $options);
    }

    /**
     * @param string $realm Realm name
     * @param string $guild Guild name
     * @param string|null $variant Endpoint variant
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    private function guildRequest(string $realm, string $guild, string|null $variant = null, array $options = []): stdClass
    {
        $realm = $this->createSlug($realm);
        $guild = $this->createSlug($guild);
        $url = "{$this->baseUrl(BaseURL::game_data)}/guild/$realm/$guild";

        if (is_string($variant)) {
            $url .= "/$variant";
        }

        return $this->apiRequest($url, $this->defaultOptions($options));
    }
}