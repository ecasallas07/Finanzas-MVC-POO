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
        $projects = $this->showProjectUser();
        $this->view->render('project/project',[
            'project' => $projects
        ]);
    }

    public function createProject(){
        if($this->existPost(['title','fecha_inicio','fecha_fin','ingresos_proyectados','gastos_proyectados','estado','objetivo'])){
            $title= $this->getPost('title');
            $fecha_inicio = $this->getPost('fecha_inicio');
            $fecha_fin = $this->getPost('fecha_fin');
            $ingresos = $this->getPost('ingresos_proyectados');
            $gastos = $this->getPost('gastos_proyectados');
            $estado = $this->getPost('estado');
            $objetivo = $this->getPost('objetivo');
            $user_id = $this->getUserSessionData()->getId();

            $model = new ProjectModel();
            $model->setTitle($title);
            $model->setEstado($estado);
            $model->setFechaFin($fecha_fin);
            $model->setFechaInicio($fecha_inicio);
            $model->setGastos($gastos);
            $model->setIngresos($ingresos );
            $model->setObjetivo($objetivo );


            if($model->createProjectModel($user_id)){
                $this->redirect('Project', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                $this->redirect('Project', ['error' => Success::SUCCESS_SIGNUP_NEWUSER]);
            }
        }else{
            error_log('No existe el parametro de los PROJECT');
            $this->redirect('Project', ['isset' => Success::SUCCESS_SIGNUP_NEWUSER]);
        }
    }

    public function showProjectUser(){
        $model = new ProjectModel();
         return $model->viewProject($this->getUserSessionData()->getId());
    }


}