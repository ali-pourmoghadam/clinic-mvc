<?php


namespace App\core;

use App\model\Doctor;
use App\model\Patient;

abstract class User extends Model{
  



    public function login(array $data)
    {
        
        $info  = $this->userInfo($data["account"] , $data["email"]);

        if(empty($info) ||  $data['password'] != $info[0]['password']) return false;

        Application::$App->session->setKey("user" , ["email" => $data["email"] , "type" => $data["account"]]);

        return true;
    }



    public function userInfo(string $tabel , string $email)
    {
        $info = Application::$App->database->readRow($tabel."s" , "email" , $email);

        return $info ?? false;

    }
    
}
