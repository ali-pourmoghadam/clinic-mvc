<?php


namespace App\core;

use App\model\rules\RulesInterface;

abstract class Model{

    use Rules;
    public array $error = [];


    public function loadData(array $Data)
    {   

        foreach ($Data as $Key=>$value)
        {
            if(property_exists($this , $Key))
            {
                $this->{$Key}  = $value;
            }
        }
    }




    public function getTabelName()
    {
        $tabelName = explode("\\" , $this::class);

        $tabelName = end($tabelName)."s";

        return $tabelName;
    }




    public function save()
    {

        $db= Application::$App->database;

        $data = [];

        foreach($this->saveAttr() as $key)
        {
            $data[$key] = $this->{$key};
        }

        return $db->insert($this->getTabelName() , $data);

    }



    public function validation(RulesInterface $rule)
    {

        foreach ($rule->rules() as $attr=>$rules)
        {

      
            foreach($rules as $rule)
            {
                $ruleName = $rule;
                $value = $this->{$attr};

                
              

                if(is_array($rule))
                {
                    $ruleName = $rule[0];
                }

          
               

                if($ruleName == $this->RULE_REQUIRED && $value == '')
                {
                    $this->validatesError($attr , $ruleName);
                }
            
         

                if($ruleName == $this->RULE_MIN && strlen($value) < $rule['min'])
                {
                    $this->validatesError($attr , $ruleName ,  ["min" => $rule["min"]]);
                 
                }
                

                if($ruleName == $this->RULE_MAX && strlen($value) > $rule['max'])
                {
                    $this->validatesError($attr , $ruleName ,  ["max" => $rule["max"]]);
                }


                if($ruleName == $this->RULE_MATCH &&  $value != $this->{$rule["match"]})
                {
             
                    $this->validatesError($attr , $ruleName  , ["match" => $rule["match"]]);
                 
                }

                if($ruleName == $this->RULE_UNIQUE )
                {
            
                    $db = Application::$App->database;

                    $info = $db->readRow( $this->getTabelName(), $attr , $value );

                    if($info) $this->validatesError($attr , $ruleName );
                 
                }

            }
        }

        return empty($this->error);
    }

    

    public function validatesError(string $attr , string $err  ,array $params = [])
    {

        $errorMessage =  $this->errorText()[$err] ;

        foreach ($params as $key => $value)
        {
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage);
        }


         $this->error[$attr][] = $errorMessage;
    }




    
    public function hasError($attribute)
    {
        return $this->error[$attribute] ?? false;
    }





    public function getFirstError($attribute)
    {
        $error = $this->error[$attribute] ?? [];
        return $error[0] ;

    }



    protected abstract function saveAttr();

}

