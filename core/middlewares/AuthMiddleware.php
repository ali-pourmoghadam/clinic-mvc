<?php

namespace App\core\middlewares;

use App\core\Application;
use App\core\Response;

class AuthMiddleware extends BaseMiddlware{


    public array $actions = [];

    public function __construct(array $actions= [])
    {
            $this->actions = $actions;
    }



    public  function execute(){

        if(!isset($_SESSION['user']))
            {
                if(empty( $this->actions) ||   in_array(Application::$App->getController()->action , $this->actions))
                {
                    die("access denied");                
                    // Response::setHeaders(403);
                    //echo  Application::$App->getController()->render("_error" , $params = ["title" => "403" ,"code" => 403  , "msg" => "UnAuthurize Access"]);
                }
            }

           }

}