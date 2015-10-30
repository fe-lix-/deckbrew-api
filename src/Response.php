<?php

namespace DeckBrew;

class Response
{
    /** @var array */
    private $content;

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}
