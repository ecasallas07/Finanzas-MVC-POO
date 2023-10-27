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
        $model = new StatusModel();

        $category = $this->categoryList();
        $income = $this->showIncome();
        $bills = $model->viewBills($this->getUserSessionData()->getId());
        $this->view->render('admin/status',[
            'category' => $category,
            'income' => $income,
            'bills' => $bills
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
                $this->redirect('Status', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                error_log('No se guardaron correctamente');
                $this->redirect('Status', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }
         }else{
            error_log('No existe el parametro de los');
            $this->redirect('Status', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);
        }
    }

    public function showIncome(){
        try {
            $model = new StatusModel();
            return $model->viewIncome($this->getUserSessionData()->getId());

        }catch (PDOException $e){
            error_log('Error al mostrar datos'. $e->getMessage());
        }


    }

    public function statusAcount(){
        try{
            $model = new StatusModel();
            $data= $model->statusCount();
            $totalBills = $data['gastos'];
            $totalIncome = $data['ingresos'];

            if($totalBills > $totalIncome){
                $dbt = $totalBills - $totalIncome ;
            }else if($totalIncome > $totalBills){
                $save = $totalIncome - $totalBills;
            }


            $result =['totalGastos'=>$totalBills,'totalIngresos' => $totalBills];

        }catch (PDOException $e){
            error_log('Error de estado de cuenta ' . $e->getMessage());
        }

    }



}
