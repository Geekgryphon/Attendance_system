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

            // 假單關卡ID
            // 目前簽核關卡
            // 假單種類ID
            // 最終假單關卡數
            // 假單狀態ID
            // 建立時間

                if(count($_POST) > 0){

                    //自動產生假單編號
                    $ApplyNo = strval(date("Y")) . strval(date("m")) . strval(date("d"));
                    $oDb->query("SELECT LPAD(IFNULL(sum(1),0) + 1, 3, 0) as ApplyNo FROM LeaveDayApply Where ApplyNo like CONCAT('%', ?, '%')", array($ApplyNo));
                    $ApplyNo = $_POST["LeaveDayKindID"] . $ApplyNo .  $oDb->fetch(0)['ApplyNo'];

                    $oLeaveBeginDate = new DateTime($_POST["LeaveBeginDate"]);
                    $oLeaveEndDate = new DateTime($_POST["LeaveEndDate"]);

                    $interval = $oLeaveBeginDate->diff($oLeaveEndDate);
                    $OffDay =  $interval->format('%a');
                    $OffHours = $interval->format('%h');
                    $OffHours = $OffHours > 4 ? ($OffHours - 1) : $OffHours; 

                    $SignDetail = array();
                    $oDb->query("SELECT * FROM leavesignleveleverystep Where LeaveSignLevelID = ? ", array($_POST["LeaveSignLevelID"]));
                    $TotalLevelnum = $oDb->rowCount();
                    for($i = 0; $i < $oDb->rowCount(); $i++){
                        $SignDetail[] = $oDb->fetch($i);
                    }

                    $oDb->query("INSERT INTO LeaveDayApply(ApplyNo, LeaveBeginDate, LeaveEndDate
                    ,OffDay, OffHours, LeaveSignLevelID, CurrentStep, LeaveDayKindID, FinalStep
                    ,LeaveDayStateID, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,now())",
                    array($ApplyNo, $_POST["LeaveBeginDate"], $_POST["LeaveEndDate"]
                    ,$OffDay ,$OffHours, $_POST["LeaveSignLevelID"], 1, $_POST["LeaveDayKindID"]
                    ,$TotalLevelnum, "N"));

                    for($i = 0;$i < $TotalLevelnum;$i++){
                        $oDb->query("INSERT INTO leavedayapplyDetail(ApplyNo, Step, EmployeeID, IsApprove) 
                        VALUES (?, ?, ?, '')", array($ApplyNo, $SignDetail[$i]["LeaveSignLevelStep"], $SignDetail[$i]["EmployeeID"]));
                    }

                    header("Location: View_LeaveApply.php");
                }
                
            ?>
        </div>
        <div style="flex:6">
            <?php 

                require_once "../../Common/View/SignInSuccess.php";
                

                $aLeaveDayKind = array();
                $oDb->query(" SELECT * FROM leavedaykind ", array());
                for($i = 0; $i < $oDb->rowCount(); $i++){
                    $aLeaveDayKind[] = $oDb->fetch($i);
                }

                $aLeaveSignLevel = array();
                $oDb->query(" SELECT * FROM leavesignlevel ", array());
                for($i = 0; $i < $oDb->rowCount(); $i++){
                    $aLeaveSignLevel[] = $oDb->fetch($i);
                }

            ?>

            

            
            <form action="new_LeaveApply.php" method="post">
                <label for="">假單起始日期:</label>
                <input type="datetime-local"  name="LeaveBeginDate">
                <br/>
                <label for="">假單結束日期:</label>
                <input type="datetime-local"  name="LeaveEndDate">
                <br/>
                <label for="">假單種類:</label>
                <select name="LeaveDayKindID" id="LeaveDayKindID">
                    <?php 
                        for($i=0; $i < count($aLeaveDayKind); $i++){
                            echo "<option value='" . $aLeaveDayKind[$i]["LeaveDayKindID"] . "'>" . $aLeaveDayKind[$i]["LeaveDayKindName"] . "</option>";
                        }
                    ?>
                </select>
                <br/>
                <label for="">假單關卡:</label>
                <select name="LeaveSignLevelID" id="LeaveSignLevelID">
                    <?php 
                        for($i=0; $i < count($aLeaveSignLevel); $i++){
                            echo "<option value='" . $aLeaveSignLevel[$i]["LeaveSignLevelID"] . "'>" . $aLeaveSignLevel[$i]["LeaveSignLevelName"] . "</option>";
                        }
                    ?>
                </select>
                <br/>
                <button name="cmd" value="new">新增</button>
                <label for=""></label>
            </form>
        </div>
    </div>
    
    
</body>
</html>