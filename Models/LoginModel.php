<?php

require_once './libs/Model.php';
require_once 'UserModel.php';
class LoginModel extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        // insertar datos en la BD
        error_log("login: inicio");
        try{
            //$query = $this->db->connect()->prepare('SELECT * FROM users WHERE username = :username');
            $query = $this->prepare('SELECT * FROM users WHERE username = :username');
            $query->execute(['username' => $username]);

            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC);

                $user = new UserModel();
                $user->from($item);

                error_log('login: user id '.$user->getId());

                if(password_verify($password, $user->getPassword())){
                    error_log('login: success');
                    return $user;

                }else{
                    error_log('Password no es igual');
                    return NULL;
                }
            }
        }catch(PDOException $e){
            return NULL;
        }
    }

}