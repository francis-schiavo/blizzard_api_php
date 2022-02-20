<?php

namespace BlizzardApi\Wow\Profile;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Enumerators\EndpointVersion;
use BlizzardApi\Wow\Request;
use stdClass;

class Profile extends Request {
    /**
     * @param array $options Request options
     * @throws ApiException
     */
    public function get(array $options = []): stdClass {
        return $this->apiRequest($this->baseUrl(BaseURL::user_profile), $this->defaultOptions($options));
    }

    /**
     * @param int $realmId Realm ID
     * @param int $characterId Character ID
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function protected_character(int $realmId, int $characterId, array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::user_profile)}/protected-character/$realmId-$characterId", $this->defaultOptions($options));
    }

    /**
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function collections(array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::user_profile)}/collections", $this->defaultOptions($options));
    }

    /**
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function mounts(array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::user_profile)}/collections/mounts", $this->defaultOptions($options));
    }

    /**
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function pets(array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::user_profile)}/collections/pets", $this->defaultOptions($options));
    }

    protected function defaultOptions($options = []): array
    {
        return array_merge(['namespace' => EndpointNamespace::profile, 'version' => EndpointVersion::retail, 'ttl' => CacheDuration::CACHE_DAY->value], $options);
    }
}
