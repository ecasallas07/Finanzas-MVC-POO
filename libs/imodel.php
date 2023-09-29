<?php
 //Nos permite definir emtodos que depues tienen que ser implmentados
//Todos los métodos declarados en una interfaz deben ser públicos; esta es la naturaleza de una interfaz.
//A todas las clases que llame con el implments debo usar obligatoriamente esta funciones
    interface IModel{
        public function save();
        public function getAll();
        public function get($id);
        public function delete($id);
        public function update();
        public function from($array);
    }
