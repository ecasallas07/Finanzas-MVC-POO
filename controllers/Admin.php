<?php
require_once './classes/SessionController.php';
class Admin extends SessionController
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    public function render(){
        $this->view->render('admin/admin',[
            'user'                 => $this->user
        ]);
    }

}