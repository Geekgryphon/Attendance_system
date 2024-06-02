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
                    $oDb->query("SELECT * FROM LeaveDayKind where LeaveDayKindID = ? and LeaveDayKindName = ? ", array($_POST["LeaveDayKindID"], $_POST["LeaveDayKindName"]));
                    if ($oDb->rowCount() > 0){
                        echo "已有重複的假別，新增失敗";
                    }else{
                        $oDb->query("INSERT INTO LeaveDayKind(LeaveDayKindID, LeaveDayKindName, IsActive) VALUES(?, ?, 1) ", array($_POST["LeaveDayKindID"], $_POST["LeaveDayKindName"]));
                        header("Location: View_LeaveDayKind.php");
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
            <form action="new_LeaveDayKind.php" method="post">
                <label for="">假別代碼:</label>
                <input type="text"  name="LeaveDayKindID">
                <br/>
                <label for="">假別名稱:</label>
                <input type="text"  name="LeaveDayKindName">
                <br/>
                <button name="cmd" value="new">新增</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>