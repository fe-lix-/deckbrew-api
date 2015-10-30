<?php

namespace DeckBrew;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;

class Client
{
    const BASE_URL = 'https://api.deckbrew.com/';
    const MTG_CARDS = '/mtg/cards';
    const MTG_SETS = '/mtg/sets';
    const MTG_TYPES = '/mtg/types';
    const MTG_SUPERTYPES = '/mtg/supertypes';
    const MTG_SUBTYPES = '/mtg/subtypes';
    const MTG_COLORS = '/mtg/colors';

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

        return $this->getRequest($url);
    }

    public function getCard($id)
    {
        return $this->getRequest(self::MTG_CARDS . "/$id");
    }

    public function getSets()
    {
        return $this->getRequest(self::MTG_SETS);
    }

    public function getSet($id)
    {
        return $this->getRequest(self::MTG_SETS . "/$id");
    }

    public function getTypes()
    {
        return $this->getRequest(self::MTG_TYPES);
    }

    public function getSuperTypes()
    {
        return $this->getRequest(self::MTG_SUPERTYPES);
    }

    public function getSubTypes()
    {
        return $this->getRequest(self::MTG_SUBTYPES);
    }

    public function getColors()
    {
        return $this->getRequest(self::MTG_COLORS);
    }

    /**
     * @param $url
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    protected function getRequest($url)
    {
        $response = $this->client->request('GET', $url);
        $body = $response->getBody();

        return new Response(json_decode($body, true));
    }
}
