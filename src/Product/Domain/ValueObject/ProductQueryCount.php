<?php

namespace App\Product\Domain\ValueObject;

final class ProductQueryCount
{
    private int $count;

    public function __construct(int $count)
    {
        $this->count = $count;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}