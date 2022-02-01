<?php

namespace App\Common\Persistence\ElasticSearch;

class ElasticSearchDriver implements IElasticSearchDriver
{
    public function findById(string $id): array
    {
        // TODO: PRETEND WE ARE QUERYING A REAL ES INSTANCE

        return [
            'id' => $id,
            'name' => 'Apple iPhone 13 Pro ES',
        ];
    }
}