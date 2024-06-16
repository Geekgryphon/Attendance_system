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
        require_once "Common/Function/Session.php";

        $oDb = new DB();
        $oSession = new Session();

        if(count($_POST) > 0){
            ini_set('session.gc_maxlifetime', 1800);
            session_start();
            $oSession->Login($_POST["account"], $_POST["password"]);

            $oSession->CheckLogin();
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