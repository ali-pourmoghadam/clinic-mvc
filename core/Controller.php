<?php


namespace App\core;
use App\core\Application;
use App\core\middlewares\BaseMiddlware;

class Controller{


    public string $layout = "main";
    public array $middleWares = [];
    public string $action = '';



    public function setLayout($layout)
    {
        $this->layout = $layout;
    }


    
    public function render(string $path , $params = [])
    {
        return Application::$App->router->renderView($path , $params);
    }


    public function regsiterMiddlware(BaseMiddlware $middlware)
    {
        $this->middleWares[] = $middlware;
    }

}