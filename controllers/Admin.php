<?php
require_once './classes/SessionController.php';
require_once './Models/AdminModel.php';
require_once './Models/UserModel.php';
class Admin extends SessionController
{
    private $user;


    public function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    public function render(){

        $countUsers = $this->totalUsers();
        error_log('Uusarios totales render ->' . $countUsers);
        $this->view->render('admin/admin',[
            'user'                 => $this->user,
            'countUsers'            => $countUsers
        ]);

    }


    public function totalUsers(){

        $countModel = new AdminModel();
        error_log('Total de usuarios -> funcion'. $countModel->getUsers());
        return $countModel->getCountUsers();
    }

    public function createUser(){
        if($this->existPost(['username','password','role','phone','user_name'])){
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $role = $this->getPost('role');
            $phone = $this->getPost('phone');
            $user_name = $this->getPost('user_name');
        }

        if(empty($username) && empty($password) && empty($role) && empty($phone) && empty($user_name)){
            error_log('save admin user-> no existen parametros');
            $this->redirect('admin',['error'=>Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
        }

        $model = new AdminModel();
        $model->setUsername($username);
        $model->setPassword($password);
        $model->setRole($role);
        $model->setTelefono($phone);
        $model->setName($user_name);


    }







}