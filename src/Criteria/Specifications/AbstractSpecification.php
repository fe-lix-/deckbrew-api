<?php

namespace DeckBrew\Criteria\Specifications;

abstract class AbstractSpecification
{
    /** @var string */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    abstract public function getSpecificationType();
}
