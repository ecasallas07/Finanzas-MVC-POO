<?php


class View
{

    public $d;
    function __construct(){

    }

    public function render($nombre, $data =[]){
        $this->d = $data;
        require 'views/'.$nombre.'.php';
    }
}