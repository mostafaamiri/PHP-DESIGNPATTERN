<?php
namespace PHPDesignPattern\Decorator;
require_once 'BehavioralController.php';
use Exception;

class AuthenticatorController extends BehavioralController{
    function authorize($token){
        if($token==1234)
            return true;
        return false;
    }

    function set($key, $value)
    {
        if($this->authorize($_SERVER["token"]))
            parent::set($key, $value);
    }

    function get($key)
    {
        if($this->authorize($_SERVER["token"])){
            return parent::get($key);
        }else{
            throw new Exception("NOT AUTHORIZED!");
        }
    }

    function print(): string
    {
        if($this->authorize($_SERVER["token"]))
            return parent::print();
        else
            throw new Exception("NOT AUTHORIZED!");
    }

    function delete($id)
    {
        if($this->authorize($_SERVER["token"]))
            parent::delete($id);
        else
            throw new Exception("NOT AUTHORIZED!");
    }

    function save()
    {
        if($this->authorize($_SERVER["token"]))
            parent::save();
        else
            throw new Exception("NOT AUTHORIZED!");
    }
}