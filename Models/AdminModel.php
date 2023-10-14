<?php

class AdminModel extends Model implements IModel
{
    private $countUsers;
    private $countAdmin;
    private $username;
    private $password;
    private $role;
    private $telefono;
    private $photo;
    private $name;
    private $categoryTipo;
    private $categoryDescripcion;
    private $categoryRecomendacion;

    public function __construct()
    {
        parent::__construct();
        $this->photo = '';
    }

    public function save()
    {
        try {
            $query= $this->prepare('INSERT INTO users(username,password,role,telefono,photo,name) VALUES (:username,:password,:role,:telefono,:photo,:name)');
            $query->execute([
                'username' => $this->username,
                'password' => $this->password,
                'role' => $this->role,
                'telefono' =>   $this->telefono,
                'photo' => $this->photo,
                'name' => $this->name
            ]);
            return true;
        }catch (PDOException $e){
            error_log('saveUser->AdminModel' .$e);
        }


    }

    public function existsUser($username,$name,$role){

        try{
            $query= $this->query('SELECT username,name,role FROM users WHERE username = :username AND name =:name AND role = :role');
            $query->execute([
                'username' => $username,
                'name' => $name,
                'role' => $role
            ]);

            //El rowCount debe ser sobre la variable donde se realizo la query
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }catch (PDOException $e){
            error_log('Exist user ADMIN ' . $e->getMessage());
        }

    }


    public function createTable($nameTable,$columns){


        # TODO: la funcion exec() es la mas adecuada para consultas que no devuleven un conjunto de resultados
        try{
            $query= $this->prepare('CREATE TABLE :nameTable (:columns)');
            $query->execute([
                'nameTable' =>$nameTable,
                'columnas' => $columns
            ]);
            if($query){
                return true;
            }else{
                return false;
            }


        }catch (PDOException $e){
            error_log('Create-table ADMIN'. $e->getMessage());

        }

    }

    public function existTable($name_table){
        try {
            $query = $this->query('SHOW TABLES LIKE :name_table');
            $query->execute([
                'name_table' => $name_table
            ]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }


        }catch (PDOException $e){
            error_log('Existencia de la tabla' . $e->getMessage());
        }
    }

    public function saveCategory(){
            $query = $this->prepare('INSERT INTO category(tipo, descripcion,recomendacion) VALUES (:tipo,:descripcion,:recomendacion)');
            $query->execute([
                'tipo'=> $this->categoryTipo,
                'descripcion' =>$this->categoryDescripcion,
                'recomendacion' => $this->categoryRecomendacion
            ]);
            return true;
    }

    public function getRoleAdmin(){
        try {
            $query=  $this->prepare("UPDATE users SET role = 'admin' WHERE username = :username ");
            $update = $query->execute([
            'username' => $this->username
            ]);

            if($update){
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            error_log('Get role admin'.$e->getMessage());
        }
    }

    public function getUsersRole(){
        try {
            $query = $this->query("SELECT username FROM users WHERE role = 'user'");
            $items=[];
            while ($user = $query->fetch(PDO::FETCH_OBJ)){
                $items[] = $user;
            }
            return $items;


        }catch (PDOException $e){
            error_log('User role'. $e->getMessage());

        }
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getAdmin(){

    }
    public function getUsers(){
        $query = $this->query('SELECT COUNT(id) FROM users');
        $user = $query->fetchColumn();
        $this->setCountUsers($user);
        error_log("Get users model=>" . $user);
    }


    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function from($array)
    {
        // TODO: Implement from() method.
    }



    /*----------------------------------------------------------------------------------------------*/

    //TODO: Getters and Setters
    public function setCountUsers($countUser){
        $this->countUsers = $countUser;
    }
    public function getCountUsers(){
        return $this->countUsers;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getUsername(){
        return $this->username;
    }

}