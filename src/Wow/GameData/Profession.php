<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use stdClass;

class Profession extends GenericDataEndpoint
{
    /**
     * Returns media for a profession by ID
     * @param int $id The ID of the profession
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/profession/$id", $this->defaultOptions($options));
    }

    /**
     * Returns a skill tier for a profession by ID
     * @param int $id The ID of the profession
     * @param int $skillTierID The ID of the skill tier
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function skillTier(int $id, int $skillTierID, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/$id/skill-tier/$skillTierID", $this->defaultOptions($options));
    }

    /**
     * Returns a recipe by ID
     * @param int $id The ID of the recipe
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function recipe(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/recipe/$id", $this->defaultOptions($options));
    }

    /**
     * Returns media for a recipe by ID
     * @param $id integer The ID of the recipe
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function recipeMedia(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/recipe/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'profession';
    }
}
