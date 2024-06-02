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
                    $oDb->query("SELECT * FROM LeaveSignLevel where LeaveSignLevelID = ? and LeaveSignLevelName = ? ", array($_POST["LeaveSignLevelID"], $_POST["LeaveSignLevelName"]));
                    if ($oDb->rowCount() > 0){
                        echo "已有重複的假別關卡，新建失敗";
                    }else{
                        $oDb->query("INSERT INTO LeaveSignLevel(LeaveSignLevelID, LeaveSignLevelName) VALUES(?, ?) ", array($_POST["LeaveSignLevelID"], $_POST["LeaveSignLevelName"]));
                        
                        for($i = 1; $i < 3 ; $i++){
                            $oDb->query("INSERT INTO LeaveSignLevelEveryStep(LeaveSignLevelID, 
                                            LeaveSignLevelStep, EmployeeID) VALUES(?, ?, ?) "
                                            , array($_POST["LeaveSignLevelID"], $i, $_POST["Stage" . $i]));
                        }
                        
                        header("Location: View_LeaveSignLevel.php");
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
            <form action="new_LeaveSignLevel.php" method="post">
                <label for="">假別關卡代碼:</label>
                <input type="text"  name="LeaveSignLevelID">
                <br/>
                <label for="">假別關卡名稱:</label>
                <input type="text"  name="LeaveSignLevelName">
                <br/>
                <label for="">關卡1:</label>
                <select name="Stage1" id="Stage1">
                    <?php 
                        $oDb->query("select * from Employee ", array());
                        $counts = $oDb->rowCount();
                        for($i = 0; $i < $counts; $i++){
                            $row = $oDb->fetch($i);
                            echo "<option value='" . $row["EmployeeID"] . "'>" . $row["ChtName"] . "</option>";
                        }
                    ?>
                </select>
                <br/>
                <label for="Stage2">關卡2:</label>
                <select name="Stage2" id="Stage2">
                    <?php 
                        $oDb->query("select * from Employee ", array());
                        $counts = $oDb->rowCount();
                        for($i = 0; $i < $counts; $i++){
                            $row = $oDb->fetch($i);
                            echo "<option value='" . $row["EmployeeID"] . "'>" . $row["ChtName"] . "</option>";
                        }
                    ?>
                </select>
                <br/>
                <button name="cmd" value="new">新增</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>