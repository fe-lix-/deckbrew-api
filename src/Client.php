<?php

namespace DeckBrew;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;

class Client
{
    const BASE_URL = 'https://api.deckbrew.com/';
    const MTG_CARDS = '/mtg/cards';

    /** @var HttpClientInterface */
    private $client;

    private $options = [
        'base_uri' => self::BASE_URL
    ];

    public function __construct(HttpClientInterface $client = null)
    {
        $this->client = $client ? $client : new HttpClient($this->options);
    }

    public function searchCard(Criteria\CardSearch $criteria = null, $pageNumber = 0)
    {
        $url = self::MTG_CARDS;


        $queryParams = [];
        if ($criteria) {
            foreach ($criteria->getCriteria() as $value) {
                $queryParams[] = sprintf('%s=%s', key($value), current($value));
            }
        }

        if ($pageNumber > 0) {
            $queryParams[] = sprintf('%s=%s', 'page', $pageNumber);
        }

        if ($queryParams) {
            $url = $url . "?" . implode('&', $queryParams);
        }

        return $this->client->request('GET', $url);
    }

    public function getCard($id)
    {
        return $this->client->request('GET', self::MTG_CARDS . "/$id");
    }
}
