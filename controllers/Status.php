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

    }

}