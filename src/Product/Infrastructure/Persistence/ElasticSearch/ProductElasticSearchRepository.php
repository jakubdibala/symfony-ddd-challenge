<?php

namespace App\Product\Infrastructure\Persistence\ElasticSearch;

use App\Common\Persistence\ElasticSearch\ElasticSearchDriver;
use App\Product\Domain\Entity\Product;
use App\Product\Domain\ValueObject\ProductId;
use App\Product\Repository\IProductRepository;

class ProductElasticSearchRepository implements IProductRepository
{
    private ElasticSearchDriver $elasticSearch;

    public function __construct(ElasticSearchDriver $elasticSearch)
    {
        $this->elasticSearch = $elasticSearch;
    }

    public function findById(ProductId $id): Product
    {
        $data = $this->elasticSearch->findById($id->getId());

        return Product::fromArray($data);
    }
}