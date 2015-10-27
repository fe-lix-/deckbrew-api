<?php

namespace DeckBrew\Criteria;

use DeckBrew\Criteria\Specifications\AbstractSpecification;

class CardSearch
{
    /** @var AbstractSpecification[] */
    private $specifications = [];

    /** @var int */
    private $page;

    /**
     * @param AbstractSpecification[] $specifications
     */
    public function __construct(array $specifications)
    {
        $this->specifications = $specifications;
    }

    /**
     * @return array
     */
    public function getCriteria()
    {
        $criteria = [];
        foreach ($this->specifications as $specification) {
            $criteria[] = [$specification->getSpecificationType() => $specification->getValue()];
        }

        if (!is_null($this->page)) {
            $criteria['page'] = $this->page;
        }

        return $criteria;
    }
}
