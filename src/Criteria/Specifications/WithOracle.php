<?php

namespace DeckBrew\Criteria\Specifications;

class WithOracle extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'oracle';
    }
}
