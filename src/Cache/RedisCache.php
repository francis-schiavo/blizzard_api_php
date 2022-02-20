<?php

namespace BlizzardApi\Cache;

use Redis;

class RedisCache implements ICacheProvider
{
    /**
     * Redis connection
     * @var Redis $connection
     */
    protected Redis $connection;

    /**
     * RedisCache is used to Cache API requests using Redis
     * @param Redis $connection A Redis connection.
     */
    public function __construct(Redis $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $url Resource URL
     * @param string|null $data Buffer
     * @return bool When true the buffer contains the cached data
     */
    public function retrieve(string $url, string|null &$data): bool
    {
        $data = $this->connection->get($url);
        return $data !== false;
    }

    /**
     * @param string $url Resource URL
     * @param string $data Resource data
     * @param int $ttl Cache duration in seconds
     */
    public function store(string $url, string $data, int $ttl): bool
    {
        return $this->connection->setex($url, $ttl, $data);
    }
}
