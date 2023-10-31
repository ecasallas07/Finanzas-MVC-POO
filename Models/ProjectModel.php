<?php
require_once  './libs/Model.php';
class ProjectModel extends Model
{

    private $title;
    private $fecha_inicio;
    private $fecha_fin;
    private $ingresos;
    private $gastos;
    private $estado;
    private $objetivo;

    public function __construct()
    {
        parent::__construct();
    }

    public function createProjectModel($id_user){
        $query = $this->prepare('INSERT INTO project (title,fecha_inicio,fecha_fin,ingresos_proyectados,gastos_proyectados,estado,objetivo,id_user) 
        VALUES(:title,:fecha_inicio,:fecha_fin,:ingresos,:gastos,:estado,:objetivo,:id_user)');
        $query->execute([
            'title' => $this->title,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'ingresos' => $this->ingresos,
            'gastos' => $this->gastos,
            'estado' => $this->estado,
            'objetivo' => $this->objetivo,
            'id_user' => $id_user
        ]);

        if ($query){
            return true;
        }else{
            return false;
        }

    }

    public function viewProject($id_user){
        $query= $this->prepare('SELECT * FROM project WHERE id_user = :id');
        $query->execute(['id' => $id_user]);
        if($query->rowCount() > 0){
            return $query->fetchAll(PDO::FETCH_OBJ);
        }else{
            return [];
        }

    }

    public function setTitle($title){
        $this->title = $title;
    }
    public function setFechaInicio($fecha){
        $this->fecha_inicio = $fecha;
    }
    public function setFechaFin($fecha){
        $this->fecha_fin = $fecha;
    }
    public function setIngresos($ingresos){
        $this->ingresos = $ingresos;
    }
    public function setGastos($gastos){
        $this->gastos = $gastos;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function setObjetivo($objetivo){
        $this->objetivo = $objetivo;
    }




}