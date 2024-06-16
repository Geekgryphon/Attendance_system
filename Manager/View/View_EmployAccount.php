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
            <a href="new_EmployClass.php">新增</a>
            <?php 
                 require_once "../../Common/Function/DB.php";
                 require_once "../../Common/View/SignInSuccess.php";
                 $oDb = new DB();                 


                $oDb->query("SELECT * FROM Employee", array());
                $counts = $oDb->rowCount();
                $page = array();


            ?>
            <?php  if($counts > 0) { ?>

            <table>
                <tr>
                    <td>職員代碼</td>
                    <td>職員名稱</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php 
                    for($i = 0; $i < $counts; $i++ ){
                        $row = $oDb->fetch($i);
                        echo "<tr>";
                        echo "<td>" . $row["EmployeeID"] . "</td>";
                        echo "<td>" . $row["ChtName"] . "</td>";
                        echo "<td><a href='edit_EmployAccount.php?cmd=edit&EmployeeID=". $row["EmployeeID"] ."'>編輯</a>";
                        echo "<td><a href='delete_EmployAccount.php?cmd=delete&EmployeeID=". $row["EmployeeID"] ."'>刪除</a>";
                        echo "</tr>";
                    }
                    
                ?>
            </table>
            <?php echo "<a href='new_EmployAccount.php'>新增</a>"; ?>
            <?php 
                    
                    // echo "<br/>";
                    // echo "<a href=''>◀️</a>";
                    // echo "<a href=''>1</a>";
                    // echo "<a href=''>▶️</a>";
            ?>
            <?php  } else {  ?>
                    <h3>沒錢</h3>
            <?php  } ?>
        </div>
    </div>
     <!-- 1. 取得資料總數
     2. 將資料劃分為 假設115筆  1 {1..10} 2 {1} 的物件 -->
     
</body>
</html>