<?php

namespace BlizzardApi\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Cache\CacheDuration;
use BlizzardApi\Enumerators\BaseURL;
use BlizzardApi\Enumerators\EndpointNamespace;
use Error;
use stdClass;

class GuildCrest extends GenericDataEndpoint
{
    /**
     * @param int $id
     * @param array $options
     * @return stdClass
     */
    public function get(int $id, array $options = []): stdClass
    {
        throw new Error('The GuildCrest endpoint does not have a get method.');
    }

    /**
     * Returns media for a guild crest border by ID
     * @param int $id The ID of the guild crest border
     * @param array $options Request options
     * @return stdClass
     * @throws ApiException
     */
    public function borderMedia(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/$this->endpoint/border/$id", $this->defaultOptions($options));
    }

    /**
     * Returns media for a guild crest emblem by ID
     * @param $id int The ID of the guild crest emblem
     * @param $options array Request options
     * @return stdClass
     * @throws ApiException
     */
    public function emblemMedia(int $id, array $options = []): stdClass
    {
        return $this->apiRequest("{$this->baseUrl(BaseURL::media)}/$this->endpoint/emblem/$id", $this->defaultOptions($options));
    }

    protected function endpointSetup(): void
    {
        $this->namespace = EndpointNamespace::static;
        $this->ttl = CacheDuration::CACHE_TRIMESTER->value;
        $this->endpoint = 'guild-crest';
    }
}