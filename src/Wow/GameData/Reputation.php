<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\EndpointNamespace;
use Error;
use stdClass;

class Reputation extends GenericDataEndpoint
{
    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     */
    public function get(int $id, array $options = []): stdClass
    {
        throw new Error('The Reputation endpoint does not have a get method.');
    }

    /**
     * @param array $options
     * @return stdClass
     */
    public function index(array $options = []): stdClass
    {
        throw new Error('The Reputation endpoint does not have an index method.');
    }

    /**
     * Returns an index of reputation factions
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function factions(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('faction')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a single reputation faction by ID
     * @param int $id The ID of the reputation faction
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function faction(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('faction')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of reputation tiers
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function tiers(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('tiers')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a single set of reputation tiers by ID
     * @param int $id The ID of the set of reputation tiers
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function tier(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('tiers')}/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'reputation';
    }
}
