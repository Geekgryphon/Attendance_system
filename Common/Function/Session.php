<?php 

require_once "DB.php";

Class Session{

    // $_SERVER['PHP_SELF']
    // basename($currentFile)

    private $oDb;

    public function __construct() {
        $this->oDb = new DB();
    }

    public function Login($act, $pwd){

        $this->oDb->query("SELECT EmployeeID from Employee where EmployeeID = ? and password = ? ", array($act, $pwd));
        $IsCorrectLoginData = ($this->oDb->rowCount() > 0 ? true: false);

        if($IsCorrectLoginData){
            session_start();
            $_SESSION["userid"] = $this->oDb->fetch(0)['EmployeeID'];
            return true;
        }else{
            return false;
        }

    }

    public function CheckLogin($location){
        if(isset($_SESSION["userid"]) and $location == ''){
            header("Location: ./../Manager/View/View_LeaveApply.php");
        }else if(isset($_SESSION["userid"]) and $location != ''){
            header("Location: ./../Manager/" . $location);
        }else if(!isset($_SESSION["userid"])){
            session_destroy();
            header("Location: ./../login.php");
        }
        else{
            header("Location: ./../login.php");
        }
        
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