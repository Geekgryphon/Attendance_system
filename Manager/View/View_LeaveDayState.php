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


                $oDb->query("SELECT * FROM employeeclass", array());
                $counts = $oDb->rowCount();
                $page = array();

                // $num_Hundreds_digit = ($counts / 100  < 1 ? 1 : ceil($counts / 100));
                // $num_tens_digits = floor(($counts % 100) / 10);
                // $num_unit_digit = $counts % 10;
                // $num_tens_digits  =  ($num_unit_digit > 0 ? $num_tens_digits+1 : $num_tens_digits);

                // for($i = 0; $i < $num_Hundreds_digit; $i++){
                //     $page[$i] = array();
                    
                //     if($i < $num_Hundreds_digit - 1){
                //         for($j = 0;$j < 10;$j++){
                //             $page[$i][] = $j;
                //         }
                //     }
                //     else if($i == $num_Hundreds_digit - 1){
                //         for($j = 0; $j < $num_tens_digits; $j++){
                //             $page[$i][] = $j;
                //         }
                //     }
                // }


               
            ?>
            <?php  if($counts > 0) { ?>

            <table>
                <tr>
                    <td>職位代碼</td>
                    <td>職位名稱</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php 
                    for($i = 0; $i < $counts; $i++ ){
                        $row = $oDb->fetch($i);
                        echo "<tr>";
                        echo "<td>" . $row["EmployeeClassID"] . "</td>";
                        echo "<td>" . $row["EmployeeClassName"] . "</td>";
                        echo "<td><a href='edit_EmployClass.php?cmd=edit&EmployeeClassID=". $row["EmployeeClassID"] ."'>編輯</a>";
                        echo "<td><a href='delete_EmployClass.php?cmd=delete&EmployeeClassID=". $row["EmployeeClassID"] ."'>刪除</a>";
                        echo "</tr>";
                    }
                    
                ?>
            </table>
            <?php echo "<a href='new_EmployClass.php'>新增</a>"; ?>
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