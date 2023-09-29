<?php

require_once './libs/Controller.php';


class Loguin extends Controller
{
    function __construct(){
        parent::__construct();
        error_log('Error de loguin');
    }

    public function render(){
        $this->view->render('login/index');
    }


}