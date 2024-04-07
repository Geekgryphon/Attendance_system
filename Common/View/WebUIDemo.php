<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        #EmployeeID{
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            padding: 20px;
            height: 25px;
            font-size: 14px;
            font-weight: 100;
        }

        #EmployeeID:focus {
            outline: none;
            border:1px solid #52b5f2;
        }

        #Date{
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            pading: 20px;
            height: 25px;
            font-size: 14px;
            font-weight: 100;
        }

        #Date:focus {
            outline: none;
            border:1px solid #d9a141;
        }

        #Selection{
            outline: none;
            background-color: #ffffff;
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            height: 30px;
            
        }

        Button{
            border: 1px solid #d9d9d9;
            background-color: #ffffff;
            height: 30px;
            line-height: 20px;
            padding-left: 10px; 
            padding-right: 10px;
            border-radius: 5px;
            text-align: center;
            transition: all 0.3s ease;
        }

        #ButtonSubmit:hover{
            background-color: #52b5f2; 
            color: white;
        }

        #ButtonAdd:hover{
            background-color: #3cd66d; 
            color: white;
        }

        #ButtonDelete:hover{
            background-color: #d43965; 
            color: white;
        }

        tr{
            height:30px;
        }

        tr:nth-child(2n){
            background-color: #96b8d6;
        }

        tr:nth-child(2n+1){
            background-color: #d9b6d9;
        }


    </style>
</head>
<body>
    <hr>
    搜尋欄
    <form action="">
        員工編號 <input type="text" name="EmployeeID" id="EmployeeID"><br/><br/>
        日期 <input type="datetime-local" name="Date" id="Date"><br/><br/>
        簽到日期 <input type="date" name="SignDate" id="SignDate"><br/><br/>
        簽到時間 <input type="time" name="SignTime" id="SignTime"><br/><br/>

        <select name="" id="Selection">
            <option value="">員工1</option>
            <option value="">員工2</option>
        </select>

        <button id="ButtonSubmit">送出</button>
        <button id="ButtonAdd">新增</button>
        <button id="ButtonDelete">刪除</button>
    </form>
    <hr>

    呈現資料庫資料


    <table style="width:100%; border-collapse: collapse;">
        <tbody>
            <tr style="background-color: #5e5e5e0e;">
                <td style="width:15%;">員工編號</td>
                <td style="width:15%;">簽到日期</td>
                <td style="width:15%;">簽到時間</td>
                <td style="width:15%;">簽退時間</td>
                <td style="width:15%;">是否有遲到</td>
                <td style="width:25%;"></td>
            </tr>
            <tr>
                <td>EP0352</td>
                <td>2024-04-01</td>
                <td>07:58</td>
                <td>17:46</td>
                <td>
                ○
                </td>
                <td>
                    <input type="checkbox" name="" id="">
                </td>
            </tr>
            <tr>
                <td>EP0352</td>
                <td>2024-04-02</td>
                <td>08:34</td>
                <td>17:21</td>
                <td>
                ❌
                </td>
                <td>
                    <input type="checkbox" name="" id="">
                </td>
            </tr>
            <tr>
                <td>EP0352</td>
                <td>2024-04-03</td>
                <td>07:54</td>
                <td>17:35</td>
                <td>
                ○
                </td>
                <td>
                    <input type="checkbox" name="" id="">
                </td>
            </tr>
            <tr>
                <td>EP0352</td>
                <td>2024-04-04</td>
                <td>08:17</td>
                <td>17:11</td>
                <td>
                ○
                </td>
                <td>
                    <input type="checkbox" name="" id="">
                </td>
            </tr>
            <tr>
                <td>EP0352</td>
                <td>2024-04-05</td>
                <td>07:46</td>
                <td>17:40</td>
                <td>
                ❌
                </td>
                <td>
                    <input type="checkbox" name="" id="">
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    新增/更新
    <div style="background-color:#d9d9d9; width:100%;">
        <div style="height:50px; line-height:50px;">
            文字
            <input type="text">
            <br/>
        </div>
        <div style="height:50px; line-height:50px;">
            文字
            <input type="text">
        </div>
        <div style="height:50px; line-height:50px;">
            文字
            <input type="text">
            <br/>
        </div>
        <div style="height:50px; line-height:50px;">
            文字
            <input type="text">
            <br/>
        </div>
    </div>
    <hr>
    伸縮選單
    

</body>
</html>