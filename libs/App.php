<?php


require_once './controllers/Loguin.php';
require_once './libs/Controller.php';
require_once './controllers/Errores.php';
class App
{
    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] : null; //url lo traemos del archivo .htaccess donde esta declarada
        $url = rtrim($url,'/'); //Borra el slash principal
        $url = explode('/',$url);

        if(empty($url[0])){
//            error_log('APP::construct->no hay controlador especificado');
            $archiverController = 'controllers/Loguin.php';
            require_once $archiverController;
            $controller = new Loguin();
            $controller->loadModel('loguin');
            $controller->render();
            return false;
        }

        $archiverController = 'controllers/'. $url[0] . '.php';
        print_r($archiverController);
        if(file_exists($archiverController)){
            require_once $archiverController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            if(isset($url[1])){
                if(method_exists($controller,$url[1])){
                    if(isset($url[2])){

                        //cantidad de parametros
                        $numparam = count($url) - 2;
                        $params = [];
                        for($i=0; $i < $numparam; $i++){
                            array_push($params, $url[$i] + 2); //empieza desde el 2 porque en la url el 0 y el 1 quvales al root del project
                        }
                        $controller->{$url[1]}($params);
                    }else{
                        // si no existe ningun parametro se llama tal cual el metodo
                        // con las { } es para llamar un metodo de manera dinamica
                        $controller->{$url[1]}();
                    }

                }else{
                    $controller = new Errores();
                }
            }else{
                $controller->render();
            }

        }else{
            $controller = new Errores();
        }




    }


}