<?php
 
declare(strict_types=1);
use PHPDesignPattern\Decorator\Controller;
use PHPDesignPattern\Decorator\UserController as UserController;
require_once 'Decorator/Controller.php';
require_once 'Decorator/UserController.php';

$dbh = new PDO("mysql:host=mysql;dbname=DesignPattern", "root", "1234", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));




header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$data = json_decode($json);

$usrctl = new UserController();
echo json_encode($usrctl->delete($data->id));

// $usrctl->set("firstName", $data->firstName);
// $usrctl->set("lastName", $data->lastName);
// $usrctl->set("username", $data->username);
// $usrctl->set("password", $data->password);


// echo json_encode($usrctl->save());

