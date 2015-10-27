<?php

namespace DeckBrew\Criteria\Specifications;

class WithColor extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'color';
    }
}
