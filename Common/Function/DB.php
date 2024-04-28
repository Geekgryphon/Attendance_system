<?php 

class DB{

    private $host = 'localhost';
    private $dbname = "AttendanceSystem";
    private $username = "root";
    private $password = "12345678";

    private $Con;
    private $stmt;

    public function __construct(){
        
        // try {
            $this->Con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // $options = [
            //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            //     PDO::ATTR_EMULATE_PREPARES => false,
            // ];
        // } catch(PDOException $e){
        //     echo $e->getMessage();
        // }
    } 

    public function query($sql, $arr){
        $this->stmt = $this->Con->prepare($sql);
        $this->stmt->execute($arr);
        return $this->stmt->fetchAll();
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function test(){
        return "test DB function";
    }

}

// // DB範例
// $oDb = new DB();
// $result = $oDb->query("SELECT * from employee where EmployeeID like :EmployeeID", array(':EmployeeID' => '%EMP%'));
// print_r($result);




?>
