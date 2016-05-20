Deckbrew API
============

![travis-ci](https://travis-ci.org/fe-lix-/deckbrew-api.svg?branch=master)
[![Coverage Status](https://coveralls.io/repos/fe-lix-/deckbrew-api/badge.svg?branch=master&service=github)](https://coveralls.io/github/fe-lix-/deckbrew-api?branch=master)

A PHP wrapping of the DeckBrew Api. Find their documentation (here)[https://deckbrew.com/api/].

Usage
=====

You can instantiate the client either via the factory:

```
$client = DeckBrew\ClientFactory::create();
```

Or you can create it directy injecting your own Guzzle Http Client

```
$client = new DeckBrew\Client($httpClient);
```

To make a request :

```
use DeckBrew\Criteria;
use DeckBrew\Criteria\Specifications as Spec;

$client->searchCard(new Criteria\CardSearch([
    Spec\WithName('some name'),
]);
```