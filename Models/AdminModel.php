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
        $query= $this->query('SELECT username,name,role FROM users WHERE username = :username AND name =:name AND role = :role');
        $query->execute([]);
    }


    public function saveTable($nameTable,$columns){

        try{
            $query= $this->prepare('CREATE TABLE :nameTable (:columns)');
            $query->execute([
                'nameTable' =>$nameTable,
                'columnas' => $columns
            ]);
            return true;
        }catch (PDOException $e){

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

}