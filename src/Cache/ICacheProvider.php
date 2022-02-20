<?php

namespace BlizzardApi\Cache;

interface ICacheProvider {
    /**
     * @param string $url Resource URL
     * @param string|null $data Buffer
     * @return bool When true the buffer contains the cached data
     */
    function retrieve(string $url, string|null &$data): bool;

    /**
     * @param string $url Resource URL
     * @param string $data Resource data
     * @param int $ttl Cache duration in seconds
     */
    function store(string $url, string $data, int $ttl): bool;
}
