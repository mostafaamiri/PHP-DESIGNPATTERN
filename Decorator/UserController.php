<?php
namespace PHPDesignPattern\Decorator;

use Exception;

class UserController implements Controller{


    private $firstName;
    private $lastName;
    private $username;
    private $password;



    function set($key, $value){
        
        if($key == "firstName"){
            $this->firstName = $value;
        }elseif($key == "lastName"){
            $this->lastName = $value;
        }elseif($key == "username"){
            $this->username = $value;
        }elseif($key == "password"){
            $this->password = $value;
        }else{
            throw new Exception(" not available for this controller!");
        }
    }
 
    function get($id){
        global $dbh;
        $sql = "SELECT first_name ,last_name, username FROM User;";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        $this->firstName = $result["first_name"];
        return $this;
    }

    function print(): string{
        return "I am $this->firstName $this->lastName";
    }

    function delete($id){
        global $dbh;

        $sql = "SELECT * FROM User WHERE id = :id;";
        $sth = $dbh->prepare($sql);
        $sth->execute([
            "id" => $id
        ]);
        $result = $sth->fetchAll();
        if($result != NULL){
            // return ["massage" => "the username exists"];  
        $sql = "DELETE FROM User WHERE id = :id;";
        $sth = $dbh->prepare($sql);
        $sth->execute([
            "id" => $id
        ]);
        return ["status" => true,
                "message" => "user deleted"];
        }else{
            return ["message" => "user not found"];
        }
    }

    function save(){
        global $dbh;
        $password = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM User WHERE username = :username;";
        $sth = $dbh->prepare($sql);
        $sth->execute([
            "username" => $this->username
        ]);
        $result = $sth->fetchAll();

        if($result != NULL){
            return ["status" => false,
                    "massage" => "the username exists"];  

        }else{
            $sql = "INSERT INTO `User`(`first_name`, `last_name`, `username`, `password`)
            VALUES (:firstName, :lastName, :username, :password );";
            $sth = $dbh->prepare($sql);
            $result = $sth->execute(["username" => $this->username,
                            "password" => $password,
                            "firstName" => $this->firstName,
                            "lastName" => $this->lastName]);
            return ["status" => true,
                    "massage" => "information saved"];
        }
    }
}