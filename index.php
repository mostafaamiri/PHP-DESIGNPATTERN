<?php
 
declare(strict_types=1);

use PHPDesignPattern\Decorator\AuthenticatorController;
use PHPDesignPattern\Decorator\Controller;
use PHPDesignPattern\Decorator\UserController as UserController;
use PHPDesignPattern\Decorator\LogController as LogController;
require_once 'Decorator/Controller.php';
require_once 'Decorator/UserController.php';
require_once 'Decorator/AuthenticatorController.php';
require_once 'Decorator/LogController.php';



$dbh = new PDO("mysql:host=mysql;dbname=DesignPattern", "root", "1234", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));




header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$data = json_decode($json);

$usrctl = new UserController();
$usrctl = new LogController($usrctl);
echo $usrctl->set("firstName", $data->firstName);

