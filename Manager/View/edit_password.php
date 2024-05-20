<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:#eeeeee;"> 
    <div style="display:flex; flex-wrap:nowrap">
        <div style="flex:1;">
            <?php 
                require_once "menu.php";
                require_once "../../Common/Function/DB.php";
            ?>
        </div>
        <div style="flex:6">
            <?php 
                

                $userId = 'EMP0325';
                $oDb = new DB();
                

                if(count($_POST) > 0){

                    $oDb->query("select Password from employee where EmployeeID = ? ", array($userId));
                    $password = $oDb->fetch(0)['Password'];


                    if($password != $_POST['OldPassword']){
                        echo "舊密碼輸入錯誤，無法更新<br/>";
                    }

                    if($_POST['NewPassword'] != $_POST['ConfirmNewPassword']){
                        echo "新密碼與確認密碼不一致，無法更新<br/>";
                    }


                    if($password == $_POST['OldPassword'] and $_POST['NewPassword'] == $_POST['ConfirmNewPassword']){
                        
                        $oDb->query("Update employee set password = ? where employeeID = ? ", array($_POST['NewPassword'],$userId));
                        echo "新密碼已更新完成。";
                    }

                }

                require_once "../../Common/Function/DB.php";
                
                echo "<form action='edit_password.php' method='post'>";
                echo "<label for='OldPassword'>舊密碼</label>";
                echo "<input type='text' name='OldPassword'>";
                echo "<br/>";
                echo "<label for='NewPassword'>新密碼</label>";
                echo "<input type='text' name='NewPassword'>";
                echo "<br/>";
                echo "<label for='ConfirmNewPassword'>確認新密碼</label>";
                echo "<input type='text' name='ConfirmNewPassword'>";
                echo "<br/>";
                echo "<button type='submit'>確定</button>";
                echo "</form>";

               
            ?>
        </div>
    </div>
    
    
</body>
</html>