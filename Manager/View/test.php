<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:#888888;"> 
    <div style="text-align:center;">
        <header>測試</header>
    </div>
    <div style="display:flex;">
        <div style="flex:10 80%">
            <?php 
                require_once "Nav.php";
            ?>
        </div>
        <div style="flex:6">
            <?php
                echo "test";
            ?>
        </div>
    </div>
    
    
</body>
</html>