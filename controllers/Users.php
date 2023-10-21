<?php
require_once './classes/SessionController.php';
require_once  './Models/AdminModel.php';
require_once  './classes/success.php';
require_once  './classes/errors.php';
class Users extends SessionController
{
//    TODO: the model used for this class Users is same , is the of AdminModel()
    function __construct()
    {
        parent::__construct();
    }

    public function render(){
        $infoUsers =$this->showUsers();
        $this->view->render('admin/edit-user',[
            'info' => $infoUsers
        ]);
    }

    public function showUsers(){
        try{
            $model = new AdminModel();
            error_log('Users Controller ->showUsers');
            return $model->getUsersComplete();
        }catch (PDOException $e){
            error_log('Error en show Users controller Users'. $e->getMessage());
        }


    }

    public function updateAdminUsers(){

        if($this->existPost(['id_user','username', 'password', 'role', 'phone', 'user_name'])){
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $role = $this->getPost('role');
            $phone = $this->getPost('phone');
            $user_name = $this->getPost('user_name');
            $id = $this->getPost('id_user');

            $model = new AdminModel();

            $model->setUsername($username);
            $model->setPassword($password);
            $model->setRole($role);
            $model->setTelefono($phone);
            $model->setName($user_name);

            if($model->updateUsers($id)){
                error_log('Se actualizaron correctamente los usuarios'. $id);
                $this->redirect('Users', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                error_log('No se actualizaon correctamente los usuarios');
                $this->redirect('Users', ['success' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);

            }

        }else{
            error_log('No existen usuarios para actualizar ADMIN');
            $this->redirect('Users', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);

        }
    }

    public function deleteUsers(){
        if($this->existPost(['name'])){
            $name = $this->getPost('name');
            $model = new AdminModel();
            if($model->deleteUsersModel($name)){
                error_log('Se elimino correctamente lel usuario'. $name);
                $this->redirect('Users', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                error_log('No se eliminaron correctamente'. $name);
                $this->redirect('Users', ['error' => Errors::ERROR_SIGNUP_NEWUSER]);
            }

        }else{
            error_log('No existe el parametro name');
            $this->redirect('Users', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);
        }
    }

    public function sendMessage(){
        if($this->existPost(['username_id','title','mensaje'])){
            $id_destinatario = $this->getPost('username_id');
            $title = $this->getPost('title');
            $mensaje = $this->getPost('mensaje');
            $id_remitente = $this->getUserSessionData()->getId();
            $model = new AdminModel();

            if($model->usersMensaje($id_destinatario,$mensaje,$id_remitente,$title)){
                error_log('No se eliminaron correctamente'. $id_destinatario . $id_remitente);
                $this->redirect('Admin', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                error_log('Hubo algun error al guardar los datos');
                $this->redirect('Admin', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }

        }else{
            error_log('No existe el parametro name');
            $this->redirect('Admin', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);

        }
    }

    public function notifications(){
        $model = new AdminModel();
        return $model->showNotifications($this->getUserSessionData()->getId());

    }



}