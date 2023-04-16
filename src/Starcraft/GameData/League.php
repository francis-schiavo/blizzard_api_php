<?php

namespace BlizzardApi\Starcraft\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Diablo\Request;
use BlizzardApi\Enumerators\BaseURL;
use stdClass;

abstract class League extends Request
{
    /**
     * @param int $seasonId Season ID
     * @param int $queueId Queue ID
     * @param int $teamType Team type
     * @param int $leagueId League ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function get(int $seasonId, int $queueId, int $teamType, int $leagueId, array $options = []): stdClass
    {
        return $this->apiRequest(
            "{$this->baseUrl(BaseURL::game_data)}/league/$seasonId/$queueId/$teamType/$leagueId/",
            array_merge(['ttl' => CacheDuration::CACHE_DAY->value], $options)
        );
    }
}
