<?php

namespace DeckBrew\Criteria\Specifications;

class WithStatus extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'status';
    }
}
