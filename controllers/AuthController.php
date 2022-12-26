<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\core\Helper;
use App\core\Request;
use App\core\Model;
use App\model\Doctor;
use App\model\Patient;
use App\model\rules\LoginRule;
use App\model\rules\RegisterRule;
use App\model\rules\RulesInterface;

class AuthController extends Controller{


    public function loadLogin()
    {
        
    return $this->render("login" , ["title" => "ورود"]);
       
    }



    public function loadRegister()
    {
        
    return $this->render("register" , ["title" => "ثبت نام"]);
       
    }


    public function authRegister(Request $request)
    {

        $this->checkPostReq($request);

        $regsiterRule =  new RegisterRule;

        $type = $request->getbody()['account'] ;

        if($type == "doctor")
        {
                $model = new Doctor();
                return $this->authRegisterAction($request , $model , $regsiterRule);    
        }

        if($type == "patiant")
        {
                 $model = new Patient();    
                 return  $this->authRegisterAction($request , $model , $regsiterRule);
        }
    
    }





    public function authLogin(Request $request)
    {

        $this->checkPostReq($request);

        $model =  ($request->getbody()['account'] == "patiant") ? new Patient() : new Doctor();
                
        $model->loadData($request->getbody());

        if(!$model->validation(new LoginRule)) return $this->render("login" ,  [ "title" => "ورود", "model" => $model]);

        $res =  $model->login($request->getbody());

        if($res == false) Helper::redirect("login");

        Helper::redirect("");

    
    }


    public function logout()
    {
        Application::$App->session->remove("user");
        Helper::redirect();
    }



    private function authRegisterAction(Request $request , Model $model ,RulesInterface $rule)
    {

        $model->loadData($request->getbody());

        if(!$model->validation($rule)) return $this->render("register" ,  [ "title" => "ثبت نام", "model" => $model]);

        $model->save();

        Helper::redirect("");

    }


    
    private function checkPostReq(Request $request)
    {

        if(!$request->isPost()) die("Access Denied"); 
        if(empty($request->getBody())) die("something went wrong") ;

    }
   
}