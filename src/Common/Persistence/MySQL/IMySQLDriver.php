<?php

namespace App\Common\Persistence\MySQL;

interface IMySQLDriver
{
    public function findProduct(string $id): array;
}