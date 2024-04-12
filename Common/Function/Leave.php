<!-- search  cmd -> insert update delete view

page 

table

form  -->

<?php 
require_once "DB.php";

class Leave{
    private $oDb = new DB();

    public function CreateLeaveDayKind(){}
    public function UpdateLeaveDayKind(){}
    public function DeleteLeaveDayKind(){}
    public function LeaveDayKindSetActive(){}
    public function getLeaveDayKindPageData(){}


    public function CreateLeaveSignLevel(){}
    public function UpdateLeaveSignLevel(){}
    public function DeleteLeaveSignLevel(){}
    public function LeaveSignLevelSetActive(){}
    public function getLeaveSignLevelPageData(){}

    public function CreateLeaveSignLevelEveryStep(){}
    public function UpdateLeaveSignLevelEveryStep(){}
    public function DeleteLeaveSignLevelEveryStep(){}
    public function getLeaveSignLevelEveryStepData(){}

    public function CreateLeaveDayApply(){}
    public function DeleteLeaveDayApply(){}
    public function getLeaveSignLevelPageData(){}

    // 使用 AJAX: 當使用者輸入搜尋條件後，使用 AJAX 將這些條件發送到伺服器，並根據搜尋條件返回適當的結果。點擊超連結時，可以阻止預設的連結行為，而是使用 JavaScript 載入新的內容，同時保留搜尋框中的資料。
}

?>