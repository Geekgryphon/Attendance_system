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
                   $oDb->query("UPDATE EmployeeTeam SET EmployeeTeamName = ? where EmployeeTeamID = ? ", array($_POST["EmployeeTeamName"],$_POST["EmployeeTeamID"]));
                   header("Location: View_EmployTeam.php");
                }

                require_once "../../Common/View/SignInSuccess.php";


                $oDb->query("SELECT EmployeeTeamName FROM EmployeeTeam where EmployeeTeamID = ? ", array($_GET["EmployeeTeamID"]));
                
                echo "<form action='edit_EmployTeam.php' method='post'>";
                echo "<input type='hidden' name='EmployeeTeamID' value='" . $_GET["EmployeeTeamID"] ."'/>";
                echo "<input type='text'  name='EmployeeTeamName' value='" . $oDb->fetch(0)['EmployeeTeamName'] . "'><br/>";
                echo "<button name='cmd' value='edit'>更新</button>";
                echo "</form>";

            ?>
            
                
                
                
            
        </div>
    </div>
    
    
</body>
</html>