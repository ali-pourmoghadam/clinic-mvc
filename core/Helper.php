<?php


namespace App\core;


class Helper{



    public static function getPartials(string $partials)
    {

       $path ="views".DIRECTORY_SEPARATOR."partials".DIRECTORY_SEPARATOR."$partials.php"; 

       return (static::checkFileExists($path)) ? require_once(static::checkFileExists($path)) : false ;

    }
    

    public static function getConfig($key)
    {
        return Application::$App->getConfig($key);
    }

    

    public static function getContent(string $content)
    {
         return Application::$App->getConfig("hostName")."content/$content";
    }




    public static function checkFileExists(string $path)
    {
        return (file_exists(Application::$Addr.DIRECTORY_SEPARATOR.$path)) ?  Application::$Addr.DIRECTORY_SEPARATOR.$path : false;
    }

    
    public static function redirect($location = "")
    {
          header("Location:".self::getConfig("hostName")."/".$location);
    }

}

