<?php 

class DB(){

    $host = 'localhost';
    $dbname = "AttendanceSystem";
    $username = "root";
    $password = "12345678";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "連線失敗:" . $e->getMessage();
    }

    private function __construct(){
        
    }

}



// $sql = "SELECT * FROM Employee";
// $stmt = $pdo->query($sql);

// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// foreach ($users as $user) {
//     echo "User ID: " . $user['EmployeeID'] . "<br>";
// }

?>
