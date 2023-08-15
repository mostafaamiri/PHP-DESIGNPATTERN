<?php
namespace PHPDesignPattern\Decorator;

class BehavioralController implements Controller{
    private Controller $controller;
    function __construct($controller)
    {
        $this->controller = $controller;
    }

    function set($key, $value){
        $this->controller->set($key, $value);
    }

    function get($key){
        return $this->controller->get($key);
    }

    function print(): string
    {
        return $this->controller->print();
    }
    
    function delete()
    {
        $this->controller->delete();
    }

    function save()
    {
        $this->controller->save();
    }

}