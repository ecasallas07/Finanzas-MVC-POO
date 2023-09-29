<?php


require_once 'Database.php';
require_once 'imodel.php';
class Model
{
    private $db;
    function __construct(){
        $this->db = new Database();
    }

    public function query($sql){
        return $this->db->connect()->query($sql);
    }

    public function prepare($query){
        return $this->db->connect()->prepare($query);
    }
}