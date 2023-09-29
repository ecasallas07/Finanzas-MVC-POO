<?php
require_once 'Session.php';
class SessionController extends Controller
{
    private $userSession;
    private $username;
    private $userId;

    private $session;
    private $sites;
    private $user;
    private $defaultSites;


    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    public function init(){
        $this->session = new Session();

        $json = $this->getJsonFileConfig();
        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];

        $this->validateSession();
    }

    private function getJsonFileConfig()
    {
        $string = file_get_contents('config/access.json');
        $json = json_decode($string,true);

        return $json;
    }

    public function validateSession()
    {
        error_log('sessionController-> validateSession()');
        if($this->existsSession()){
            $role = $this->getUserSessionData()->getRole();//traigo el rol de la funcion

            if($this->isPublic()){
                $this->redirectDefaultByRoles($role);
            }else{
                if($this->isAuthorized($role)){

                }else{
                    $this->redirectDefaultByRoles($role);
                }

            }

        }else{
            //No existe la session
            if($this->isPublic()){
                //Dejar entrar
            }else{
                header('location:'.constant('URL').'');
            }

        }

    }

    private function existsSession()
    {
        if(!$this->session->exists()) return false;
        if($this->session->getCurrentUser() == NULL) return false;

        $userId = $this->session->getCurrentUser();

        if($userId) return true;
        return false;
    }


    //TODO: En esta funcion traigo los datos de la session, es buena practica solo guardar el id en la SESSION

    private function getUserSessionData()
    {
        $id = $this->userId;
        $this->user = new UserModel();
        $this->user->get($id);
        error_log('Session controller-> getUserSession Data' . $this->user->getUsername());
        return $this->user;
    }
    public function isPublic()
    {
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace('/\?.*/','',$currentURL); // PHP interpreta / / estas dos linea como expresiones regulares
        //Recorro el json para validar que existan los parametros
        for($i=0; $i < sizeof($this->sites);$i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] =='public'){
                return true;
            }

        }
        return false;

    }

    private function getCurrentPage()
    {
        $actualLink = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/',$actualLink);
        error_log('Session controller -> get Current page', $url[2]);
        return $url[2];
    }

    private function redirectDefaultByRoles(string $role)
    {
        $url='';
        // TODO: Se usa for para recorrer los elementos del json y al encontrarlo y que cumpla con los requerimientos ingresa
        for($i=0; $i < sizeof($this->sites);$i++){
            if($this->sites[$i]['role'] == $role){
                $url = '/finanzas/'. $this->sites[$i]['site'];
                //TODO:en la primera coincidencia romper el for:
                break;
        }
            header('Location:'.$url);

        }

    }

    private function isAuthorized(string $role)
    {
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace('/\?.*/','',$currentURL); // PHP interpreta / / estas dos linea como expresiones regulares
        //Recorro el json para validar que existan los parametros
        for($i=0; $i < sizeof($this->sites);$i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['role'] == $role){
                return true;
            }

        }
        return false;

    }

    public function authorizedAccess($role){
        switch ($role){
            case 'user':
                $this->redirect($this->defaultSites['user'],[]);
                break;
            case 'admin':
                $this->redirect($this->defaultSites['admin'],[]);
        }
    }

    public function logout(){
        $this->session->closeSession();
    }
    public function initialize($user){
        $this->session->setCurrentUser($user->getId());
        $this->authorizedAccess($user->getRole());
    }
}