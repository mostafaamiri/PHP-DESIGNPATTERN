<?php
namespace PHPDesignPattern\Decorator;

use DateTime;

require_once 'BehavioralController.php';


class LogController extends BehavioralController{
    
    function LogAction($func_name){
        $log = error_log(date("Y-m-d H:i:s").' called functions : '."$func_name\n", 3, 'logs.txt');
    }

    function set($key, $value)
    {
        $this->LogAction("set");
        parent::set($key, $value);
    }

    function get($key)
    {
        $this->LogAction("get");
        parent::get($key);
    }

    function print(): string
    {
        $this->LogAction("print");
        return parent::print();
    }

    function save()
    {
        $this->LogAction("save");
        parent::save();;
        
    }

    function delete($id)
    {
        $this->LogAction("delete");
        parent::delete($id);        
    }
}

?>