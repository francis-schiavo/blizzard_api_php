# Blizzard API client

This library is an interface to Blizzard APIS.

See https://develop.battle.net/ for more information.

## Installation

This library requires PHP 8.1 or newer with the following modules:

* mbstring
* curl
* redis (Only if using the Redis cache interface)

You can add this library to your compose project by adding
`francis-schiavo/blizzard_api` as a requirement on your `compose.json`.

or from the command line:

`php composer.phar require francis-schiavo/blizzard_api`

## Configuration

You must configure the package with a valid pair of credentials. You can obtain them
here: https://develop.battle.net/access/clients

The code sample below show how to configure the library.

```php
<?php

use BlizzardApi\Enumerators\Region;

BlizzardApi\Configuration::$apiKey = '<YOUR APPLICATION ID>';
BlizzardApi\Configuration::$apiSecret = '<YOUR APPLICATION SECRET>';
BlizzardApi\Configuration::$region = Region::US;
```

## Basic usage

This is how you can get a list of all available wow playable races:

```php
$api_client = new \BlizzardApi\Wow\GameData\PlayableRace();
$data = $api_client->index();

echo(print_r($data));
```

You can pass an instance of RedisCache to use Redis to cache API requests locally:

```php
# PHP Redis module
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->select(8);

# BlizzardApi\Cache
use BlizzardApi\Cache\RedisCache;
$cache = new RedisCache($redis);

# Pass the constructor `cache` parameter.
$api_client = new \BlizzardApi\Wow\GameData\PlayableRace(cache: $cache);
$data = $api_client->index();
```

## Advanced search interface

For some WoW endpoints there is a `search` method available, you can easily
compose a valid query as shown here:

```php
# Pass the constructor `cache` parameter.
$api_client = new \BlizzardApi\Wow\GameData\Item(cache: $cache);
$data = $api_client->search(function($queryOptions) {
    $searchOptions->where('name.en_US', 'Booterang')->order_by('id');
});
```