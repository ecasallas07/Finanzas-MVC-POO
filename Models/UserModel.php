<?php

class UserModel extends Model implements IModel
{
    private $id;
    private $username;
    private $password;
    private $role;
    private $phone;
    private $photo;
    private $name;

    public function __construct()
    {
        parent::__construct();
        //Declarar los tipos de datos de los atributos
           $this->username = '';
           $this->password ='';
           $this->role='';
           $this->phone= 0;
           $this->photo='';
           $this->name='';
    }

    public function save()
    {
        try {
            $query = $this->prepare('INSERT INTO users (username,password,role,telefono,photo,name) VALUES (:username,:password,:role,:phone,:photo,:name)');
            $query->execute([
                'username'=> $this->username,
                'password'=> $this->password,
                'role' => $this->role,
                'phone' => $this->phone,
                'photo'=> $this->photo,
                'name'=> $this->name
            ]);
            return true;
        }catch (PDOException $e){
            error_log('UserModel::save->insertar datos'. $e);
            return false;
        }

    }

    public function getAll()
    {
        $items=[];
        try {
            $query =$this->query('SELECT * FROM users');
            while($p=$query->fetch(PDO::FETCH_ASSOC)){
                $item= new UserModel();
                $item->setId($p['id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password']);
                $item->setPhone($p['phone']);
                $item->setRole($p['role']);
                $item->setPhoto($p['photo']);
                $item->setName($p['name']);
                array_push($items,$item);
            }


        }catch(PDOException $e){
            error_log('UserModel::getAll_. mostrar datos'. $e);
            return false;
        }


    }

    public function get($id)
    {
        try {
            $query =$this->prepare('SELECT * FROM users WHERE id= :id');
            $query->execute(['id'=>$id]);
            $user = $query->fetch(PDO::FETCH_ASSOC); //solo con fetch ya em trae el valor
            //Con el settter asigno a los atributos privados el valor
            $this->setId($user['id']);
            $this->setUsername($user['username']);
            $this->setPassword($user['password']);
            $this->setPhone($user['telefono']);
            $this->setRole($user['role']);
            $this->setPhoto($user['photo']);
            $this->setName($user['name']);

            return $this;

        }catch(PDOException $e){
            error_log('UserModel::get-> mostrar datos id'. $e);
            return false;
        }

    }

    public function delete($id)
    {
        try {
            $query =$this->prepare('DELETE FROM users WHERE id= :id');
            $query->execute(['id'=>$id]);

            return true;
        }catch(PDOException $e){
            error_log('UserModel::delete-> eliminar datos id'. $e);
            return false;
        }
    }

    public function update()
    {
        try {
            $query =$this->prepare('UPDATE users SET  username = :username, password= :password , phone =:phone , role =:role , photo = :photo, name =:name  WHERE id= :id');
            $query->execute([
                'id'=>$this->id,
                'username'=>$this->username,
                'password'=> $this->password,
                'role' => $this->role,
                'phone' => $this->phone,
                'photo'=> $this->photo,
                'name'=> $this->name
            ]);

            return true;
        }catch(PDOException $e){
            error_log('UserModel::update-> actualizar datos'. $e);
            return false;
        }
    }

    public function from($array)
    {
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password =$array['password'];
        $this->role=$array['role'];
        $this->phone= $array['phone'];
        $this->photo=$array['photo'];
        $this->name=$array['name'];
    }


    public function exists($username)
    {
        try {
            $query = $this->prepare('SELECT username FROM users WHERE username = :username');
            $query->execute([
                'username'=>$username
            ]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }


        }catch (PDOException $e){
            error_log('UserModel:exist ->exisitr username' . $e);
            return false;

        }
    }

    public function comaparePassword($password,$id){

        try {
            $user = $this->get($id);
            return password_verify($password,$user->getPassword());

        }catch (PDOException $e){
            error_log('UserModel:exist ->exisitr username' . $e);
            return false;

        }


    }

    // TODO: Geetters and Setters of the atributtes
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
       return $this->id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setPassword($password){
        $this->password = $this->getHashedPassword($password);
    }

    private function getHashedPassword($password){
        return password_hash($password,PASSWORD_DEFAULT,['cost' => 10]);
    }
    public function getPassword(){
        return $this->password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function getRole(){
        return $this->role;
    }
    public function setPhone($budget){
        $this->budget = $budget;
    }
    public function getPhone(){
        return $this->budget;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }

}