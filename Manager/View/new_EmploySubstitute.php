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
                    $oDb->query("SELECT * FROM EmployeeSubstitute where EmployeeID = ? and SubstituteEmployeeID = ? ", array($_POST["EmployeeID"], $_POST["SubstituteEmployeeID"]));
                    if ($oDb->rowCount() > 0){
                        echo "已有重複名稱的職員關係資料，新增失敗";
                    }else{
                        $oDb->query("INSERT INTO EmployeeSubstitute(EmployeeID, SubstituteEmployeeID) VALUES(? ,?) ", array($_POST["EmployeeID"], $_POST["SubstituteEmployeeID"]));
                        header("Location: View_EmployeeSubstitute.php");
                    }
                }
                
            ?>
        </div>
        <div style="flex:6">
            <?php 
                require_once "../../Common/View/SignInSuccess.php";

                $SelectedEmploy = ""; 
                $SelectedSubstituteEmployee  = ""; 
                
                $oDb->query("SELECT ChtName, EmployeeID as Value FROM employee ", array());
                if($oDb->rowCount() > 0){
                    $count = $oDb->rowCount();
                    $SelectedEmploy .= "<label for='EmployeeID'>職員:</label>";
                    $SelectedEmploy .= "<SELECT name='EmployeeID' id='EmployeeID' >";
                    for($i = 0; $i < $count; $i++){
                        $data = $oDb->fetch(0);
                        $SelectedEmploy .= "<option value=" . $data['Value'] . ">" . $data['ChtName'] . "</option>";
                    }
                    $SelectedEmploy .= "</SELECT>";
                }

                $oDb->query("SELECT ChtName, EmployeeID as Value FROM employee ", array());
                if($oDb->rowCount() > 0){
                    $count = $oDb->rowCount();
                    $SelectedSubstituteEmployee .= "<label for='SubstituteEmployeeID'>代理人:</label>";
                    $SelectedSubstituteEmployee .= "<SELECT name='SubstituteEmployeeID' id='SubstituteEmployeeID' >";
                    for($i = 0; $i < $count; $i++){
                        $data = $oDb->fetch(0);
                        $SelectedSubstituteEmployee .= "<option value=" . $data['Value'] . ">" . $data['SubstituteEmployeeID'] . "</option>";
                    }
                    $SelectedSubstituteEmployee .= "</SELECT>";
                }
            ?>

            <form action="new_EmployeeSubstitute.php" method="post">
                <?php echo $SelectedEmploy; ?>
                <br/>
                <?php echo $SelectedSubstituteEmployee; ?>
                <br/>
                <button name="cmd" value="new">新增</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>