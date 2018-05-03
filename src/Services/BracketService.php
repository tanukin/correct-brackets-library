<?php

namespace Library\Services;

use Library\Interfaces\BracketServiceInterface;
use Library\Repository\BracketRepository;


class BracketService implements BracketServiceInterface
{
    /**
     * @var BracketRepository
     */
    private $repository;

    const OPEN = "(";
    const CLOSE = ")";

    /**
     * BracketService constructor.
     *
     * @param BracketRepository $repository
     */
    public function __construct(BracketRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function check(string $line): bool
    {
        $arr = str_split($line);

        foreach ($arr as $item) {
            switch ($item) {
                case self::OPEN:
                    $this->repository->incOpen();
                    break;
                case self::CLOSE:
                    $this->repository->incClose();
                    break;
            }
            if ($this->repository->difference() < 0)
                return false;
        }

        return $this->repository->difference() == 0 ? true : false;
    }
}