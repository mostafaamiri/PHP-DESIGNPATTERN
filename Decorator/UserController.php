<?php
namespace PHPDesignPattern\Decorator;

use Exception;

class UserConroller implements Controller{
    private $firstName;
    private $lastName;
    function set($key, $value){
        if($key == "firstName"){
            $this->firstName = $value;
        }elseif($key == "lastName"){
            $this->lastName = $value;
        }else{
            throw new Exception("$key not available for this controller!");
        }
    }

    function get($key){
        if($key == "firstName"){
            return $this->firstName;
        }elseif($key == "lastName"){
            return $this->lastName;
        }else{
            throw new Exception("$key not available for this controller!");
        }
    }

    function print(): string{
        return "I am $this->firstName $this->lastName";
    }

    function delete(){

    }

    function save(){
        
    }
}