<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #LogInContainer {
            display: flexbox;
        }

        #LogInContainer > div {
            display: flexbox;
            flex-grow: 1;
            
        }

        #SignIn{
            background-color: white;
            border-radius: 5px;
            padding: 20px, 10px;
            font-size: 24px;
            transition: all 1s;
        }

        #SignIn:hover{
            background-color: blue;
            color: white;
        }

        #SignOut{
            background-color: white;
            border-radius: 5px;
            padding: 20px, 10px;
            font-size: 24px;
            transition: all 1s;
        }

        #SignOut:hover{
            background-color: orange;
            color: white;
        }

        #LogOut{
            background-color: white;
            border-radius: 5px;
            padding: 20px, 10px;
            font-size: 24px;
            transition: all 1s;
        }

        #LogOut:hover{
            background-color: red;
            color: white;
        }


    </style>
</head>
<body>
    <div id="LogInContainer">
        <div>
            <span id="">歡迎你! 芮芮</span>
        </div>
        <div>
            <!-- <form action=""> -->
                <button id="SignIn">簽到</button>
                <button id="SignOut">簽退</button>
            <!-- </form> -->
        </div>
        <div>
            <!-- <form action=""> -->
                <button id="LogOut" type="submit">登出</button>
            <!-- </form> -->
        </div>
        
        
    </div>
</body>
</html>