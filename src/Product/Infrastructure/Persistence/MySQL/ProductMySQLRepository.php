<?php

namespace App\Product\Infrastructure\Persistence\MySQL;

use App\Common\Persistence\MySQL\MySQLDriver;
use App\Product\Domain\Entity\Product;
use App\Product\Domain\ValueObject\ProductId;
use App\Product\Repository\IProductRepository;

class ProductMySQLRepository implements IProductRepository
{
    private MySQLDriver $database;

    public function __construct(MySQLDriver $database)
    {
        $this->database = $database;
    }

    public function findById(ProductId $id): Product
    {
        $data = $this->database->findProduct($id->getId());

        return Product::fromArray($data);
    }
}