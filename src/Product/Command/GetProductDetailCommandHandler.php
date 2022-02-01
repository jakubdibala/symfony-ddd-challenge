<?php

namespace App\Product\Command;

use App\Product\Domain\Entity\Product;
use App\Product\Domain\Entity\ProductInfo;
use App\Product\Domain\ValueObject\ProductId;
use App\Product\Repository\IProductCacheRepository;
use App\Product\Repository\IProductQueryCountRepository;
use App\Product\Repository\IProductRepository;

class GetProductDetailCommandHandler
{
    private IProductRepository $productRepository;
    private IProductCacheRepository $productCacheRepository;
    private IProductQueryCountRepository $productQueryCountRepository;

    public function __construct(
        IProductRepository $productRepository,
        IProductCacheRepository $productCacheRepository,
        IProductQueryCountRepository $productQueryCountRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productCacheRepository = $productCacheRepository;
        $this->productQueryCountRepository = $productQueryCountRepository;
    }

    public function __invoke(GetProductDetailCommand $command): ProductInfo
    {
        $productId = new ProductId($command->getProductId());

        $product = $this->productCacheRepository->getById(
            $productId,
            function () use ($productId) {
                return $this->productRepository->findById($productId);
            }
        );

        $queryCount = $this->productQueryCountRepository->increment($productId);

        return new ProductInfo(
            $product,
            $queryCount
        );
    }
}