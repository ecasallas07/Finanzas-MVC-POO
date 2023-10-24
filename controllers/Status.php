<?php
require_once './classes/success.php';
require_once  './classes/errors.php';
require_once './classes/SessionController.php';
class Status extends SessionController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render(){
        $category = $this->categoryList();
        $this->view->render('admin/status',[
            'category' => $category
            ]);
    }

    public function categoryList(){
        $model = new StatusModel();
        return $model->showCategory();
    }

    public function createBill(){
        if($this->existPost(['category','cantidad'])){
            $categoria = $this->getPost('category');
            $cantidad = $this->getPost('cantidad');
            $user_id = $this->getUserSessionData()->getId();

            $model = new StatusModel();
            if($model->createBillModel($categoria,$cantidad,$user_id)){
                error_log('Funciono correctamente el guardar informacion');
                $this->redirect('Admin', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                error_log('No se guardaron correctamente');
                $this->redirect('Status', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }
        }else{
            error_log('No existe el parametro de los');
            $this->redirect('Status', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);
        }
    }

}