<?php

namespace App\database\interfaces;

interface DatabaseConnectionInterface
{

    public static function getIncetance();
    public static function connection();
    public static function connect();

}