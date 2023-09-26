<?php

namespace libs;

class App
{
    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] : null; //url lo traemos del archivo .htaccess
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        if(empty($url[0])){
            error_log('APP::construct->no hay controlador especificado');
            $archiverController = 'controllers/loguin.php';
            require_once $archiverController;
            $controller = new Loguin();
            $controller->loadModel('loguin');
            $controller->render();
            return false;
        }

    }


}