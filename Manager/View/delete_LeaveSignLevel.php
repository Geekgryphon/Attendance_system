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
                // require_once "menu.php";
                
            ?>
        </div>
        <div style="flex:6">
            <?php 
                require_once "../../Common/Function/DB.php";
                require_once "../../Common/View/SignInSuccess.php";
                $oDb = new DB();

                if(isset($_GET) and $_GET["cmd"] == 'delete'){
                    $oDb->query("DELETE from LeaveSignLevel where LeaveSignLevelID = ?", array($_GET["LeaveSignLevelID"]));
                    header("Location: View_LeaveSignLevel.php");
                }
            ?>
        </div>
    </div>
    
    
</body>
</html>