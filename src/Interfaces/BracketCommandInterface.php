<?php

namespace Library\Interfaces;

use Library\Exceptions\InvalidArgumentException;

interface BracketCommandInterface
{
    /**
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function execute(): bool;
}