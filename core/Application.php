<?php


namespace App\core;
use App\database\interfaces\DatabaseInterface as InterfacesDatabaseInterface;
use App\database\sql\MysqlDatbase;

class Application{


    public static string $Addr;
    public static Application $App;

    
    public Router $router;
    public Controller $controller;
    public Model $userType;
    public InterfacesDatabaseInterface $database;
    public Session $session;
    public array $config;



    public function __construct(string $Addr)
    {
        self::$Addr = $Addr;
        self::$App  = $this;
        $this->router = new Router(new Request());
        $this->database = new MysqlDatbase();
        $this->session = new Session();
    }



    public function getController()
    {
        return  $this->controller ;
    }




    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }



    public function getConfig(string $key)
    {
        return $this->config[$key] ?? false;
    }



    public function setConfig(string $Key ,string $value)
    {
        $this->config[$Key] = $_ENV[$value];
    }


    
    public function isGuest()
    {
    return !$this->session->getKey("user");
    }

    public function run()
    {
        echo $this->router->resolve();
    }

}

