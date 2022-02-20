<?php

namespace BlizzardApi\Hearthstone\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Hearthstone\Request;
use stdClass;

class Card extends Request
{
    /**
     * @param array $searchOptions
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function search(array $searchOptions = [], array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/cards",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options, $searchOptions)
        );
    }

    /**
     * @param string|int $idOrSlug
     * @param string $gameMode
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(string|int $idOrSlug, string $gameMode = 'constructed', array $options = [], ): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::community)}/cards/$idOrSlug",
            array_merge(['ttl' => CacheDuration::CACHE_TRIMESTER->value], $options, ['game_mode' => $gameMode])
        );
    }
}
