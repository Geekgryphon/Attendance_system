<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Common/View/css/menu.css">
</head>
<body>
    <div id="Company_Logo">
        圖片暫時取代區
    </div>
    <div>
        <div class="menu_button"><button>首頁</button><br/></div>
    </div>
    <div>
        <div class="menu_button"><button onclick="toggleVisibility('employmenu');">員工管理</button><br/></div>
        <!-- <img style="top:20px;" src="./Img/add_icon.png" /> -->
        <div id="employmenu" class="visible">
            <div class="submenu_button" id="EmploymenuFun1"><button onclick="focusSelectedSubmenuButton('EmploymenuFun1');">員工組別</button><br/></div>
            <div class="submenu_button" id="EmploymenuFun2"><button onclick="focusSelectedSubmenuButton('EmploymenuFun2');">員工小組成員管理</button><br/></div>
            <div class="submenu_button" id="EmploymenuFun3"><button onclick="focusSelectedSubmenuButton('EmploymenuFun3');">員工權限</button><br/></div>
            <div class="submenu_button" id="EmploymenuFun4"><button onclick="focusSelectedSubmenuButton('EmploymenuFun4');">員工帳號</button><br/></div>
            <div class="submenu_button" id="EmploymenuFun5"><button onclick="focusSelectedSubmenuButton('EmploymenuFun5');">員工權限列表</button><br/></div>
            <div class="submenu_button" id="EmploymenuFun6"><button onclick="focusSelectedSubmenuButton('EmploymenuFun6');">員工代理人</button><br/></div>
            <div class="submenu_button" id="EmploymenuFun6"><button onclick="focusSelectedSubmenuButton('EmploymenuFun7');">修改密碼</button><br/></div>
        </div>
    </div>
    <div>
        <div class="menu_button"><button onclick="toggleVisibility('leavemenu');">請假管理</button><br/></div>
        <div id="leavemenu" class="visible">
            <div class="submenu_button" id="LeavemenuFun1"><button onclick="focusSelectedSubmenuButton('LeavemenuFun1');">請假簽核關卡設定</button><br/></div>
            <div class="submenu_button" id="LeavemenuFun2"><button onclick="focusSelectedSubmenuButton('LeavemenuFun2');">請假申請</button><br/></div>
            <div class="submenu_button" id="LeavemenuFun3"><button onclick="focusSelectedSubmenuButton('LeavemenuFun3');">請假簽核</button><br/></div>
            <div class="submenu_button" id="LeavemenuFun4"><button onclick="focusSelectedSubmenuButton('LeavemenuFun4');">請假歷史紀錄</button><br/></div>
            <div class="submenu_button" id="LeavemenuFun5"><button onclick="focusSelectedSubmenuButton('LeavemenuFun5');">請假假別</button><br/></div>
        </div>
    </div>
    <div>
        <div class="menu_last_button"><button onclick="toggleVisibility('signmenu');">出勤管理</button><br/></div>
        <div id="signmenu" class="visible">
            <div class="submenu_button" id="SignmenuFun1"><button onclick="focusSelectedSubmenuButton('SignmenuFun1');">出勤記錄一覽</button><br/></div>
        </div>
    </div>
    <footer style="background-color: #666665; height:100px;">

    </footer>
    <script src="../../Common/View/Javascript/menu.js"></script>

</body>
</html>