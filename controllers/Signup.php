<?php
require_once './classes/errors.php';
require_once './Models/UserModel.php';
require_once './classes/success.php';
class Signup extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }

    public function render(){
        $this->view->render('login/signup',[]);
    }

    public function newUser(){
        if($this->existPost(['username','password','role','phone','user_name'])){
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $role = $this->getPost('role');
            $phone = $this->getPost('phone');
            $user_name = $this->getPost('user_name');
            if($username == '' || empty($username) || $password == '' || empty($password)){
                error_log('Existe Parametros');
                $this->redirect('signup',['error'=>Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }
            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRole($role);
            $user->setPhone($phone);
            $user->setName($user_name);

            if($user->exists($username)){

                $this->redirect('signup', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);

            }else if($user->save()){

                $this->redirect('', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }else{

                $this->redirect('signup', ['error' => Errors::ERROR_SIGNUP_NEWUSER]);

            }

        }else{
            error_log('Ingreso aqui ahora mismo');
            $this->redirect('signup',['error'=>Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
        }
    }
}