<?php

namespace BlizzardApi\Wow\Search;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\BaseURL;
use stdClass;

trait Searchable
{
    /**
     * @param callable|null $searchComposer An anonymous function that will receive a search BlizzardApi\Wow\Search\Composer instance
     * @param int $page Current page
     * @param int $pageSize Page size
     * @param array $options Endpoint options
     * @return stdClass
     * @throws ApiException
     */
    public function search(callable|null $searchComposer, int $page = 1, int $pageSize = 100, array $options = []): stdClass
    {
        $searchOptions = new Composer($page, $pageSize);
        if (isset($searchComposer)) {
            $searchComposer($searchOptions);
        }

        return $this->apiRequest($this->endpointUri(null, BaseURL::search) . '?' . $searchOptions->toSearchQuery(), $this->defaultOptions($options));
    }
}