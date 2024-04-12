<?php 

require_once "DB.php";

class Sign{

    private $oDb = new DB();

    private $currentDate = date('Y-m-d');
    private $currentTime = date('H:i:s');

    public function SignIn($empID){

        $this->oDb->query("INSERT INTO SignRecords(EmployeeID ,SignDay, SignInTime) 
                           VALUES (?, ?, ?)",
                           array($empID, $this->currentDate, $this->$currentTime));
    }

    public function SignOut($empID){

        $this->oDb->query("UPDATE SignRecords SET SignOutTime = ?
                           WHERE EmployeeID = ? and SignDay = ? ",
                           array($this->$currentTime, $empID, $this->currentDate));

        return $this->oDb->rowCount();
    }

    public function GetTodaySignDate($empID){
        $this->oDb->query("SELECT SignInTime, SignOutTime
                           WHERE EmployeeID = ? and SignDay = ? ",
                           array($empID, $this->currentDate));
    }

    public function GetSignDate($empID, $offset){
        $this->oDb->query("SELECT SignDay, SignInTime, SignOutTime
                           WHERE EmployeeID = ? LIMIT 10 OFFSET ? ",
                           array($empID, $offset));
    }

}



?>