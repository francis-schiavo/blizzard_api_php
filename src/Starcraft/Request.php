<?php

namespace BlizzardApi\Starcraft;

use BlizzardApi;
use BlizzardApi\Cache\ICacheProvider;
use BlizzardApi\Enumerators\Game;
use BlizzardApi\Enumerators\Region;

class Request extends BlizzardApi\Request
{
    /**
     * @param Region|null $region One of the supported API regions: Region::US, REGION_EU, REGION_KO or REGION_TW
     * @param string|null $accessToken A valid token created by the OAuth2 authorization_code flow
     * @param ICacheProvider|null $cache An implementation of ICacheProvider
     * @throws BlizzardApi\ApiException
     */
    public function __construct(Region|null $region = null, string|null $accessToken = null, ICacheProvider|null $cache = null)
    {
        parent::__construct($region, $accessToken, $cache);

        $this->game = Game::SC2;
    }
}
