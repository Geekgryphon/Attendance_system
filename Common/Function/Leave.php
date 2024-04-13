<!-- search  cmd -> insert update delete view

page 

table

form  -->

<?php 
require_once "DB.php";

class Leave{

    private $oDb;

    public function __construct() {
        $this->oDb = new DB();
    }

    public function CreateLeaveDayKind($KindName){
        $this->oDb->query("INSERT INTO LeaveDayKind(LeaveDayKindName, IsActive) 
                           VALUES(?, 1)
                          ", array($KindName));
    }

    public function UpdateLeaveDayKind($KindID,  $KindName, $IsActive){
        $this->oDb->query("UPDATE LeaveDayKind SET  LeaveDayKindName = ? and IsActive = ?
                           WHERE LeaveDayKindID = ? and NOT EXISTS(SELECT 1 FROM LeaveDayApply WHERE LeaveDayKindID = ? )
                          ", array($KindName, $IsActive, $KindID, $KindID));
    }

    public function DeleteLeaveDayKind($KindID){
        $this->oDb->query("SET @KindID = ?
                           DELETE FROM LeaveDayKind 
                           WHERE LeaveDayKindID = @KindID AND NOT EXISTS(SELECT 1 FROM LeaveDayApply WHERE LeaveDayKindID = @KindID )"
                        , array($KindID));
    }

    public function LeaveDayKindSetActive($KindID){
        $this->oDb->query("UPDATE LeaveDayKind 
                           SET IsActive = (Case when IsActive = 0 then 1 else 0 END)  
                           WHERE LeaveDayKindID = ? ", array($KindID)); 
    }

    public function getLeaveDayKindPageData($offset){
        $this->oDb->query("SELECT * FROM  LeaveDayKind ORDER BY LeaveDayKindID asc
                           LIMIT 10 OFFSET ? ", array($offset)); 
    }

    public function CreateLeaveSignLevel($LevelID , $LevelName){
        $this->oDb->query("SET @LeaveSignLevelID = ? ;
                           SET @LeaveSignLevelName = ? ;

                           IF NOT EXISTS(SELECT 1 FROM LeaveSignLevel WHERE LeaveSignLevelID = @LeaveSignLevelID or LeaveSignLevelName = @LeaveSignLevelName )
                           BEGIN
                             INSERT INTO LeaveSignLevel(LeaveSignLevelID, LeaveSignLevelName)
                             VALUES(@LeaveSignLevelID, @LeaveSignLevelName)
                           END", array($LevelID, $LevelName));
    }

    public function UpdateLeaveSignLevel($LevelID , $LevelName){
        $this->oDb->query("UPDATE LeaveSignLevel SET  LeaveSignLevelName = ? 
                           WHERE LeaveSignLevelID = ? and NOT EXISTS(SELECT 1 FROM LeaveSignLevel WHERE LeaveSignLevelName = ? )
                           ", array($LevelName, $LevelID, $LevelName));
    }
    public function DeleteLeaveSignLevel($LevelID){
        $this->oDb->query("SET @LeaveSignLevelID = ?
                           IF NOT EXISTS(SELECT 1 FROM LeaveDayApply WHERE LeaveSignLevelID = @LeaveSignLevelID)
                           BEGIN
                             DELETE FROM LeaveSignLevelEveryStep WHERE LeaveSignLevelID = @LeaveSignLevelID
                             DELETE FROM LeaveSignLevel WHERE LeaveSignLevelID = @KindID
                           END"
                           
                        , array($LevelID));
    }
    public function LeaveSignLevelSetActive($LevelID){
        $this->oDb->query("UPDATE LeaveSignLevel 
                           SET IsActive = (Case when IsActive = 0 then 1 else 0 END)  
                           WHERE LeaveSignLevelID = ? ", array($LevelID)); 
    }

    public function getLeaveSignLevelPageData($offset){
        $this->oDb->query("SELECT * FROM  LeaveSignLevel ORDER BY LeaveSignLevelID asc
                           LIMIT 10 OFFSET ? ", array($offset)); 
    }

    public function CreateLeaveSignLevelEveryStep($LevelID, $empID){
        $this->oDb->query("SET @LeaveSignLevelID = ?;
                           SET @Step = (SELECT CAST(sum(1)  as int) FROM  LeaveSignLevelEveryStep WHERE ) + 1;
                           INSERT INTO LeaveSignLevelEveryStep(LeaveSignLevelID, LeaveSignLevelStep, EmployeeID) 
                           VALUES(@LeaveSignLevelID, @Step, ?)
                          ", array($LevelID, $empID));
    }

    public function UpdateLeaveSignLevelEveryStep($LevelID, $Step, $empID){

        $this->oDb->query("UPDATE LeaveSignLevelEveryStep SET  EmployeeID = ? 
                           WHERE LeaveSignLevelID = ? AND LeaveSignLevelStep = ?)
                           ", array($empID, $LevelID, $Step));
    }

    public function DeleteLeaveSignLevelEveryStep($LevelID, $Step){
        $this->oDb->query("DELETE FROM LeaveSignLevelEveryStep WHERE LeaveSignLevelID = ? AND LeaveSignLevelStep = ? ", array($LevelID, $Step)); 
    }

    public function getLeaveSignLevelEveryStepData($LevelID, $offset){
        $this->oDb->query("SELECT * FROM  LeaveSignLevelEveryStep 
                           WHERE LeaveSignLevelID = ? ORDER BY LeaveSignLevelStep asc 
                           ", array($LevelID, $offset)); 
    }

    public function CreateLeaveDayApply($BegTime, $EndTime, $LevelID, $KindID){

    }

    public function UpdateSubstituteEmployID(){

    } 

    public function SignLeaveDayApply(){

    }

    public function DeleteLeaveDayApply(){

    }
    public function getLeaveDayApplyPageData(){

    }

    // 使用 AJAX: 當使用者輸入搜尋條件後，使用 AJAX 將這些條件發送到伺服器，並根據搜尋條件返回適當的結果。點擊超連結時，可以阻止預設的連結行為，而是使用 JavaScript 載入新的內容，同時保留搜尋框中的資料。
}

?>