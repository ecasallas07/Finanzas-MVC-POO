<?php


require_once './libs/Controller.php';
class Errores extends Controller
{
    function __construct(){
        parent::__construct();
        error_log('Errores::controller-> Errores');

    }
    public function render(){
        $this->view->render('errores/index');
    }
}