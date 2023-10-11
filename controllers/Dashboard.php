<?php
require_once './classes/SessionController.php';
class Dashboard extends  SessionController
{
    private $user;

    public function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
        error_log("Dashboard::constructor() " . $this->user->getUsername());
    }

    public function render(){

//        $expensesModel          = new ExpensesModel();
//        $expenses               = $this->getExpenses(5);
//        $totalThisMonth         = $expensesModel->getTotalAmountThisMonth($this->user->getId());
//        $maxExpensesThisMonth   = $expensesModel->getMaxExpensesThisMonth($this->user->getId());
//        $categories             = $this->getCategories();
        $this->view->render('dashboard/index',[
            'user'                 => $this->user
        ]);
    }


}