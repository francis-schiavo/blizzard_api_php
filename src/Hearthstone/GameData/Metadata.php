<?php

namespace BlizzardApi\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Hearthstone\Request;
use stdClass;

class Metadata extends Request
{
    /**
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function index(array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/metadata",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }

    /**
     * @param string $type
     * @param array $options Request options
     * @return array
     * @throws ApiException
     */
    public function get(string $type, array $options = []): array
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/metadata/$type",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options)
        );
    }
}
