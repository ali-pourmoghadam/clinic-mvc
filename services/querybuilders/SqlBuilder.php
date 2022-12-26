<?php

namespace App\services\querybuilders;

use App\database\interfaces\DatabaseConnectionInterface;
use App\database\sql\MysqlConnection;
use PDOStatement;

class SqlBuilder{


    
    private $connection ;
    private string $table ;
    public string $query;
    private PDOStatement $res;





    public function __construct()
    {
        MysqlConnection::connection();

        $this->connection = MysqlConnection::connect();

    }





    public function table(string $table){

        $this->table = $table;

        return $this;

    }




    public function select(array $cols = ["*"])
    {
        
        $selctItems = "";

        foreach($cols as $item){ $selctItems .= " {$item}";}
         
        $this->query = "SELECT {$selctItems} FROM {$this->table}";

        return $this;
        
    }




    public function insert(array $fields){

        $insert = "";

      

        foreach($fields as $key=>$value){

            $insert .= "{$key} = '{$value}' ,";
        }

        $this->query = rtrim("INSERT INTO {$this->table} SET {$insert}" , ",");

        return $this;
 
    }

    


    public function update(array $field){

        $update = "";

        foreach($field as $key=>$value){

            $update .= "{$key} = '{$value}' ,";

        }

        $this->query = rtrim("UPDATE {$this->table} SET {$update}" , ",");

        return $this;
    }






    public function where(string $val1 , string $val2 , string $opration ="="){
        
        $this->query .= " WHERE $val1 $opration '$val2'";

        return $this;
    }



    public function fetch(){

       return $this->res->fetch($this->connection::FETCH_ASSOC);

    }


    public function fetchAll(){

        return $this->res->fetchAll($this->connection::FETCH_ASSOC);

    }



    public function exec(){

      $stmt =   $this->connection->prepare($this->query);
      $stmt->execute();
      $this->res = $stmt;

      return $this;
    }


}
