<?php

require_once './classes/SessionController.php';
require_once './classes/success.php';
require_once  './classes/errors.php';
class Category extends SessionController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function render(){
        $category = $this->showCompleteCategory();
        $this->view->render('category/category',[
            'listCategory' => $category
        ]);
    }

    public function showCompleteCategory(){
        $model = new CategoryModel();
        return $model->showCategory();
    }
}