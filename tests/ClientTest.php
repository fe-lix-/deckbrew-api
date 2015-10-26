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

    public function testSearchCardByName()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS . '?name=somename');

        $client = new Client($this->httpClient);
        $criteria = new Criteria\CardSearch();
        $criteria->withName('somename');

        $response = $client->searchCard($criteria);
    }

    public function testSearchCardByDuplicatedProperty()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS . '?color=red&color=blue');

        $client = new Client($this->httpClient);
        $criteria = new Criteria\CardSearch();
        $criteria->withColor('red')
            ->withColor('blue');

        $response = $client->searchCard($criteria);
    }
}
