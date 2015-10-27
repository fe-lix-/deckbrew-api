<?php

namespace DeckBrew\Criteria\Specifications;

class WithMultiverseId extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'multiverseid';
    }
}
