<?php

namespace DeckBrew;

use GuzzleHttp\ClientInterface as HttpClient;
use DeckBrew\Criteria\Specifications as Spec;

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
        $client->searchCard();
    }

    public function testSearchCardByName()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS . '?name=somename');

        $client = new Client($this->httpClient);
        $criteria = new Criteria\CardSearch([
            new Spec\WithName('somename'),
        ]);

        $client->searchCard($criteria);
    }

    public function testSearchCardByDuplicatedProperty()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS . '?color=red&color=blue');

        $client = new Client($this->httpClient);
        $criteria = new Criteria\CardSearch([
            new Spec\WithColor('red'),
            new Spec\WithColor('blue'),
        ]);

        $client->searchCard($criteria);
    }

    public function testSearchCardGetPage()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS . '?page=1');

        $client = new Client($this->httpClient);

        $client->searchCard(null, 1);
    }

    public function testGetCard()
    {
        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', Client::MTG_CARDS . '/1234');

        $client = new Client($this->httpClient);

        $client->getCard(1234);
    }
}
