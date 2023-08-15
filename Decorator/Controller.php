<?php
namespace PHPDesignPattern\Decorator;

interface Controller{
    function set($key, $value);
    function get($key);
    function print(): string;
    function delete();
    function save();
}