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
                   $oDb->query("UPDATE LeaveDayState SET EmployeeClassName = ? where LeaveDayStateID = ? ", array($_POST["LeaveDayStateName"],$_POST["LeaveDayStateID"]));
                   header("Location: View_LeaveDayState.php");
                }

                require_once "../../Common/View/SignInSuccess.php";


                $oDb->query("SELECT LeaveDayStateName FROM LeaveDayState where LeaveDayStateID = ? ", array($_GET["LeaveDayStateID"]));
                
                echo "<form action='edit_LeaveDayState.php' method='post'>";
                echo "<input type='hidden' name='LeaveDayStateID' value='" . $_GET["LeaveDayStateID"] ."'/>";
                echo "<input type='text'  name='LeaveDayStateName' value='" . $oDb->fetch(0)['LeaveDayStateName'] . "'><br/>";
                echo "<button name='cmd' value='edit'>更新</button>";
                echo "</form>";
            ?>
            
                
                
                
            
        </div>
    </div>
    
    
</body>
</html>