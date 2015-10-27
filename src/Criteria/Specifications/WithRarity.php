<?php

namespace DeckBrew\Criteria\Specifications;

class WithRarity extends AbstractSpecification
{
    /**
     * @return string
     */
    public function getSpecificationType()
    {
        return 'rarity';
    }
}
