create database AttendanceSystem;

create table Employee (
	EmployeeID varchar(20) not NULL primary key,
    ChtName nvarchar(60) NULL,
    Password varchar(80) NULL,
    Phone varchar(40) NULL,
    Address nvarchar(200) NULL,
    Email varchar(80) NULL,
    IsOutOfWork bit default 0,
    EmergencyContact nvarchar(60) NULL,
    EmergencyPhone varchar(40) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table SignRecords(
    EmployeeID varchar(20) not NULL,
    SignDay Date,
    SignIn  TIME,
    SignOut TIME,
);

create table EmployeeClass(
    EmployeeClassID int AUTO_INCREMENT primary key,
    EmployeeClassName nvarchar(40) NULL
)

create table EmployeeClassRelation(
    EmployeeID varchar(20) not NULL,
    EmployeeClassID int
)

create table EmployeeTeam(
    EmployeeTeamID int AUTO_INCREMENT primary key,
    EmployeeTeamName nvarchar(60) not NULL,
)

create table EmployeeSubstitute(
    EmployeeSubstituteID int AUTO_INCREMENT primary key,
    EmployeeID varchar(20) not NULL,
    SubstituteEmployeeID varchar(20) not NULL
)

create table LeaveDayApply (
	ApplyNo varchar(40) not NULL primary key,
    LeaveBeginDate TIMESTAMP not NULL,
    LeaveEndDate TIMESTAMP not NULL,
    OffDay int NULL,
    OffHours int NULL,
    CurrentStep int not NULL,
    LeaveDayKindID varchar(20) not NULL,
    FinalStep int not NULL
);

create table LeaveDayKind(
    LeaveDayKindID varchar(20) primary key,
    LeaveDayKindName nvarchar(60) not NULL
);

create table LeaveSignLevel(
    LeaveSignLevelID varchar(20) primary key,
    LeaveSignName nvarchar(60) not NULL
);

create table LeaveSignLevelEveryStep(
    LeaveSignLevelID varchar(20) not NULL,
    LeaveSignLevelStep int not NULL,
    EmployeeID varchar(20) not NULL,
);