<?php

namespace DeckBrew\Criteria\Specifications;

class WithType extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'type';
    }
}
