<?php

namespace App\Common\Persistence\ElasticSearch;

interface IElasticSearchDriver
{
    public function findById(string $id): array;
}