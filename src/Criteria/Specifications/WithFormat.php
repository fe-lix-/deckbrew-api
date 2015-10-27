<?php

namespace DeckBrew\Criteria\Specifications;

class WithFormat extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'format';
    }
}
