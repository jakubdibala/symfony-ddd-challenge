<?php

namespace App\Product\Infrastructure\Persistence\Cache;

use App\Product\Domain\ValueObject\ProductId;
use App\Product\Domain\ValueObject\ProductQueryCount;
use App\Product\Repository\IProductQueryCountRepository;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class SymfonyProductQueryCountRepository implements IProductQueryCountRepository
{
    public function increment(ProductId $id): ProductQueryCount
    {
        $cache = new FilesystemAdapter();

        $cacheItem = $cache->getItem($this->buildCacheKey($id));

        $hits = $cacheItem->get() ?? 0;
        $incrementedHits = ++$hits;

        $cacheItem->set($incrementedHits);
        $cache->save($cacheItem);

        return new ProductQueryCount($incrementedHits);
    }

    private function buildCacheKey(ProductId $id): string
    {
        return "cache:products:query-count:{$id->getId()}";
    }
}