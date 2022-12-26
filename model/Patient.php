<?php

namespace App\model;

use App\core\Model;
use App\core\User;

class Patient extends User{

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

}