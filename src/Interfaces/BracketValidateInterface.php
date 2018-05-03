<?php

namespace Library\Interfaces;

interface BracketValidateInterface
{
    /**
     * @param string $line
     * @param array $allowedChars
     *
     * @return bool
     */
    public function isValid(string $line, array $allowedChars): bool;
}