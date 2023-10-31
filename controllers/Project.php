<?php
require_once './classes/success.php';
require_once  './classes/errors.php';
require_once './classes/SessionController.php';
class Project extends SessionController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render(){
        $this->view->render('project/project');
    }

}