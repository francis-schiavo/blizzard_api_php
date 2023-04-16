<?php

namespace BlizzardApi\Tests;

use BlizzardApi\Cache\ICacheProvider;
use BlizzardApi\Cache\RedisCache;
use BlizzardApi\Configuration;
use BlizzardApi\Enumerators\Region;
use Exception;
use PHPUnit\Framework\TestCase;
use Redis;

class ApiTestCase extends TestCase
{
    protected ICacheProvider $cache;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        Configuration::$apiKey = $_SERVER['BNET_APPLICATION_ID'];
        Configuration::$apiSecret = $_SERVER['BNET_APPLICATION_SECRET'];
        Configuration::$region = Region::US;

        $redis = new Redis();
        $redis->connect($_SERVER['REDIS_HOST'], $_SERVER['REDIS_PORT']);
        $redis->select($_SERVER['REDIS_DB']);
        $this->cache = new RedisCache($redis);
    }

    protected function ignoreClassicTests(): bool
    {
        return $_SERVER['IGNORE_CLASSIC_TESTS'] ?? false;
    }
}
