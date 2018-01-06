<?php
 namespace Library\Services;

 use Library\Exceptions\InvalidArgumentException;
 use Library\Services\dto\BracketDto;

 class BracketService{

     private $bracketDto;
     const ALLOWED_CHARS = ['(',')','\r', '\n', '\t', '\s'];

     /**
      * BracketService constructor.
      * @param $line
      * @throws InvalidArgumentException
      */
     public function __construct(string $line)
     {
         $this->bracketDto = new BracketDto;
         if(!$this->isValid($line))
             throw new InvalidArgumentException("The line uses forbidden characters.");
         $this->bracketDto->setLine($line)->create();
     }

     /**
      * @return bool
      */
     public function check():bool
     {
         foreach (str_split($this->bracketDto->getBrackets()->getLine()) as $key=>$item)
         {
             switch ($item)
             {
                 case '(':
                     $this->bracketDto->getBrackets()->incOpenBkt();
                     break;
                 case ')':
                     $this->bracketDto->getBrackets()->incCloseBkt();
                     break;
             }
             if($this->bracketDto->getBrackets()->difference() < 0)
                 return false;
         }
         return $this->bracketDto->getBrackets()->difference()== 0? true: false;
     }

     /**
      * @param $line
      * @return bool
      */
     public function isValid($line):bool
     {
         $isValid = !preg_match('~[^\\'.implode(BracketService::ALLOWED_CHARS).']~', $line);
         return $isValid === true;
     }
 }