<?php
require_once './classes/SessionController.php';
class Dashboard extends  SessionController
{
//    private $user;

    function __construct(){
        parent::__construct();

//        $this->user = $this->getUserSessionData();
        error_log("Dashboard::constructor() ");
    }

    function render(){
        error_log("Dashboard::RENDER() ");
//        $expensesModel          = new ExpensesModel();
//        $expenses               = $this->getExpenses(5);
//        $totalThisMonth         = $expensesModel->getTotalAmountThisMonth($this->user->getId());
//        $maxExpensesThisMonth   = $expensesModel->getMaxExpensesThisMonth($this->user->getId());
//        $categories             = $this->getCategories();

        $this->view->render('dashboard/index');
    }


}