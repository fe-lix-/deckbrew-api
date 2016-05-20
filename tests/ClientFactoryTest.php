<?php

namespace DeckBrew;

class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactoryCreatesClient()
    {
        $client = ClientFactory::create();

        $this->assertInstanceOf(Client::class, $client);
    }
}