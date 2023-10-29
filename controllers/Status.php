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
        $valuesAcount = $this->statusAcount();
        $this->view->render('status/status',[
            'category' => $category,
            'income' => $income,
            'bills' => $bills,
            'status' => $valuesAcount
            ]);
    }

    public function categoryList(){
        $model = new StatusModel();
        return $model->showCategory();
    }

    public function createBill(){
        if($this->existPost(['category','cantidad','descripcion'])){
            $categoria = $this->getPost('category');
            $cantidad = $this->getPost('cantidad');
            $descripcion = $this->getPost('descripcion');
            $user_id = $this->getUserSessionData()->getId();

            $model = new StatusModel();
            if($model->createBillModel($categoria,$cantidad,$user_id,$descripcion)){
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

    public function createIncome(){
        if($this->existPost(['cantidad','descripcion','category'])){
            $model = new StatusModel();
            $cantidad = $this->getPost('cantidad');
            $descripcion = $this->getPost('descripcion');
            $category = $this->getPost('category');

            $model->setCantidad($cantidad);
            $model->setDescription($descripcion);
            $model->setIdCategory($category);
            $model->setIdUser($this->getUserSessionData()->getId());
            if($model->createIncomeModel()){
                error_log('Se creao correctamente el ingreso');
                $this->redirect('Status', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);

            }else{
                error_log('No se guardaron correctamente en ingresos');
                $this->redirect('Status', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);

            }


        }else{
            error_log('No existen los parametros');
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
            $model->statusCount($this->getUserSessionData()->getId());
            $totalBills = $model->getBills();
            $totalIncome = $model->getIncome();
            $maxInfoIncome =$model->getMaxIncome();
            $maxInfoBills = $model->getMaxBills();
//            error_log($maxInfoBills, $maxInfoIncome);

            if($totalBills > $totalIncome){
                $dbt = $totalBills - $totalIncome ;
                error_log($dbt);
            }else if($totalIncome > $totalBills){

                $save = $totalIncome - $totalBills;
            }else{
                error_log('ENTRO AQUI 01');
                $save = 0;
            }

            if(isset($dbt) && !empty($dbt)){
//                error_log('ENTRO AQUI 01');
                error_log('EXISTEN DEUDAS' . $dbt);
                return ['totalGastos'=>$totalBills,'totalIngresos' => $totalIncome, 'deudas' => $dbt , 'maxInfoBills' => $maxInfoBills,'maxInfoIncome' => $maxInfoIncome];
            }else if(isset($save) && !empty($save)){
//                error_log('ENTRO AQUI 02');
                error_log('EXISTEN AHORROS' .$save);
                return ['totalGastos'=>$totalBills,'totalIngresos' => $totalIncome, 'ahorros' => $save, 'maxInfoIncome' => $maxInfoIncome,'maxInfoBills' => $maxInfoBills];
            }


        }catch (PDOException $e){
            error_log('Error de estado de cuenta ' . $e->getMessage());
        }

    }



}
