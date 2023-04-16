<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Searchable;
use Error;
use stdClass;

class Creature extends GenericDataEndpoint
{
    use Searchable;

    /**
     * @param array $options
     * @return stdClass
     */
    public function index(array $options = []): stdClass
    {
        throw new Error("The Creature endpoint doesn't have an index method.");
    }

    /**
     * Returns an index of Creature Families
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function families(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('family')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a creature family by ID
     * @param $id int The ID of the creature family
     * @param $options array Request options
     * @return mixed
     * @throws ApiException
     */
    public function family(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('family')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of Creature Types
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function types(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('type')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a creature type by ID
     * @param $id int The ID of the creature type
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function type(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('type')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns media for a creature display by ID
     * @param $id integer The ID of the creature display
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function displayMedia(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/creature-display/$id", $this->defaultOptions($options));
    }

    /**
     * Returns a creature family media by ID
     * @param $id integer The ID of the creature family
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function familyMedia(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/creature-family/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'creature';
    }
}