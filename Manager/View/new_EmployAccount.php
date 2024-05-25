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
            ?>
        </div>
        <div style="flex:6">
            <?php 

                $oDb = new DB();    


                if(count($_POST) > 0){
                    $oDb->query("SELECT * FROM Employee where EmployeeID = ? ", array($_POST["EmployeeID"]));
                    if ($oDb->rowCount() > 0){
                        echo "已有重複名稱的職員代碼，新增失敗";
                    }else{
                        $oDb->query("INSERT INTO Employee( EmployeeID, ChtName, Password
                        , Phone, PersonalID, Email, address
                        , IsOutOfWork, EmergencyContact, EmergencyPhone
                        ,created_at) VALUES(?, ?, ?, ?, ?, ?, ?, 1, ?, ?, now()) "
                        , array($_POST["EmployeeID"], $_POST["ChtName"], $_POST["EmployeeID"]
                                ,$_POST["Phone"], $_POST["PersonalID"], $_POST["Email"], $_POST["Address"]
                                ,$_POST["EmergencyContact"], $_POST["EmergencyPhone"]));

                        header("Location: View_EmployAccount.php");
                    }
                }

                require_once "../../Common/View/SignInSuccess.php";
            ?>
            <form action="new_EmployAccount.php" method="post">
                <label for="EmployeeID">帳號:</label>
                <input type="text"  name="EmployeeID">
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
                <label for="Address">地址:</label>
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