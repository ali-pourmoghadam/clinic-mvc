<?php

namespace App\core\middlewares;

use App\core\Application;
use App\core\Helper;
use App\core\Response;

class AccMiddleware extends BaseMiddlware{


    public array $actions = [];

    public function __construct(array $actions= [])
    {
            $this->actions = $actions;
    }



    public  function execute(){

      
        session_start();

        if(isset($_SESSION['email']))
            {
                if(empty($actions) || in_array(Application::$App->getController()->action , $this->actions))
                {
                    // Response::setHeaders(302);
                    echo Helper::redirect("");
                }
            }

           }

}