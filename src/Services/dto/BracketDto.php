<?php

namespace Library\Services\dto;

use Library\Brackets\Brackets;

class BracketDto
{
    /**
     * @var string
     */
    private $line;

    /**
     * @var Brackets
     */
    private $brackets;

    /**
     * @param $line
     *
     * @return BracketDto
     */
    public function setLine(string $line): BracketDto
    {
        $this->line = $line;
        return $this;
    }

    /**
     * @return Brackets
     */
    public function create(): Brackets
    {
        return $this->brackets = new Brackets($this->line);
    }

    /**
     * @return Brackets
     */
    public function getBrackets(): Brackets
    {
        return $this->brackets;
    }


}