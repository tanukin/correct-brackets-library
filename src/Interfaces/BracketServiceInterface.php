<?php

namespace Library\Interfaces;

interface BracketServiceInterface
{
    /**
     * @param string $line
     *
     * @return bool
     */
    public function check(string $line): bool;
}