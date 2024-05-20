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
                   $oDb->query("UPDATE employeeclass SET EmployeeClassName = ? where EmployeeClassID = ? ", array($_POST["EmployeeClassName"],$_POST["EmployeeClassID"]));
                   header("Location: View_EmployClass.php");
                }

                require_once "../../Common/View/SignInSuccess.php";


                $oDb->query("SELECT EmployeeClassName FROM employeeclass where EmployeeClassID = ? ", array($_GET["EmployeeClassID"]));
                
                echo "<form action='edit_EmployClass.php' method='post'>";
                echo "<input type='hidden' name='EmployeeClassID' value='" . $_GET["EmployeeClassID"] ."'/>";
                echo "<input type='text'  name='EmployeeClassName' value='" . $oDb->fetch(0)['EmployeeClassName'] . "'><br/>";
                echo "<button name='cmd' value='edit'>更新</button>";
                echo "</form>";
            ?>
            
                
                
                
            
        </div>
    </div>
    
    
</body>
</html>