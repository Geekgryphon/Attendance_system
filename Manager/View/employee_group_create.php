<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:#eeeeee;"> 
    <div style="display:flex; flex-wrap:nowrap">
        <div style="flex:1;">
            <?php 
                require_once "menu.php";
            ?>
        </div>
        <div style="flex:6">
            <?php 
                phpinfo();
                require_once "../../Common/View/SignInSuccess.php";
                require_once "View_Employee.php";
            ?>
        </div>
    </div>
    
    
</body>
</html>