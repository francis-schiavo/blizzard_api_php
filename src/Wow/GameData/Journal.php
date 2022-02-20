<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Wow\Search\Composer;
use Error;
use stdClass;

class Journal extends GenericDataEndpoint
{
    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     */
    public function get(int $id, array $options = []): stdClass
    {
        throw new Error('The Journal endpoint does not have a get method.');
    }

    /**
     * @param array $options
     * @return stdClass
     */
    public function index(array $options = []): stdClass
    {
        throw new Error('The Journal endpoint does not have an index method.');
    }

    /**
     * Returns an index of journal expansions
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function expansions(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('expansion')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a journal expansion by ID
     * @param int $id The ID of the journal expansion
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function expansion(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('expansion')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of journal instances
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function instances(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('instance')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a journal instance
     * @param int $id The ID of the journal instance
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function instance(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('instance')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns an index of journal encounters
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function encounters(array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('encounter')}/index", $this->defaultOptions($options));
    }

    /**
     * Returns a journal encounter by ID
     * @param int $id The ID of the journal encounter
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function encounter(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->endpointUri('encounter')}/$id", $this->defaultOptions($options));
    }

    /**
     * Returns media for journal instance by ID
     * @param int $id The ID of the journal instance
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function media(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/journal-instance/$id", $this->defaultOptions($options));
    }

    /**
     * @param callable|null $searchComposer An anonymous function that will receive a search BlizzardApi\Wow\Search\Composer instance
     * @param int $page Current page
     * @param int $pageSize Page size
     * @param array $options Endpoint options
     * @return stdClass
     * @throws ApiException
     */
    public function encounterSearch(callable|null $searchComposer, int $page = 1, int $pageSize = 100, array $options = []): stdClass
    {
        $searchOptions = new Composer($page, $pageSize);
        if (isset($searchComposer)) {
            $searchComposer($searchOptions);
        }

        return $this->apiRequest($this->endpointUri(null, BaseURL::search) . '?' . $searchOptions->toSearchQuery(), $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'journal';
    }
}