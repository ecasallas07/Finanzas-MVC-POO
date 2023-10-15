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
        $adminAll = $this->adminAll();
        error_log('Usuarios totales render ->' . $countUsers);
        $this->view->render('admin/admin',[
            'user'                 => $this->user,
            'countUsers'            => $countUsers,
            'usersRole'             => $userRole,
            'admin'                 =>  $adminAll
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
            $columns = $this->getPost('columnas');

            $model = new AdminModel();

            if($model->existTable($name_table)){
                error_log('Ya existe la tabla ' . $name_table);
                $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_TABLE_EXISTS]);
            }elseif ($model->createTable($name_table,$columns)){
                error_log('Se creo exitosamente la tabla');
                $this->redirect('admin',['success' =>Success::SUCCESS_SIGNUP_NEWTABLE ]);
            }else{
                error_log('No se crea la tabla');
                $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_TABLE_EXISTS]);
            }
        }else{
            error_log('No existen datos de la tabla');
            $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_TABLE_EXISTS]);
        }


     }

     public function totalRol(){
        $model = new AdminModel();
        return $model->getUsersRole();

     }

     public function updateRol(){
        if($this->existPost(['username','role'])){
            $username = $this->getPost('username');
            $role = $this->getPost('role');


            if(empty($username) && empty($role)){
                error_log('No existen los paraemtros UPDATE ADMIN');
                $this->redirect('admin',['error'=>Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }
            $model = new AdminModel();
            $model->setUsername($username);

            if($model->changeRoleAdmin()){
                error_log('Se actualizo correctamente');
                $this->redirect('admin',['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }

        }else{
            error_log('No tiene los datos para actualizar, campos vacios');
            $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
        }
     }

     public function saveCategoryData(){
        if($this->existPost(['tipo','recomendacion','descripcion'])){
            $tipo = $this->getPost('tipo');
            $recomendacion = $this->getPost('recomendacion');
            $descripcion = $this->getPost('descripcion');

            $model = new AdminModel();

            $model->setCategoryTipo($tipo);
            $model->setDescripcion($descripcion);
            $model->setRacomendacion($recomendacion);

            if($model->saveCategory()){
                error_log('Se guardo correctamente las categorias');
                $this->redirect('admin',['success'=>Success::SUCCESS_ADMIN_NEWCATEGORY]);
            }
        }else{
            error_log('No tiene los datos para actualizar, campos vacios categoria');
            $this->redirect('admin',['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
        }

     }

     public function adminAll(){
        $model = new AdminModel();
        return $model->getAll();
     }













}