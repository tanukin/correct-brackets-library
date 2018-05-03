<?php

namespace Library\Repository;

class BracketRepository
{
    /**
     * @var int
     */
    private $openBkt = 0;

    /**
     * @var int
     */
    private $closeBkt = 0;

    /**
     * @return void
     */
    public function incOpen(): void
    {
        $this->openBkt++;
    }

    /**
     * @return void
     */
    public function incClose(): void
    {
        $this->closeBkt++;
    }

    /**
     * @return int
     */
    public function difference(): int
    {
        return $this->openBkt - $this->closeBkt;
    }
}