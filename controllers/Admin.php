<?php
# TODO: Ubication of the files used in the file
require_once './classes/SessionController.php';
require_once './Models/AdminModel.php';
require_once './Models/UserModel.php';
require_once  './classes/errors.php';
require_once  './classes/success.php';
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
        $userRole = $this->totalRol();
        error_log('Uusarios totales render ->' . $countUsers);
        $this->view->render('admin/admin',[
            'user'                 => $this->user,
            'countUsers'            => $countUsers,
            'usersRole'             => $userRole
        ]);

    }


    public function totalUsers(){

        $countModel = new AdminModel();
        error_log('Total de usuarios -> funcion'. $countModel->getUsers());
        return $countModel->getCountUsers();
    }

    public function createUser()
    {
        if ($this->existPost(['username', 'password', 'role', 'phone', 'user_name'])) {
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $role = $this->getPost('role');
            $phone = $this->getPost('phone');
            $user_name = $this->getPost('user_name');


            if (empty($username) && empty($password) && empty($role) && empty($phone) && empty($user_name)) {
                error_log('save admin user-> no existen parametros');
                $this->redirect('admin', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }

            $model = new AdminModel();
            $model->setUsername($username);
            $model->setPassword($password);
            $model->setRole($role);
            $model->setTelefono($phone);
            $model->setName($user_name);

            if ($model->existsUser($username, $user_name, $role)) {
                error_log('Ya existe usuario ADMIN' . $username);
                $this->redirect('admin', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);
            } else if ($model->save()) {
                error_log('Usurario guardado ADMIN' . $model->getUsername());
                $this->redirect('admin', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            } else {
                $this->redirect('admin', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }
        } else {
            error_log('No existen usuarios ADMIN');
            $this->redirect('admin', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
        }
    }

     public function createTAbleFinally(){

        if($this->existPost(['name_table','columnas'])){
            $name_table = $this->getPost('name_table');
            $columns = $this->getPost('columns');

            $model = new AdminModel();

            if($model->existTable($name_table)){
                error_log('Ya existe la tabla ' . $name_table);
                $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_TABLE_EXISTS]);
            }elseif ($model->createTable($name_table,$columns)){
                error_log('Se creo exitosamente la tabla');
                $this->redirect('admin',['success' =>Success::SUCCESS_SIGNUP_NEWTABLE ]);
            }else{
                $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_TABLE_EXISTS]);
            }
        }else{
            $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_TABLE_EXISTS]);
        }


     }

     public function totalRol(){
        $model = new AdminModel();
        return $model->getUsersRole();

     }













}