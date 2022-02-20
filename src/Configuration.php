<?php

namespace BlizzardApi;

use BlizzardApi\Enumerators\Region;

class Configuration
{
  const VERSION = '1.0.0';

  public static string $apiKey;
  public static string $apiSecret;
  public static Region $region;

  public static string $redirectURI;

  public static bool $storeAccessTokenInSession = true;
  public static bool $storeAccessTokenInCache = true;
  public static string $accessTokenSessionKey = 'blizzard_api_access_token';
}
