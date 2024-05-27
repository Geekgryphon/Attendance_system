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
                    $oDb->query("SELECT * FROM LeaveDayState where LeaveDayStateName = ? ", array($_POST["LeaveDayStateName"]));
                    if ($oDb->rowCount() > 0){
                        echo "已有重複名稱的職員職位資料，新增失敗";
                    }else{
                        $oDb->query("INSERT INTO LeaveDayState(LeaveDayStateName) VALUES(?) ", array($_POST["LeaveDayStateName"]));
                        header("Location: View_LeaveDayState.php");
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
            <form action="new_LeaveDayState.php" method="post">
                <input type="text"  name="LeaveDayStateName">
                <br/>
                <button name="cmd" value="new">新增</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>