<?php

namespace DeckBrew\Card\Specification;

class Color
{
    private $color;

    /**
     * @param string $color
     */
    public function __construct($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return 'color';
    }
}
