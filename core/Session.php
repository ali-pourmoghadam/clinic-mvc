<?php


namespace App\core;


class Session{
    
    private const FLASH_KEY  = "flash_messages";

    public function __construct()
    {   

        session_start();
       
        foreach( $_SESSION[self::FLASH_KEY] ?? [] as $key=>&$value)
        {
            $flashMessage['remove'] = true;
        }

    }


    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = 
        [
            'remove' => false,
            'value' => $message
        ];
    }


    
    public function getFlash($key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }



    public function setKey($key , $value)
    {
        $_SESSION[$key] = $value;
    }

    
    public function getKey($key)
    {
       return $_SESSION[$key] ?? false;
    }


    public function remove($key)
    {
        unset($_SESSION[$key]);
    }




    private function removeFlashMessages()
    {
      
        foreach ( $_SESSION[self::FLASH_KEY] ?? [] as $key => $flashMessage) {

            if ($flashMessage['remove']) unset($flashMessages[$key]);
            
        }
   
    }



    public function __destruct()
    {
        $this->removeFlashMessages();
    }
    
    
}
