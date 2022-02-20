<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;

class PlayableRace extends GenericDataEndpoint
{
  protected function endpointSetup() {
    $this->namespace = EndpointNamespace::static;
    $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
    $this->endpoint = 'playable-race';
  }
}
