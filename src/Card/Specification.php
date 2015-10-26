<?php

namespace DeckBrew\Card;

class Specification
{
    private $specification;

    public function __construct(array $specification)
    {
        $this->specification = $specification;
    }
}
