<?php 
require_once "DB.php";

Class Employee{
    private $oDb = new DB();

    public function CreateEmployeeAccount($extraNum, $ChtName){

        if(is_numeric($extraNum)){
            $extraNum = str_pad($number, 3, '0', STR_PAD_LEFT);
            $result = $this->oDb->query("SELECT sum(1) as EmpNum FROM Employee WHERE EmployeeID like '%emp' + ? + '%'", array($extraNum));
            $newEmpIndex = $result["0"]["EmpNum"];

            $this->oDb->query("SET @extraNum = ? ;
                               SET @newEmpIndex = ? ;

                               IF NOT EXISTS(SELECT 1 FROM Employee WHERE EmployeeID = 'emp' + @extraNum + @newEmpIndex )
                               BEGIN
                                  INSERT INTO Employee(EmployeeID, ChtName)
                                  VALUES('emp' + @extraNum + @newEmpIndex, ?)
                               END", array($extraNum, $newEmpIndex, $ChtName));
            return $this->oDb->rowCount();
        }else{
            return 0;
        }

    }

    public function UpdateEmployeeAccount($empID, $UpdateData){
        $param = array();
        $sql = "UPDATE Employee SET ";
        $DataCount = 0;
        if(count($UpdateDate) > 0){
            foreach($UpdateData as $UpdateField => $UpdateValue){
                if( $DataCount + 1 == count($UpdateDate)){
                    $sql .= " " . $UpdateField . " = ? ";
                }else{
                    $sql .= " " . $UpdateField . " = ? , ";
                }
                $DataCount++;
                $param[] = $UpdateValue;
            }

            $sql = "WHERE EmployeeID = ? ";
            $param[] = $empID;

            $this->oDb->query($sql, $param);
            return $this->oDb->rowCount();
        }else{
            return 0;
        }
    }

    public function SetOutOfWork($empID){
        $this->oDb->query("UPDATE Employee 
                           SET IsOutOfWork = (Case when IsOutOfWork = 0 then 1 else 0 END)  
                           WHERE EmployeeID = ? ", array($empID)); 
    }

    public function GetEmployeePageData($offset){
        $this->oDb->query("SELECT * FROM  Employee ORDER BY EmployeeID asc
                           LIMIT 10 OFFSET ?", array($offset)); 
    }

    public function SetEmployeeClass($empID, $empClassID){
        $this->oDb->query("
                MERGE INTO EmployeeClassRelation AS target
                USING (VALUES (?, ?)) AS source (EmployeeID, EmployeeClassID)
                ON target.EmployeeID = source.EmployeeID
                WHEN MATCHED THEN
                    UPDATE SET target.EmployeeClassID = source.EmployeeClassID
                WHEN NOT MATCHED THEN
                    INSERT (EmployeeID, EmployeeClassID)
                    VALUES (source.EmployeeID, source.EmployeeClassID);
        ", array($empID, $empClassID));
    }

    public function CreateEmployeeClass($ClassName){
        $this->oDb->query("SET @ClassName = ?
                           IF NOT EXISTS(SELECT 1 FROM EmployeeClass WHERE ClassName = @ClassName)
                           BEGIN
                             INSERT EmployeeClass(EmployeeClassName)
                             VALUES (@ClassName);
                           END;
        ", array($ClassName));
    }

    public function UpdateEmployeeClass($ClassID, $ClassName){
        $this->oDb->query(" SET @EmployeeClassClassID = ?;
                            SET @EmployeeClassName = ?;
                            IF NOT EXISTS(SELECT 1 FROM EmployeeClass WHERE EmployeeClassName = @EmployeeClassName)
                            BEGIN
                                UPDATE EmployeeClass SET EmployeeClassName = @EmployeeClassName
                                WHERE EmployeeClassClassID = @EmployeeClassClassID
                            END;
        ", array($ClassID, $ClassName));
    }

    public function DeleteEmployeeClass($EmpClassID){
        $this->oDb->query(" SET @EmployeeClassID = ?;
                            DELETE FROM EmployeeClass 
                            WHERE EmployeeClassID = @EmployeeClassID
                            AND NOT EXISTS(SELECT 1 FROM EmployeeClassRelation WHERE EmployeeClassID = @EmployeeClassID)
        ");

        return $this->oDb->rowCount();
    }

    public function GetEmployeeClassPageData($offset){
        $this->oDb->query("SELECT * FROM  EmployeeClass ORDER BY EmployeeClassID asc
                           LIMIT 10 OFFSET ? ", array($offset)); 
    }

    public function CreateSubstituteEmployee($empID, $SubempID){
        $this->oDb->query("SET @EmployeeID = ?;
                           SET @SubstituteEmployeeID = ?;

                           IF NOT EXISTS(SELECT 1 FROM EmployeeSubstitute WHERE EmployeeID = @EmployeeID)
                           BEGIN
                             INSERT EmployeeSubstitute(EmployeeID, SubstituteEmployeeID)
                             VALUES (@EmployeeID, @SubstituteEmployeeID);
                           END;
        ", array($empID, $SubempID));
    }

    public function UpdateSubstituteEmployee($empID, $SubempID){
        $this->oDb->query("UPDATE EmployeeSubstitute set SubstituteEmployeeID = ?
                           WHERE EmployeeID = ?;
        ", array($SubempID, $empID));
    }

    public function DeleteSubstituteEmployee($empID){
        $this->oDb->query("DELETE FROM EmployeeSubstitute 
                           WHERE EmployeeID;
        ", array($SubempID, $empID));
    }

    public function GetSubstituteEmployeePageData($offset){
        $this->oDb->query("SELECT * FROM  EmployeeSubstitute ORDER BY EmployeeSubstituteID asc
                           LIMIT 10 OFFSET ?", array($offset)); 
    }

    // public function CreateEmployeeTeam($TeamName, $TeamNo){
    //     $this->oDb->query("
    //             MERGE INTO CreateEmployeeTeam AS target
    //             USING (VALUES (?, ?)) AS source (EmployeeTeamID, EmployeeTeamName)
    //             ON target.EmployeeClassID = source.EmployeeClassID
    //             WHEN MATCHED THEN
    //                 UPDATE SET target.EmployeeTeamName = source.EmployeeTeamName
    //             WHEN NOT MATCHED THEN
    //                 INSERT (EmployeeTeamID, EmployeeTeamName)
    //                 VALUES (source.EmployeeTeamID, source.EmployeeTeamName);
    //     ", array($TeamNo, $TeamName));
    // }

    // public function DeleteEmployeeTeam($TeamName, $TeamNo){
    //     $this->oDb->query(" SET @EmployeeTeamID = ?;
    //                         DELETE FROM EmployeeTeam 
    //                         WHERE EmployeeTeamID = @EmployeeTeamID
    //                         AND NOT EXISTS(SELECT 1 FROM EmployeeClassRelation WHERE EmployeeClassID = @EmployeeClassID)
    //     ");
    // }

    public function setPassword($empID, $oldpwd, $newpwd){
        $this->oDb->query("UPDATE Employee set Password = ? 
        WHERE EmployeeID = ? and Password = ?
        ", array($newpwd, $empID, $oldpwd));

        return $this->oDb->rowCount();
    }

    public function setDefaultPassword($empID, $pwd){
        $this->oDb->query("UPDATE Employee set Password = ? 
        WHERE EmployeeID = ? 
        ", array($pwd, $empID));

        return $this->oDb->rowCount();
    }
    
}

?>