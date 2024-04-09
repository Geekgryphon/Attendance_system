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
            var_dump("連線成功");
        } catch(PDOException $e){
            echo "連線失敗:" . $e->getMessage();
        }
    } 

}



// $sql = "SELECT * FROM Employee";
// $stmt = $pdo->query($sql);

// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// foreach ($users as $user) {
//     echo "User ID: " . $user['EmployeeID'] . "<br>";
// }

?>
