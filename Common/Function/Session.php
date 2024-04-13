<?php 

require_once "DB";

Class Session{

    // $_SERVER['PHP_SELF']
    // basename($currentFile)

    private $oDb;

    private function __construct() {
        $this->oDb = new DB();
    }

    public function Login($act, $pwd){
        $this->oDb->query("SELECT 1 from Employee where EmployeeID = ? and password = ? ", array($act, $pwd));
        $IsCorrectLoginData = ($this->oDb->rowCount() > 0 ? true: false);

        if($IsCorrectLoginData){
            session_start();
            return true;
        }else{
            return false;
        }

    }

    public function CheckLogin(){
        return (isset($_SESSION) ? true : false );
    }

    public function LogOut(){
        session_unset();
        session_destroy();
    }

    public function ViewAllSessionValue(){
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
    } 
}


?>