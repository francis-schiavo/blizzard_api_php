<?php

namespace BlizzardApi\Cache;

enum CacheDuration: int {
    # One minute Cache
    case CACHE_MINUTE = 60;
    # One hour Cache
    case CACHE_HOUR = 3600;
    # One day Cache
    case CACHE_DAY = 86400;
    # One week Cache
    case CACHE_WEEK = 604800;
    # One (commercial) month Cache
    case CACHE_MONTH = 18144000;
    # Three (commercial) months Cache
    case CACHE_TRIMESTER = 54432000;
}
