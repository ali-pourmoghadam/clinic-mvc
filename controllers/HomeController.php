<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;

class HomeController extends Controller{


    public function loadHome()
    {

       return  $this->render("home" , ['title' => "خانه"]);
       
    }


    public function testDb()
    {
        $db = Application::$App->database;
        var_dump($db->readAll("doctors"));
    }

}