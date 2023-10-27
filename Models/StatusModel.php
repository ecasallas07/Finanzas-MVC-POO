<?php

class StatusModel extends Model
{

    private $date_beguin;
    private $description;
    private $id_category;
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
            $query = $this->prepare();
            $query->execute();

        }catch (PDOException $e){
            error_log('Modelo de ingresos no funciona'. $e->getMessage());
        }
    }

    public function viewIncome($id_user){
        $query = $this->prepare('SELECT income.*, category.tipo,  FROM income INNER JOIN category ON category.id = income.id_category WHERE id_user = :id');
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

        return iterator_to_array($query->fetchAll(PDO::FETCH_OBJ));

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

}