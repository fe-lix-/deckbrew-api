<?php

namespace DeckBrew;

class Client
{
    const BASE_URL = 'https://api.deckbrew.com/';
    const MTG_CARDS = '/mtg/cards';

    /** @var HttpClient */
    private $client;

    public function __construct()
    {
        $this->client = new HttpClient([
            'base_uri' => self::BASE_URL
        ]);
    }

    public function searchCard($spec, $page = 0)
    {
        $options = [];

        if ($name) {
            $options = ['query' => ['name' => $name]];
        }

        if ($page) {
            $options['query']['page'] = $page;
        }

        return $this->client->get(self::MTG_CARDS, $options);
    }

    public function getCard($id)
    {
        return $this->client->get(self::MTG_CARDS . "/$id");
    }
}
