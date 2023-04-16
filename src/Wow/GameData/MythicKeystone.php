<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use Error;
use stdClass;

class MythicKeystone extends GenericDataEndpoint
{

    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     */
    public function get(int $id, array $options = []): stdClass
    {
        throw new Error('The Mythic keystone endpoint does not have an index method.');
    }

    /**
     * Returns media for a mythic keystone affix by ID
     * @param $id int The ID of the mythic keystone affix
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/keystone-affix/$id", $this->defaultOptions($options));
    }


    /**
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function dungeons(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/dungeon/index", $this->defaultOptions($options));
    }

    /**
     * @param int $id Dungeon ID
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function dungeon(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/dungeon/$id", $this->defaultOptions($options));
    }

    /**
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function periods(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/period/index", $this->defaultOptions($options));
    }

    /**
     * @param int $id Dungeon ID
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function period(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/period/$id", $this->defaultOptions($options));
    }

    /**
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function seasons(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/season/index", $this->defaultOptions($options));
    }

    /**
     * @param int $id Dungeon ID
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function season(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri()}/season/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::dynamic;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'mythic-keystone';
    }
}