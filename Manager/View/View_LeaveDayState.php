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
            <a href="new_LeaveDayState.php">新增</a>
            <?php 
                 require_once "../../Common/Function/DB.php";
                 require_once "../../Common/View/SignInSuccess.php";
                 $oDb = new DB();                 


                $oDb->query("SELECT * FROM LeaveDayState", array());
                $counts = $oDb->rowCount();
                $page = array();

        
               
            ?>
            <?php  if($counts > 0) { ?>

            <table>
                <tr>
                    <td>假別審核代碼</td>
                    <td>假別審核名稱</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php 
                    for($i = 0; $i < $counts; $i++ ){
                        $row = $oDb->fetch($i);
                        echo "<tr>";
                        echo "<td>" . $row["LeaveDayStateID"] . "</td>";
                        echo "<td>" . $row["LeaveDayStateName"] . "</td>";
                        echo "<td><a href='edit_LeaveDayState.php?cmd=edit&LeaveDayStateID=". $row["LeaveDayStateID"] ."'>編輯</a>";
                        echo "<td><a href='delete_LeaveDayState.php?cmd=delete&LeaveDayStateID=". $row["LeaveDayStateID"] ."'>刪除</a>";
                        echo "</tr>";
                    }
                    
                ?>
            </table>
            <?php echo "<a href='new_LeaveDayState.php'>新增</a>"; ?>
            <?php  } else {  ?>
                    <h3>沒錢</h3>
            <?php  } ?>
        </div>
    </div>
     
</body>
</html>