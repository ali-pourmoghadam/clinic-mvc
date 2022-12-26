<?php

namespace App\core;


 trait Rules{

    public string $RULE_REQUIRED = "required" ; 
    public string $RULE_EMAIL = "email" ; 
    public string $RULE_MIN = "min" ; 
    public string $RULE_MAX = "max" ; 
    public string $RULE_MATCH = "match" ; 
    public string $RULE_UNIQUE = "uniqe" ; 



    
    public function errorText()
    {
        
        return [
            $this->RULE_REQUIRED => 'This field is required',
            $this->RULE_EMAIL => 'This field must be valid email address',
            $this->RULE_MIN => 'Min length of this field must be {min}',
            $this->RULE_MAX => 'Max length of this field must be {max}',
            $this->RULE_MATCH => 'This field must be the same as {match}',
            $this->RULE_UNIQUE => 'Record with with this email already exists',
        ];

    }

 }
