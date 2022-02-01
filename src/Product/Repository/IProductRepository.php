<?php

namespace App\Product\Repository;

use App\Product\Domain\Entity\Product;
use App\Product\Domain\ValueObject\ProductId;

interface IProductRepository
{
    public function findById(ProductId $id): Product;
}