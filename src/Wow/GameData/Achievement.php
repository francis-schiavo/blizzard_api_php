<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use BlizzardApi\Cache\CacheDuration;
use stdClass;

class Achievement extends GenericDataEndpoint
{
    /**
     * Returns an index of achievement categories
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
  public function categories(array $options = []): stdClass {
    return $this->apiRequest("{$this->endpointUri('category')}/index", $this->defaultOptions($options));
  }

    /**
     * Returns an Achievement Category by ID
     * @param int $id The ID of the achievement category
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
  public function category(int $id, array $options = []): stdClass {
    return $this->apiRequest("{$this->endpointUri('category')}/$id", $this->defaultOptions($options));
  }

    /**
     * Returns media for an Achievement by ID
     * @param int $id The ID of the achievement
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
  public function media(int $id, array $options = []): stdClass {
    return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/achievement/$id", $this->defaultOptions($options));
  }

  protected function endpointSetup($options = []) {
    $this->namespace = EndpointNamespace::static;
    $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
    $this->endpoint = 'achievement';
  }
}