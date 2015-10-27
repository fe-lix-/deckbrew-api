<?php

namespace DeckBrew\Criteria\Specifications;

class WithSuperType extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'supertype';
    }
}
