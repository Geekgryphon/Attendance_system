<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "Common/Function/DB.php";

        $oDb = new DB();

        if(count($_POST) > 0){
            $oDb->query("SELECT 1 From Employee where EmployeeID = ? and Password = ? ", array($_POST["account"], $_POST["password"]));
        }
    ?>
    <form action="login.php" method="post">
        <label for="account">帳號:</label>
        <input type="text" name="account" id="account"></br>
        <label for="password">密碼:</label>
        <input type="password" name="password" id="password"></br>
        <button type="submit">登入</button>
    </form>
</body>
</html>