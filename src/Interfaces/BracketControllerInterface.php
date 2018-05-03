<?php

namespace Library\Interfaces;

use Library\Exceptions\InvalidArgumentException;

interface BracketControllerInterface
{
    /**
     * @param string $line
     * @param array $allowedChars
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function check(string $line, array $allowedChars): bool;
}