<?php


require_once 'Database.php';
require_once 'imodel.php';
class Model
{
    private $db;
    function __construct(){
        $this->db = new Database();
    }

   public function query($sql): bool|PDOStatement
   {
        return $this->db->connect()->query($sql);

    }

   public function prepare($query): bool|PDOStatement
   {
        return $this->db->connect()->prepare($query);


    }
}