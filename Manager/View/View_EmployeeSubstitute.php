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
            <a href="new_EmploySubstitute.php">新增</a>
            <?php 
                 require_once "../../Common/Function/DB.php";
                 require_once "../../Common/View/SignInSuccess.php";
                 $oDb = new DB();                 


                $oDb->query("SELECT c.EmployeeID as SubstituteEmployeeID
                                    , a.EmployeeID, b.ChtName
                                    , c.ChtName as SubstituteChtName
                            FROM EmployeeSubstitute a
                            join employee b on a.EmployeeID = b.EmployeeID
                            join employee c on a.SubstituteEmployeeID = c.EmployeeID ", array());
                $counts = $oDb->rowCount();
                $page = array();
               
            ?>
            <?php  if($counts > 0) { ?>

            <table>
                <tr>
                    <td>職員名稱</td>
                    <td>代理人職員名稱</td>
                    <td></td>
                </tr>
                <?php 
                    for($i = 0; $i < $counts; $i++ ){
                        $row = $oDb->fetch($i);
                        echo "<tr>";
                        echo "<td>" . $row["ChtName"] . "</td>";
                        echo "<td>" . $row["SubstituteChtName"] . "</td>";
                        echo "<td><a href='delete_EmployeeSubstitute.php?cmd=delete&SubstituteEmployeeID=". $row["SubstituteEmployeeID"] ."&EmployeeID=" . $row["EmployeeID"] . "'>刪除</a>";
                        echo "</tr>";
                    }
                    
                ?>
            </table>
            
            <?php 
                
            ?>
            <?php  } else {  ?>
                    <h3>沒錢</h3>
            <?php  } ?>
            <?php echo "<a href='new_EmploySubstitute.php'>新增</a>"; ?>
        </div>
    </div>
     
</body>
</html>