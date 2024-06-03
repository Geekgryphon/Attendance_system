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
                   $oDb->query("UPDATE LeaveSignLevel SET LeaveSignLevelName = ? where LeaveSignLevelID = ? ", array($_POST["LeaveSignLevelName"],$_POST["LeaveSignLevelID"]));

                   $oDb->query("DELETE FROM LeaveSignLevelEveryStep WHERE LeaveSignLevelID = ? ", array($_POST["LeaveSignLevelID"]));

                    for($i = 1; $i < 3 ; $i++){
                    $oDb->query("INSERT INTO LeaveSignLevelEveryStep(LeaveSignLevelID, 
                                    LeaveSignLevelStep, EmployeeID) VALUES(?, ?, ?) "
                                    , array($_POST["LeaveSignLevelID"], $i, $_POST["Stage" . $i]));
                    }

                   header("Location: View_LeaveSignLevel.php");
                }

                require_once "../../Common/View/SignInSuccess.php";


                $oDb->query("SELECT LeaveSignLevelName FROM LeaveSignLevel where LeaveSignLevelID = ? ", array($_GET["LeaveSignLevelID"]));
                
            ?>
            
            <form action='edit_LeaveSignLevel.php' method='post'>
                <input type='hidden' name='LeaveSignLevelID' value='<?php echo $_GET["LeaveSignLevelID"]; ?>'/><br/>
                <label for='LeaveSignLevelName'>假別關卡名稱:</label>
                <input type='text'  name='LeaveSignLevelName' value='<?php echo $oDb->fetch(0)['LeaveSignLevelName']; ?>'><br/>
                <label for=''>關卡1:</label>
                <select name="Stage1" id="Stage1">
                    <?php 
                        $oDb->query("select * from LeaveSignLevelEveryStep where LeaveSignLevelID = ? and LeaveSignLevelStep = 1 ", array($_GET["LeaveSignLevelID"]));
                        $LeaveSignLevelStep1 = $oDb->fetch(0);

                        $oDb->query("select * from Employee ", array());
                        $counts = $oDb->rowCount();
                        for($i = 0; $i < $counts; $i++){
                            $row = $oDb->fetch($i);
                            if($row["EmployeeID"] == $LeaveSignLevelStep1["EmployeeID"]){
                                echo "<option value='" . $row["EmployeeID"] . "' selected>" . $row["ChtName"] . "</option>";
                            }else{
                                echo "<option value='" . $row["EmployeeID"] . "'>" . $row["ChtName"] . "</option>";
                            }
                            
                        }
                    ?>
                </select>
                <br/>
                <label for=''>關卡2:</label>
                <select name="Stage2" id="Stage2">
                    <?php 
                        $oDb->query("select * from LeaveSignLevelEveryStep where LeaveSignLevelID = ? and LeaveSignLevelStep = 2 ", array($_GET["LeaveSignLevelID"]));
                        $LeaveSignLevelStep2 = $oDb->fetch(0);

                        $oDb->query("select * from Employee ", array());
                        $counts = $oDb->rowCount();
                        for($i = 0; $i < $counts; $i++){
                            $row = $oDb->fetch($i);
                            if($row["EmployeeID"] == $LeaveSignLevelStep2["EmployeeID"]){
                                echo "<option value='" . $row["EmployeeID"] . "' selected>" . $row["ChtName"] . "</option>";
                            }else{
                                echo "<option value='" . $row["EmployeeID"] . "'>" . $row["ChtName"] . "</option>";
                            }
                        }
                    ?>
                </select>
                <br/>
                <button name='cmd' value='edit'>更新</button>
            </form>
                
                
    
        </div>
    </div>
    
    
</body>
</html>