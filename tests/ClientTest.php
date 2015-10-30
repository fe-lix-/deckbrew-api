<?php

namespace DeckBrew;

use GuzzleHttp\ClientInterface as HttpClient;
use DeckBrew\Criteria\Specifications as Spec;
use Psr\Http\Message\MessageInterface;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    const RESPONSE = '["response"]';

    private $httpClient;

    protected function setUp()
    {
        $this->httpClient = $this->getMock(HttpClient::class);
    }

    public function testSearchAllCards()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_CARDS);

        $client = new Client($this->httpClient);
        $client->searchCard();
    }

    public function testSearchCardByName()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_CARDS . '?name=somename');

        $client = new Client($this->httpClient);
        $criteria = new Criteria\CardSearch([
            new Spec\WithName('somename'),
        ]);

        $client->searchCard($criteria);
    }

    public function testSearchCardByDuplicatedProperty()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_CARDS . '?color=red&color=blue');

        $client = new Client($this->httpClient);
        $criteria = new Criteria\CardSearch([
            new Spec\WithColor('red'),
            new Spec\WithColor('blue'),
        ]);

        $client->searchCard($criteria);
    }

    public function testSearchCardGetPage()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_CARDS . '?page=1');

        $client = new Client($this->httpClient);

        $client->searchCard(null, 1);
    }

    public function testGetCard()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_CARDS . '/1234');

        $client = new Client($this->httpClient);

        $client->getCard(1234);
    }

    public function testGetSets()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_SETS);

        $client = new Client($this->httpClient);

        $client->getSets();
    }

    public function testGetSet()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_SETS . '/123');

        $client = new Client($this->httpClient);

        $client->getSet(123);
    }

    public function testGetTypes()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_TYPES);

        $client = new Client($this->httpClient);

        $client->getTypes();
    }

    public function testGetSuperTypes()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_SUPERTYPES);

        $client = new Client($this->httpClient);

        $client->getSuperTypes();
    }

    public function testGetSubTypes()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_SUBTYPES);

        $client = new Client($this->httpClient);

        $client->getSubTypes();
    }

    public function testGetColors()
    {
        $this->aGetRequestWillBePerformed(Client::MTG_COLORS);

        $client = new Client($this->httpClient);

        $client->getColors();
    }

    private function aGetRequestWillBePerformed($address)
    {
        $response = $this->getMock(MessageInterface::class);
        $response->expects($this->once())
            ->method('getBody')
            ->willReturn(self::RESPONSE);


        $this->httpClient->expects($this->once())
            ->method('request')
            ->with('GET', $address, [])
            ->willReturn($response);
    }
}
