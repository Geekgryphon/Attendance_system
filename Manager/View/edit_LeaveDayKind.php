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
            ?>
        </div>
        <div style="flex:6">
            <?php 
                require_once "../../Common/Function/DB.php";
                
                $oDb = new DB();

                if(count($_POST) > 0){
                   $oDb->query("UPDATE LeaveDayKind SET LeaveDayKindName = ? where LeaveDayKindID = ? ", array($_POST["LeaveDayKindName"],$_POST["LeaveDayKindID"]));
                   header("Location: View_LeaveDayKind.php");
                }

                require_once "../../Common/View/SignInSuccess.php";


                $oDb->query("SELECT LeaveDayKindName FROM LeaveDayKind where LeaveDayKindID = ? ", array($_GET["LeaveDayKindID"]));
                
                echo "<form action='edit_LeaveDayKind.php' method='post'>";
                echo "<input type='hidden' name='LeaveDayKindID' value='" . $_GET["LeaveDayKindID"] ."'/>";
                echo "<input type='text'  name='LeaveDayKindName' value='" . $oDb->fetch(0)['LeaveDayKindName'] . "'><br/>";
                echo "<button name='cmd' value='edit'>更新</button>";
                echo "</form>";
            ?>
            
                
                
                
            
        </div>
    </div>
    
    
</body>
</html>