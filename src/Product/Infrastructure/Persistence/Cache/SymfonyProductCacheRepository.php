<?php

namespace App\Product\Infrastructure\Persistence\Cache;

use App\Product\Domain\Entity\Product;
use App\Product\Domain\ValueObject\ProductId;
use App\Product\Repository\IProductCacheRepository;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class SymfonyProductCacheRepository implements IProductCacheRepository
{
    public function getById(ProductId $id, callable $saveCallback): Product
    {
        $cache = new FilesystemAdapter();

        return $cache->get(
            $this->buildProductCacheKey($id),
            function (ItemInterface $item) use ($saveCallback) {
                // Never expires.
                $item->expiresAt(null);

                return $saveCallback();
            }
        );
    }

    private function buildProductCacheKey(ProductId $id): string
    {
        return "cache:products:{$id->getId()}";
    }
}