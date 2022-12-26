<?php

namespace App\database\sql;

use App\database\interfaces\DatabaseInterface;
use App\services\querybuilders\SqlBuilder;

class MysqlDatbase implements DatabaseInterface
{
    private SqlBuilder $queryBuilder;


    public function __construct()
    {
        $this->queryBuilder = new SqlBuilder();
    }


    public function readAll(string $tabel)
    {
       return $this->queryBuilder->table($tabel)->select()->exec()->fetchAll();
    }

    public function readRow(string $tabel , mixed $column , mixed $value)
    {
        return $this->queryBuilder->table($tabel)->select()->where($column ,$value)->exec()->fetchAll();
    }


    public function search(string $tabel , mixed $column , mixed $value)
    {
        
        return $this->queryBuilder->table($tabel)->select()->where($column , $value ," like ")->exec()->fetchAll();
    }

    public function update(string $tabel ,mixed $column , mixed $value)
    {

    }
    public function delete(string $tabel ,mixed $column , mixed $value)
    {

    }
    public function insert(string $tabel ,array $data)
    {
        $this->queryBuilder->table($tabel)->insert($data)->exec();
        return true;
    }

}