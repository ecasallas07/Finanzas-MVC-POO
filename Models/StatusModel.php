<?php

class StatusModel extends Model
{

    private $cantidad;
    private $description;
    private $id_category;

    private $id_user;
    public function __construct()
    {
        parent::__construct();
    }

    public function showCategory(){
        try{
            $query= $this->query('SELECT id,tipo FROM category');
            $category = [];
            while($item = $query->fetch(PDO::FETCH_ASSOC) ){
                $category[] = $item;
            }
            return $category;
        }catch (PDOException $e){
            error_log('Mostrando categorias' . $e->getMessage());
        }
    }
    public function createBillModel($category,$cantidad,$user){
        try{
            $query = $this->prepare('INSERT INTO bills(id_category,cantidad,id_user) VALUES(:id_category,:cantidad,:id_user) ');
            $query->execute([
               'id_category' => $category,
                'cantidad' => $cantidad,
                'id_user' => $user
            ]);

            if($query->rowCount() >0){
                return true;
            }else{
                return false;
            }

        }catch (PDOException $e){
            error_log('Modelo de gastos' . $e->getMessage());
        }
    }

    public function createIncomeModel(){
        try{
            $query = $this->prepare('INSERT INTO income(id_category,description,id_user,cantidad) VALUES (:id_category,:description,:id_user,:cantidad');
            $query->execute([
                'id_category'=>$this->id_category,
                'description' => $this->description,
                'id_user' => $this->id_user,
                'cantidad' => $this->cantidad

            ]);

        }catch (PDOException $e){
            error_log('Modelo de ingresos no funciona'. $e->getMessage());
        }
    }

    public function viewIncome($id_user){
        $query = $this->prepare('SELECT income.*, category.tipo  FROM income INNER JOIN category ON category.id = income.id_category WHERE id_user = :id');
        $query->execute(['id'=>$id_user]);
        $income = [];
//        TODO: Diferencias entre el uso de fetch y fetchAll, es qque fetch devueve una sola fila a la vez y fetchAll las devuelve todas en un array
        while($item=$query->fetch(PDO::FETCH_OBJ)){
            $income[]= $item;
        }

        return $income;
    }

    public function viewBills($id_user){
        $query = $this->prepare('SELECT  bills.*, category.tipo FROM bills INNER JOIN category ON  category.id = bills.id_category WHERE id_user = :id ');
        $query->execute(['id' => $id_user]);
        if($query){
            return  iterator_to_array($query,PDO::FETCH_OBJ);
        }
        return false;



    }

    public function statusCount($id_user){
        $bills= $this->prepare('SELECT SUM(cantidad) FROM bills WHERE id = :id');
        $bills->execute(['id'=>$id_user]);
        $income = $this->prepare('SELECT SUM(cantidad) FROM income WHERE id =:id') ;
        $income->execute(['id'=>$id_user]);

        $sumBills = $bills->fetchColumn();
        $sumIncome= $income->fetchColumn();

        return ['gastos' => $sumBills, 'ingresos' => $sumIncome ];

    }


//    TODO: Getters and setters  for the atributes of income

    public function setIdCategory($category){
        $this->id_category = $category;
    }
    public function setDescription($description){
        $this->description = $description;
    }

    public function setIdUser($user){
        $this->id_user = $user;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }


}