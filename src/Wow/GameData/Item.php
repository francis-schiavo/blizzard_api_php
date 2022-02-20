<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;
use Error;
use stdClass;

class Item extends GenericDataEndpoint
{
    use Searchable;

    /**
     * @param array $options
     * @return stdClass
     */
    public function index(array $options = []): stdClass
    {
        throw new Error('The Item endpoint does not have an index method.');
    }

    /**
     * Returns an index of item classes
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function classes(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('class')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns an item class by ID
     * @param int $id The ID of the item class
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function class(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('class')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an item subclass by ID
     * @param int $itemClassID The ID of the item class
     * @param int $itemSubclassID The ID of the item subclass
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function subclass(int $itemClassID, int $itemSubclassID, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('class')}/$itemClassID/item-subclass/$itemSubclassID", $this->defaultOptions($options));
    }

    /**
     * Returns media for an Item by ID
     * @param int $id The ID of the item
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/$this->endpoint/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of item sets
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function sets(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('set')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns an item set by ID
     * @param int $id The ID of the item set
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function set(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('set')}/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'item';
    }
}
