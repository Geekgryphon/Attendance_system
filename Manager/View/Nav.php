<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/Nav.css">
    <style>

        .hidden {
            display: none; /* 隐藏元素 */
        }

        .visible {
            display: block; /* 显示元素 */
        }

        .Selected_Fun{
            background-color: #faa9e2;
        }

    </style>
</head>
<body>
    <div id="Company_Logo">
        圖片暫時取代區
    </div>
    <div>
        <div class="Nav_Block"><button>首頁</button><br/></div>
    </div>
    <div>
        <div class="Nav_Block"><button onclick="toggleVisibility('EmployFun');">員工管理</button><br/></div>
        <!-- <img style="top:20px;" src="./Img/add_icon.png" /> -->
        <div id="EmployFun" class="visible">
            <div class="Nav_Func" id="EmployFun1"><button onclick="focusSelectedFunc('EmployFun1');">員工組別</button><br/></div>
            <div class="Nav_Func" id="EmployFun2"><button onclick="focusSelectedFunc('EmployFun2');">員工小組成員管理</button><br/></div>
            <div class="Nav_Func" id="EmployFun3"><button onclick="focusSelectedFunc('EmployFun3');">員工權限</button><br/></div>
            <div class="Nav_Func" id="EmployFun4"><button onclick="focusSelectedFunc('EmployFun4');">員工帳號</button><br/></div>
            <div class="Nav_Func" id="EmployFun5"><button onclick="focusSelectedFunc('EmployFun5');">員工權限列表</button><br/></div>
            <div class="Nav_Func" id="EmployFun6"><button onclick="focusSelectedFunc('EmployFun6');">員工代理人</button><br/></div>
        </div>
    </div>
    <div>
        <div class="Nav_Block"><button onclick="toggleVisibility('LeaveFun');">請假管理</button><br/></div>
        <div id="LeaveFun" class="visible">
            <div class="Nav_Func"><a href="">請假簽核關卡設定</a><br/></div>
            <div class="Nav_Func"><a href="">請假申請</a><br/></div>
            <div class="Nav_Func"><a href="">請假簽核</a><br/></div>
            <div class="Nav_Func"><a href="">請假歷史紀錄</a><br/></div>
            <div class="Nav_Func"><a href="">請假假別</a><br/></div>
        </div>
    </div>
    <div>
        <div class="Nav_Block">出勤管理<br/></div>
        <div>
            <div class="Nav_Func"><a href="">出勤記錄一覽</a><br/></div>
        </div>
    </div>
    <footer style="background-color: #666665; height:100px;">

    </footer>
    <script src="./Javascript/Nav.js"></script>

    <script>
    function toggleVisibility(element) {
        var element = document.getElementById(element);

        if (element.classList.contains("visible")) {
            element.classList.remove("visible");
            element.classList.add("hidden"); // 添加隐藏类
        } else {
            element.classList.remove("hidden");
            element.classList.add("visible"); // 添加可见类
        }
    }

    function focusSelectedFunc(IdName){
        var elements = document.querySelectorAll('.Nav_Func');
        var IdName = document.getElementById(IdName);

        elements.forEach(function(element) {
            element.classList.remove('Selected_Fun');
        });

        IdName.classList.add("Selected_Fun");
    }

    </script>
</body>
</html>