<?php

require_once './libs/Controller.php';
require_once './Models/LoginModel.php';
require_once './classes/errors.php';
require_once './classes/success.php';

//TODO: Extendemos de sesion controller porque session controller ya tiene como herencia a controller
class Loguin extends SessionController
{
    function __construct(){
        parent::__construct();
        error_log('Error de loguin');
    }

    public function render(){
        $this->view->render('login/index');
    }

   public function authenticate(){
        if( $this->existPOST(['username', 'password']) ){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            //validate data
            if($username == '' || empty($username) || $password == '' || empty($password)){
                //$this->errorAtLogin('Campos vacios');
                error_log('Login::authenticate() empty');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                return;
            }
            // si el login es exitoso regresa solo el ID del usuario
            $model = new LoginModel();
            $user = $model->login($username, $password);

            if($user != NULL){
                // inicializa el proceso de las sesiones
                error_log('Login::authenticate() passed');
                $this->initialize($user);
            }else{

                error_log('Login::authenticate() username and/or password wrong');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);

            }
        }else{
            // error, cargar vista con errores
            //$this->errorAtLogin('Error al procesar solicitud');
            error_log('Login::authenticate() error with params');
            $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
        }
    }



}