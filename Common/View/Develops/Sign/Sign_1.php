<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "Sign.php";
        $oSign = new Sign();
        $oSign->test();
    
    ?>
    <form>
        <h4>Hi, EMP0258!</h4>
        <button type="button" id="SignIn">簽到</button>
        <button type="button" id="SignOut">簽退</button>
    </form>
</body>
<script>
    document.getElementById('SignIn').addEventListener('click', function(){
        let SignInButton = document.getElementById("SignIn");
        SignInButton.disabled = true;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    console.log(xhr.responseText);
                    document.getElementById("SignIn").style.display = "none";
                }else{
                    console.error('錯誤:' + xhr.status);
                }
            }

            console.log(xhr);
        };
        xhr.open("POST", "Sign_Process_1.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("data=emp0325");
    });

    document.getElementById('SignOut').addEventListener('click', function(){

    });

</script>
</html>