<?php

namespace Library\Command;

use Library\Controllers\BracketController;
use Library\Core\BracketValidate;
use Library\Exceptions\InvalidArgumentException;
use Library\Repository\BracketRepository;
use Library\Services\BracketService;

class BracketCommand
{

    /**
     * @var string
     */
    private $line;
    /**
     * @var array
     */
    private $allowedChars;

    /**
     * BracketCommand constructor.
     *
     * @param string $line
     * @param array $allowedChars
     */
    public function __construct(string $line, array $allowedChars = ['(', ')', '\r', '\n', '\t', '\s'])
    {
        $this->line = $line;
        $this->allowedChars = $allowedChars;
    }

    /**
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function execute(): bool
    {
        $bracketRepository = new BracketRepository();
        $bracketService = new BracketService($bracketRepository);
        $bracketValidate = new BracketValidate();
        $bracketController = new BracketController($bracketService, $bracketValidate);

        return $bracketController->check($this->line, $this->allowedChars);
    }
}