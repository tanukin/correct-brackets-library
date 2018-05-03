<?php

namespace Library\Core;

use Library\Interfaces\BracketValidateInterface;

class BracketValidate implements BracketValidateInterface
{
    /**
     * {@inheritdoc}
     */
    public function isValid(string $line, array $allowedChars): bool
    {
        if (preg_match('~[^\\' . implode($allowedChars) . ']~', $line))
            return false;

        return true;
    }
}