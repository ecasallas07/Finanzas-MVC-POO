<?php

namespace libs;

class Model
{
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