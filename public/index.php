<?php

use App\controllers\AdminController;
use App\controllers\HomeController;
use App\controllers\AuthController;
use App\controllers\DoctorController;
use App\core\Application;
use Dotenv\Dotenv;

require_once "..".DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$app = new Application(dirname(__DIR__));


$app->setConfig("hostName" , "DOMAIN_NAME");


$app->router->get("/" , [HomeController::class ,  "loadHome"]);


$app->router->get("login" , [AuthController::class ,  "loadLogin"]);


$app->router->get("register" , [AuthController::class ,  "loadRegister"]);


$app->router->get("admin" , [AdminController::class ,  "loadDashboard"]);


$app->router->get("doctor" , [DoctorController::class ,  "loadDashboard"]);


$app->router->post("registerAction" , [AuthController::class , "authRegister"]);


$app->router->post("loginAction" , [AuthController::class , "authLogin"]);


$app->router->get("doctorsList" , [DoctorController::class , "doctorsList"]);


$app->router->get("logout" , [AuthController::class , "logout"]);


$app->router->post("searchDoc" , [DoctorController::class , "searchDoc"]);


$app->router->post("filterDoc" , [DoctorController::class , "filterDoc"]);


$app->run();