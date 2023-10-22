<?php

class StatusModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showCategory(){
        try{
            $query= $this->query('SELECT tipo FROM category');
            $category = [];
            while($item = $query->fetch(PDO::FETCH_ASSOC) ){
                $category[] = $item;
            }
            return $category;
        }catch (PDOException $e){
            error_log('Mostrando categorias' . $e->getMessage());
        }
    }
    public function createBillModel(){
        try{
            $query = $this->prepare('INSERT INTO bills(id_category,Cantidad,id_user) VALUES(:id_category,:cantidad,:id_user) ');
            $query->execute([
               'id_category' => $category
            ]);
        }catch (PDOException $e){

        }
    }

}