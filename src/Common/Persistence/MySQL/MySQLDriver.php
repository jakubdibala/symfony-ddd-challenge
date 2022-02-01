<?php

namespace App\Common\Persistence\MySQL;

class MySQLDriver implements IMySQLDriver
{
    public function findProduct(string $id): array
    {
        // TODO: PRETEND WE ARE QUERYING A REAL DATABASE

        return [
            'id' => $id,
            'name' => 'Apple iPhone 13 Pro',
        ];
    }
}