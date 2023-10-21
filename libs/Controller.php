<?php



class Controller
{
    public $view;
    function __construct(){
        $this->view = new View();
    }

    public function loadModel($model){
        $url = 'models/'. $model . 'model.php';
        if(file_exists($url)){
            require_once $url;

            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }

    public function existPost($params){
        foreach ($params as $param){
            if(!isset($_POST[$param])) {
                error_log('Controller::existPost => no existe el parametro');
                return false;
            }
        }

        return true;
    }
    public function existGet($params){
    foreach ($params as $param){
        if(!isset($_POST[$param])) {
            error_log('Controller::existGET => no existe el parametro');
            return false;
        }
    }

    return true;
    }

    public function getGet($name){
        return $_GET[$name];
    }
    public function getPost($name){
        return $_POST[$name];
    }
    public function redirect($page,$mensajes = []){
        $data = [];
        $params='';
        foreach ($mensajes as $key => $mensaje){
            array_push($data, $key."=". $mensaje);
        }

        //El join es el alias de la funcion implode
        $params = join('&',$data);


        //TODO: Se visualizaria la url con parametros asi ?nombre=Marcos&apellido
        if($params != ''){
            $params = '?'.$params;
        }
        header('location:'.constant('URL') . '/' .$page .$params);
    }

}