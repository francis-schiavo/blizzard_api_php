<?php declare(strict_types=1);

namespace BlizzardApi\Tests\Wow\GameData;

use BlizzardApi\ApiException;
use BlizzardApi\Tests\ApiTestCase;
use BlizzardApi\Wow\GameData\Auction;

final class AuctionTest extends ApiTestCase
{
    /**
     * @throws ApiException
     */
    public function testAuctionGet(): void
    {
        $client = new Auction(cache: $this->cache);
        $this->assertObjectHasAttribute('auctions', $client->get(4));
    }

    /**
     * @throws ApiException
     */
    public function testAuctionCommodities(): void
    {
        $client = new Auction(cache: $this->cache);
        $this->assertObjectHasAttribute('auctions', $client->commodities());
    }
}
