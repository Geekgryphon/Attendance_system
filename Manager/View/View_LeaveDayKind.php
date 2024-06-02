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
                 require_once "../../Common/View/SignInSuccess.php";
                 $oDb = new DB();                 


                $oDb->query("SELECT * FROM LeaveDayKind", array());
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
                        echo "<td>" . $row["LeaveDayKindID"] . "</td>";
                        echo "<td>" . $row["LeaveDayKindName"] . "</td>";
                        echo "<td><a href='edit_LeaveDayKind.php?cmd=edit&LeaveDayKindID=". $row["LeaveDayKindID"] ."'>編輯</a>";
                        echo "<td><a href='delete_LeaveDayKind.php?cmd=delete&LeaveDayKindID=". $row["LeaveDayKindID"] ."'>刪除</a>";
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