<?php

namespace libs;

class View
{
    function __construct(){

    }

    public function render($nombre, $data =[]){
        $this->d = $data;
        require 'views/'.$nombre.'.php';
    }
}