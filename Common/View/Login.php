<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once "../Function/DB.php"; 
        $db = new DB();
    ?>
    <form action="">
        <input type="text" name="Account">
        <input type="password" name="Password">
        <input type="submit" name="cmd" value="Login">
    </form>
</body>
</html>