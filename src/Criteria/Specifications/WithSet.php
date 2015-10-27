<?php

namespace DeckBrew\Criteria\Specifications;

class WithSet extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'set';
    }
}
