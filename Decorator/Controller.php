<?php
namespace PHPDesignPattern\Decorator;

interface Controller{
    function set($key, $value);
    function get($id);
    function print(): string;
    function delete($id);
    function save();
}