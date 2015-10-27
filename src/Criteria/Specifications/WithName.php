<?php

namespace DeckBrew\Criteria\Specifications;

class WithName extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'name';
    }
}
