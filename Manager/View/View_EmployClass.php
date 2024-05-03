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
            <a href="new_EmployClass.php">新增</a>
            <?php 
                 require_once "../../Common/Function/DB.php";
                 require_once "../../Common/View/SignInSuccess.php";
                 $oDb = new DB();
                 

                if(count($_POST) > 0){
                    $oDb->query("SELECT * FROM employeeclass where EmployeeClassName = ? ", array($_POST["EmployeeClassName"]));
                    if ($oDb->rowCount() > 0){
                        echo "已有重複名稱的職員職位資料，新增失敗";
                    }else{
                        $oDb->query("INSERT INTO employeeclass(EmployeeClassName) VALUES(?) ", array($_POST["EmployeeClassName"]));
                        echo "新增完成";
                    }
                }

                $oDb->query("SELECT * FROM employeeclass", array());
                $counts = $oDb->rowCount();

               
            ?>
            <?php  if($counts > 0) { ?>

            <table>
                <th>
                    <td>職位代碼</td>
                    <td>職位名稱</td>
                </th>
                <?php 

                    for($i = 0; $i < $counts; $i++ ){
                        $row = $oDb->fetch($i);
                        echo "<tr>";
                        echo "<td>" . $row["EmployeeClassID"] . "</td>";
                        echo "<td>" . $row["EmployeeClassName"] . "</td>";
                        echo "</tr>";
                    }

                ?>
            </table>
            <?php  } else {  ?>
                    <h3>沒錢</h3>
            <?php  } ?>
        </div>
    </div>
    
    
</body>
</html>