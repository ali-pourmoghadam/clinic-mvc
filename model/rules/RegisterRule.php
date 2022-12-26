<?php

namespace App\model\rules;

use App\core\Rules;

class RegisterRule implements RulesInterface
{
   use Rules;
    
    public function Rules()
    {
        return [
            "email" => [$this->RULE_REQUIRED , $this->RULE_EMAIL , $this->RULE_UNIQUE ] , 
            "phoneNumber" => [$this->RULE_REQUIRED ,[ $this->RULE_MIN  , "min" =>3] , [ $this->RULE_MAX  , "max" =>20]],
            "password" => [$this->RULE_REQUIRED  , [$this->RULE_MIN , "min" => 6]],
            "gender" => [$this->RULE_REQUIRED],
            "account" => [$this->RULE_REQUIRED],
            "passwordReapeat" => [$this->RULE_REQUIRED ,[ $this->RULE_MATCH , "match" => "password"]]
        ];
    }
    
}