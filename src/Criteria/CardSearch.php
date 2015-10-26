<?php

namespace DeckBrew\Criteria;

class CardSearch
{
    private $criteria = [];

    /**
     * @param string $name
     * @return this
     */
    public function withType($name)
    {
        $this->criteria['type'] = $name;

        return $this;
    }

    /**
     * @param string $name
     * @return this
     */
    public function withSuperType($name)
    {
        $this->criteria['supertype'] = $name;

        return $this;
    }

    /**
     * @param string $color
     * @return this
     */
    public function withColor($color)
    {
        $this->criteria['color'] = $color;

        return $this;
    }

    /**
     * @param string $name
     * @return this
     */
    public function withName($name)
    {
        $this->criteria['name'] = $name;

        return $this;
    }

    /**
     * @param string $oracle
     * @return this
     */
    public function withOracle($oracle)
    {
        $this->criteria['oracle'] = $oracle;

        return $this;
    }

    /**
     * @param string $setName
     * @return this
     */
    public function withSet($setName)
    {
        $this->criteria['set'] = $setName;

        return $this;
    }

    public function withRarity($rarity)
    {
        $this->criteria['rarity'] = $rarity;

        return $this;
    }

    public function isMulticolor($isMulticolor)
    {
        $this->criteria['ismulticolor'] = $ismulticolor

        return $this;
    }

    public function withMultiverseId($multiverseId)
    {
        $this->criteria['multiverseid'] = $multiverseid;

        return $this;
    }

    public function withFormat($format)
    {
        $this->criteria['format'] = $format;

        return $this;
    }

    public function withStatus($status)
    {
        $this->criteria['status'] = $status;

        return $this;
    }

    /**
     * @param int $number
     * @return this
     */
    public function withPage($number)
    {
        $this->criteria['page'] = $number;
    }

    /**
     * @return array
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
