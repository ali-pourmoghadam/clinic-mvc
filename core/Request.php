<?php


namespace App\core;


class Request{



    public function getPath()
    {
        return ($_GET['url']) ?? "/" ; 
    }



    public function getRequestMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    
    public function getBody()
    {
        $res = [];

   
        if($this->isGet())
        {
            foreach ($_GET as $key => $value) {

                if($key == "url") continue;
                $res[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->isPost())
        {

            foreach ($_POST as $key => $value) {
                $res[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $res;
        
    }


    public function isPost()
    {
        return ($this->getRequestMethod() == "post") ? true : false;
    }



    public function isGet()
    {
        return ($this->getRequestMethod() == "get") ? true : false;
    }

}

