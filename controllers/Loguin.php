<?php

require_once './libs/Controller.php';

//TODO: Extendemos de ssion controller porque session controller ya tiene como herencia a controller
class Loguin extends SessionController
{
    function __construct(){
        parent::__construct();
        error_log('Error de loguin');
    }

    public function render(){
        $this->view->render('login/index');
    }


}