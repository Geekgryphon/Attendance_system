<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    .data-grid{
        display: grid;
    }
    </style>
</head>
<body style="background-color:#eeeeee;"> 
    <div style="display:flex; flex-wrap:nowrap">
        <div style="flex:1;">
            <?php 
                require_once "menu.php";
                require_once "../../Common/Function/DB.php";
                $oDb = new DB();    

                if(count($_POST) > 0){
                    $oDb->query("SELECT * FROM employeeclass where EmployeeClassName = ? ", array($_POST["EmployeeClassName"]));
                    if ($oDb->rowCount() > 0){
                        echo "已有重複名稱的職員職位資料，新增失敗";
                    }else{
                        $oDb->query("INSERT INTO employeeclass(EmployeeClassName) VALUES(?) ", array($_POST["EmployeeClassName"]));
                        header("Location: View_EmployClass.php");
                    }
                }
                
            ?>
        </div>
        <div style="flex:6">
            <?php 
                require_once "../../Common/Function/DB.php";
                require_once "../../Common/View/SignInSuccess.php";
                $oDb = new DB();
            ?>
            <form action="new_EmployAccount.php" method="post">
                <label for="account">帳號:</label>
                <input type="text"  name="EmployAccount">
                <br/>
                <label for="ChtName">姓名:</label>
                <input type="text"  name="ChtName">
                <br/>
                <label for="PersonalID">身分證:</label>
                <input type="text"  name="PersonalID">
                <br/>
                <label for="Email">電子信箱:</label>
                <input type="text"  name="Email">
                <br/>
                <label for="Email">地址:</label>
                <input type="text"  name="Address">
                <br/>
                <label for="Phone">電話:</label>
                <input type="text"  name="Phone">
                <br/>
                <label for="EmergencyContact">緊急聯絡人:</label>
                <input type="text"  name="EmergencyContact">
                <br/>
                <label for="EmergencyPhone">緊急聯絡人電話:</label>
                <input type="text"  name="EmergencyPhone">
                <br/>
                <button name="cmd" value="new">新增</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>