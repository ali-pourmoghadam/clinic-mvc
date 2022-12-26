<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;

class AdminController extends Controller{


    public function loadDashboard()
    {

       $this->setLayout("admin");
       return  $this->render("admin" , ['title' => "داشبورد ادمین"]);
       
    }


}