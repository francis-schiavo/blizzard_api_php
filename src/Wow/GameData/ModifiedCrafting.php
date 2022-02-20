<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use stdClass;

class ModifiedCrafting extends GenericDataEndpoint
{
    /**
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function categories(array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/modified-crafting/category/index", $this->defaultOptions($options));
    }

    /**
     * @param int $id Category ID
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function category(int $id, array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/modified-crafting/category/$id", $this->defaultOptions($options));
    }

    /**
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function slotTypes(array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/modified-crafting/reagent-slot-type/index", $this->defaultOptions($options));
    }

    /**
     * @param int $id Category ID
     * @param array $options
     * @return stdClass
     * @throws ApiException
     */
    public function slotType(int $id, array $options = []): stdClass {
        return $this->apiRequest("{$this->baseUrl(BaseURL::game_data)}/modified-crafting/reagent-slot-type/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup()
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'modified-crafting';
    }
}