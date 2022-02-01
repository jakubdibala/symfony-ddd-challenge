<?php

namespace App\Product\Repository;

use App\Product\Domain\Entity\Product;
use App\Product\Domain\ValueObject\ProductId;

interface IProductCacheRepository
{
    public function getById(ProductId $id, callable $saveCallback): Product;
}