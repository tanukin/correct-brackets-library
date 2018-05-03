<?php

namespace Library\Controllers;

use Library\Exceptions\InvalidArgumentException;
use Library\Interfaces\BracketControllerInterface;
use Library\Interfaces\BracketServiceInterface;
use Library\Interfaces\BracketValidateInterface;

class BracketController implements BracketControllerInterface
{
    /**
     * @var BracketServiceInterface
     */
    private $service;

    /**
     * @var BracketValidateInterface
     */
    private $validate;

    /**
     * BracketController constructor.
     *
     * @param BracketServiceInterface $service
     * @param BracketValidateInterface $validate
     */
    public function __construct(BracketServiceInterface $service, BracketValidateInterface $validate)
    {
        $this->service = $service;
        $this->validate = $validate;
    }

    /**
     * {@inheritdoc}
     */
    public function check(string $line, array $allowedChars): bool
    {
        if (!$this->validate->isValid($line, $allowedChars))
            throw new InvalidArgumentException("The line uses forbidden characters.");

        $isCorrect = $this->service->check($line);

        return $isCorrect;
    }
}