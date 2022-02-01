<?php

namespace App\Product\Domain\Entity;

use App\Product\Domain\ValueObject\ProductId;
use App\Product\Domain\ValueObject\ProductName;

class Product
{
    const ATTRIBUTE_ID = 'id';
    const ATTRIBUTE_NAME = 'name';

    private ProductId $id;
    private ProductName $name;

    public function __construct(
        ProductId $id,
        ProductName $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): ProductId
    {
        return $this->id;
    }

    public function getName(): ProductName
    {
        return $this->name;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new ProductId($data[self::ATTRIBUTE_ID]),
            new ProductName($data[self::ATTRIBUTE_NAME]),
        );
    }

    public function toArray(): array
    {
        return [
            self::ATTRIBUTE_ID => $this->id->getId(),
            self::ATTRIBUTE_NAME => $this->name->getName(),
        ];
    }
}