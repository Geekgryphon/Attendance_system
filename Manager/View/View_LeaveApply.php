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
            <a href="new_LeaveDayKind.php">新增</a>
            <?php 
                 require_once "../../Common/Function/DB.php";
                 require_once "../../Common/Function/Session.php";
                 require_once "../../Common/View/SignInSuccess.php";
                 $oDb = new DB();
                 $oSession = new Session();                 


                $oDb->query("SELECT b.LeaveDayStateName,a.ApplyNo,a.CurrentStep, c.LeaveDayKindName
                             FROM LeaveDayApply a 
                             JOIN LeaveDayState b on a.LeaveDayStateID = b.LeaveDayStateID 
                             JOIN LeaveDayKind c on a.LeaveDayKindID = c.LeaveDayKindID ", array());
                $counts = $oDb->rowCount();
                $page = array();

                session_start();
                var_dump($_SESSION);

               
            ?>
            <?php  if($counts > 0) { ?>

            <table>
                <tr>
                    <td>假單代碼</td>
                    <td>目前審核階段</td>
                    <td>假別</td>
                    <td>審核狀態</td>
                </tr>
                <?php 
                    for($i = 0; $i < $counts; $i++ ){
                        $row = $oDb->fetch($i);
                        echo "<tr>";
                        echo "<td>" . $row["ApplyNo"] . "</td>";
                        echo "<td>" . $row["CurrentStep"] . "</td>";
                        echo "<td>" . $row["LeaveDayKindName"] . "</td>";
                        echo "<td>" . $row["LeaveDayStateName"] . "</td>";
                        echo "</tr>";
                    }
                    
                ?>
            </table>
            <?php  } else {  ?>
                    <h3>沒錢</h3>
            <?php  } ?>
            <?php echo "<a href='new_LeaveDayKind.php'>新增</a>"; ?>
        </div>
    </div>
     
</body>
</html>