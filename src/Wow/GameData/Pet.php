<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use stdClass;

class Pet extends GenericDataEndpoint
{
    /**
     * Returns media for a battle pet by ID
     * @param int $id The ID of the pet
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/pet/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of pet abilities
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function abilities(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('ability')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a pet ability by ID
     * @param int $id The ID of the pet ability
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function ability(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('ability')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns media for a pet ability by ID
     * @param int $id The ID of the pet ability
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function abilityMedia(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/pet-ability/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'pet';
    }
}
