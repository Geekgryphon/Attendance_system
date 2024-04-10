<?php 

class DB{

    private $host = 'localhost';
    private $dbname = "AttendanceSystem";
    private $username = "root";
    private $password = "12345678";

    public function __construct(){
        
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    } 

    public function query($sql, $arr){
        $stmt -> $pdo->prepare($sql);

        foreach($arr as $name =>  $value){
            $stmt->bindParam($name, $value);
        }

        $stmt->execute();


    }

}

// fetchAll() fetch(0)
// rowCount() 取出資料的總數

// $sql = "SELECT * FROM Employee";
// $stmt = $pdo->query($sql);

// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// foreach ($users as $user) {
//     echo "User ID: " . $user['EmployeeID'] . "<br>";
// }

?>
