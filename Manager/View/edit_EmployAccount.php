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
                   $oDb->query("UPDATE employee SET ChtName = ?, Email = ?   
                                                    ,Address = ?, Phone = ?, EmergencyContact = ?
                                                    ,EmergencyPhone = ?
                                WHERE EmployeeID = ? "
                   , array($_POST["ChtName"], $_POST["Email"]
                          ,$_POST["Address"],$_POST["Phone"],$_POST["EmergencyContact"]
                          ,$_POST["EmergencyPhone"]
                          ,$_POST["EmployeeID"]));
                   header("Location: View_EmployAccount.php");
                }

                require_once "../../Common/View/SignInSuccess.php";


                $oDb->query("SELECT * FROM employee where EmployeeID = ? ", array($_GET["EmployeeID"]));
                
                echo "<form action='edit_EmployAccount.php' method='post'>";
                echo "<input type='hidden' name='EmployeeID' value='" . $_GET["EmployeeID"] ."'/>";

                $data = $oDb->fetch(0);

                echo "<label for='ChtName'>帳號:</label>";
                echo "<input type='text'  name='ChtName' value='" . $data['ChtName'] . "'><br/>";
                echo "<label for='Email'>電子信箱:</label>";
                echo "<input type='text'  name='Email' value='" . $data['Email'] . "'><br/>";
                echo "<label for='Address'>地址:</label>";
                echo "<input type='text'  name='Address' value='" . $data['Address'] . "'><br/>";
                echo "<label for='Phone'>電話:</label>";
                echo "<input type='text'  name='Phone' value='" . $data['Phone'] . "'><br/>";
                echo "<label for='EmergencyContact'>緊急聯絡人:</label>";
                echo "<input type='text'  name='EmergencyContact' value='" . $data['EmergencyContact'] . "'><br/>";
                echo "<label for='EmergencyPhone'>緊急聯絡人電話:</label>";
                echo "<input type='text'  name='EmergencyPhone' value='" . $data['EmergencyPhone'] . "'><br/>";
                echo "<button name='cmd' value='edit'>更新</button>";
                echo "</form>";
            ?>
            
                
                
                
            
        </div>
    </div>
    
    
</body>
</html>