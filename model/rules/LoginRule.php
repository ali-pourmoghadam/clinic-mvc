<?php

namespace App\model\rules;

use App\core\Rules;

class LoginRule implements RulesInterface
{
   use Rules;
    
    public function Rules()
    {
        return [
            "email" => [$this->RULE_REQUIRED , $this->RULE_EMAIL ] , 
            "password" => [$this->RULE_REQUIRED ]
        ];
    }
    
}