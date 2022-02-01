<?php

namespace App\Product\Domain\Entity;

use App\Product\Domain\ValueObject\ProductQueryCount;

class ProductInfo
{
    private Product $product;
    private ProductQueryCount $queryCount;

    public function __construct(
        Product $product,
        ProductQueryCount $queryCount
    ) {
        $this->product = $product;
        $this->queryCount = $queryCount;
    }

    public function toArray(): array
    {
        return array_merge(
            $this->product->toArray(),
            [
                'query_count' => $this->queryCount->getCount(),
            ]
        );
    }
}