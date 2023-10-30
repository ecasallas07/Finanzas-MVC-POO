<?php

class CategoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showCategory(){
        $query = $this->query('SELECT * FROM category');
        if($query){
            return iterator_to_array($query, PDO::FETCH_OBJ);
        }
        return false;
    }

}