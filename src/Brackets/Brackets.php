<?php
namespace Library\Brackets;

class Brackets{

    private $line;
    private $openBkt = 0;
    private $closeBkt = 0;

    /**
     * Brackets constructor.
     * @param $line
     */
    public function __construct(string $line){
        $this->line = $line;
    }

    /**
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }

     /**
     * @return void
     */
    public function incOpenBkt(): void
    {
        $this->openBkt++;
    }

    /**
     * @return void
     */
    public function incCloseBkt(): void
    {
        $this->closeBkt++;
    }

    /**
     * @return int
     */
    public function difference():int
    {
        return $this->openBkt - $this->closeBkt;
    }



}
