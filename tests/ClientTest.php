<?php

namespace DeckBrew;

use GuzzleHttp\ClientInterface as HttpClient;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    const RESPONSE = 'response';

    private $httpClient;

    protected function setUp()
    {
        $this->httpClient = $this->getMock(HttpClient::class);
    }

    public function testSearchAllCards()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS, [])
            ->willReturn(self::RESPONSE);

        $client = new Client($this->httpClient);
        $response = $client->searchCard();
    }

    public function testSearchCardByColor()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS, ['query' => ['name' => 'somename']]);

        $client = new Client($this->httpClient);
        $criteria = new Criteria\CardSearch();
        $criteria->withName('somename');

        $response = $client->searchCard($criteria);
    }
}
