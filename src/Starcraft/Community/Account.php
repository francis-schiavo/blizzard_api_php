<?php

namespace BlizzardApi\Starcraft\Community;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Starcraft\Request;
use stdClass;

class Account extends Request
{
    /**
     * @param int $accountId Account ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function index(int $accountId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/player/$accountId",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }
}
