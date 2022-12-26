<?php

namespace App\database\interfaces;

use App\database\interfaces\DatabaseConnectionInterface;

interface DatabaseInterface
{
   
    public function readAll(string $tabel);
    public function readRow(string $tabel ,mixed $column , mixed $value);
    public function search(string $tabel , mixed $column , mixed $value);
    public function update(string $tabel ,mixed $column , mixed $value);
    public function delete(string $tabel ,mixed $column , mixed $value);
    public function insert(string $tabel ,array $data);
    
}