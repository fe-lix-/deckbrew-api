<?php

namespace DeckBrew\Criteria\Specifications;

class IsMulticolor extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'ismulticolor';
    }
}
