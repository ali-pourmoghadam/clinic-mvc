<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\core\middlewares\AuthMiddleware;
use App\core\Request;
use App\model\Doctor;

class DoctorController extends Controller{



    public function __construct()
    {
        $this->regsiterMiddlware(new AuthMiddleware(["loadDashboard"]));
    }


    public function loadDashboard()
    {
       $this->setLayout("admin");
       return  $this->render("doctor" , ['title' => "داشبورد دکتر"]);
       
    }


    public function doctorsList()
    {
        $model = new Doctor();
       
        return  $this->render("doctorsList" , ['title' => " لیست دکترها" , "docs" =>  $model->loadDoctors()] );
    }






    public function filterDoc(Request $request)
    {
        $model = new Doctor();
       
        $name = $request->getBody()["fullName"];      
        $filter = $request->getBody()["filter"];  



        $data = $model->loadDoctors($name ,$filter);


        return  $this->render("doctorsList" , ['title' => " لیست دکترها" , "docs" =>$data  ] );
    }
    





    public function searchDoc(Request $request)
    {

        $model = new Doctor();
        $name = $request->getBody()["name"];      
        return  $this->render("search" , ['title' => " لیست دکترها" , "docs" =>  $model->searchDoctor("fullName" ,$name)] );

    }
}