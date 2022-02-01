<?php

namespace App\Product\Repository;

use App\Product\Domain\ValueObject\ProductId;
use App\Product\Domain\ValueObject\ProductQueryCount;

interface IProductQueryCountRepository
{
    public function increment(ProductId $id): ProductQueryCount;
}