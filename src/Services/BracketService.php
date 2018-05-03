<?php

namespace Library\Services;

use Library\Exceptions\InvalidArgumentException;
use Library\Services\dto\BracketDto;

class BracketService
{
    /**
     * @var BracketDto
     */
    private $bracketDto;

    /**
     * @var string
     */
    private $line;

    const ALLOWED_CHARS = ['(', ')', '\r', '\n', '\t', '\s'];

    /**
     * BracketService constructor.
     *
     * @param $line
     */
    public function __construct(string $line)
    {
        $this->bracketDto = new BracketDto;
        $this->line = $line;
    }

    /**
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function check(): bool
    {
        $this->isValid($this->line);
        $this->bracketDto->setLine($this->line)->create();

        foreach (str_split($this->bracketDto->getBrackets()->getLine()) as $key => $item) {
            switch ($item) {
                case '(':
                    $this->bracketDto->getBrackets()->incOpenBkt();
                    break;
                case ')':
                    $this->bracketDto->getBrackets()->incCloseBkt();
                    break;
            }
            if ($this->bracketDto->getBrackets()->difference() < 0)
                return false;
        }
        return $this->bracketDto->getBrackets()->difference() == 0 ? true : false;
    }

    /**
     * @param $line
     *
     * @throws InvalidArgumentException
     */
    public function isValid(string $line): void
    {
        $isValid = !preg_match('~[^\\' . implode(BracketService::ALLOWED_CHARS) . ']~', $line);

        if ($isValid !== true)
            throw new InvalidArgumentException("The line uses forbidden characters.");
    }
}