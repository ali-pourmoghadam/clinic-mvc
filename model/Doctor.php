<?php

namespace App\model;

use App\core\Application;
use App\core\Model;
use App\core\User;
use App\model\rules\RulesInterface;

class Doctor extends User{


    public string $email = '';
    protected string $phoneNumber = '';
    protected string $password = '';
    public string $gender = '';
    public string $account = '';
    protected string $passwordReapeat = '';


    protected function saveAttr()
    {
        return [
            "email" ,
            "phoneNumber",
            "password",
            "gender"   
        ];
    }


    public function loadDoctors($value = null ,  $param = null)
    {  
   
        $doctors =  Application::$App->database->readAll("doctors") ?? [];

        $activeDays =  Application::$App->database->readAll("doctorweeks") ?? [];

        $specialty =  Application::$App->database->readAll("specialties") ?? [];


        if($param == "specialty")
        {
            $specialty = Application::$App->database->search("specialties" , "name" , "%$value%");
            
            $newDocs = [];

            foreach($specialty as $key=>$value)
            {
                foreach($doctors as $doctor)
                {
                   if( $doctor["specialty"] == $value['id']) $newDocs[] = $doctor;
                }

            }

            $doctors =$newDocs;

        }


        if($param == "fullName")
        {
            $doctors = Application::$App->database->search("doctors" , "fullName" , "%$value%");
        }


      
      
        foreach($doctors as $value)
        {
            $data[$value["id"]]["fullName"] =  $value['fullName'];  
           
            foreach($specialty as $item)
            {
                if($item["id"] == $value["specialty"])
                {
                    $data[$value["id"]]["specialty"] =  $item["name"];
                }
                  
            }

        }



        foreach( $activeDays as $value)
        {

            if(isset($data[$value["doctorId"]]))
            {
                
                $data[$value["doctorId"]]["activeDays"] = $value;
            }
          
        }


        return $data ?? false;      
    }



    public function searchDoctor($column , $name)
    {
       return Application::$App->database->search("doctors" , $column , "%$name%")  ?? false;
    }
  
}