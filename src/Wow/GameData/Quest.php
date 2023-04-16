<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use stdClass;

class Quest extends GenericDataEndpoint
{
    /**
     * Returns an index of quest categories (such as quests for a specific class, profession, or storyline)
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function categories(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/category/index", $this->defaultOptions($options));
    }

    /**
     * Returns a quest category by ID
     * @param int $id The ID of the quest category
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function category(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/category/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of quest areas
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function areas(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/area/index", $this->defaultOptions($options));
    }

    /**
     * Returns a quest area by ID
     * @param int $id The ID of the quest area
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function area(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/area/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of quest types (such as PvP quests, raid quests, or account quests)
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function types(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/type/index", $this->defaultOptions($options));
    }

    /**
     * Returns a quest type by ID
     * @param int $id The ID of the quest type
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function type(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/type/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_WEEK->value;
        $this->endpoint = 'quest';
    }
}
