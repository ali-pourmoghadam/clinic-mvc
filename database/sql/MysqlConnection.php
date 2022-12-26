<?php



namespace App\database\sql;

use App\database\interfaces\DatabaseConnectionInterface;
use PDO;

class MysqlConnection implements DatabaseConnectionInterface{


    private static array $inctances;
    private static PDO $pdo;



    private function __construct()
    {}

    private function __clone()
    {}

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }




    public static function getIncetance()
    {
        $className = explode("\\" , self::class);
        $className = end($className);        

        if(isset(self::$inctances[$className])) return self::$inctances[$className];

        self::$inctances[$className] = new self;
        
    }



    public static function connection()
    {
        $host = $_ENV["DB_HOST"];

        $dbName = $_ENV["DB_NAME"];

        $username = $_ENV["USERNAME"];

        $password = $_ENV["PASSWORD"];
        
        $port = $_ENV["PORT"];

        $option = 
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];


        self::$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbName" , $username , $password , $option);

    }


    public static function connect()
    {
        return self::$pdo; 
    }

    
}