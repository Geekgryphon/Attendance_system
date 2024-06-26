create database AttendanceSystem;

use AttendanceSystem; 

create table Employee (
	EmployeeID varchar(20) not NULL primary key,
    ChtName nvarchar(60) NULL,
    PersonalID  varchar(20) NULL,
    Password varchar(80) NULL,
    Phone varchar(40) NULL,
    Address nvarchar(200) NULL,
    Email varchar(80) NULL,
    IsOutOfWork bit default 0,
    EmergencyContact nvarchar(60) NULL,
    EmergencyPhone varchar(40) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

insert into Employee (
    EmployeeID, ChtName, PersonalID, Password, 
    Phone, Address, Email, IsOutOfWork, 
    EmergencyContact, EmergencyPhone, created_at
) values (
    'EMP00258', '聶小倩', 'A12345678', 'EMP00258',
    '0912345678' ,'北興東路四號', 'example@gmail.com', 1,
    '媽媽', '0912345678' , now()
);

insert into Employee (
    EmployeeID, ChtName, PersonalID, Password, 
    Phone, Address, Email, IsOutOfWork, EmergencyContact, EmergencyPhone, created_at
) values (
    'EMP00259', '寧采臣', 'A12345679', 'EMP00259',
    '0912345678' ,'北興東路五號', 'example@gmail.com', 1,
    '爸爸', '0912345678' , now()
);

insert into Employee (
    EmployeeID, ChtName, PersonalID, Password, 
    Phone, Address, Email, IsOutOfWork, EmergencyContact, EmergencyPhone, created_at
) values (
    'EMP00260', '姥姥', 'A12345679', 'EMP00260',
    '0912345678' ,'北興東路五號', 'example@gmail.com', 1,
    '爸爸', '0912345678' , now()
);

insert into Employee (
    EmployeeID, ChtName, PersonalID, Password, 
    Phone, Address, Email, IsOutOfWork, EmergencyContact, EmergencyPhone, created_at
) values (
    'EMP00261', '小青', 'A12345679', 'EMP00261',
    '0912345678' ,'北興東路五號', 'example@gmail.com', 1,
    '爸爸', '0912345678' , now()
);

insert into Employee (
    EmployeeID, ChtName, PersonalID, Password, 
    Phone, Address, Email, IsOutOfWork, EmergencyContact, EmergencyPhone, created_at
) values (
    'EMP00262', '法海', 'A12345679', 'EMP00262',
    '0912345678' ,'北興東路五號', 'example@gmail.com', 1,
    '爸爸', '0912345678' , now()
);

insert into Employee (
    EmployeeID, ChtName, PersonalID, Password, 
    Phone, Address, Email, IsOutOfWork, EmergencyContact, EmergencyPhone, created_at
) values (
    'EMP00263', '刺客', 'A12345679', 'EMP00263',
    '0912345678' ,'北興東路五號', 'example@gmail.com', 1,
    '爸爸', '0912345678' , now()
);


create table SignRecords(
    EmployeeID varchar(20) not NULL,
    SignDay Date,
    SignInTime  TIME,
    SignOutTime TIME
);

create table EmployeeClass(
    EmployeeClassID int AUTO_INCREMENT primary key,
    EmployeeClassName nvarchar(40) NULL
);

insert into EmployeeClass(EmployeeClassName) values ('組長');
insert into EmployeeClass(EmployeeClassName) values ('職員');
insert into EmployeeClass(EmployeeClassName) values ('部門主任');

create table EmployeeClassRelation(
    EmployeeClassRelationID int PRIMARY key AUTO_INCREMENT,
    EmployeeID varchar(20) not NULL,
    EmployeeClassID int not NULL
);

insert into EmployeeClassRelation(EmployeeID, EmployeeClassID)
values('EMP00258', 1);

insert into EmployeeClassRelation(EmployeeID, EmployeeClassID)
values('EMP00259', 1);

insert into EmployeeClassRelation(EmployeeID, EmployeeClassID)
values('EMP00260', 1);

insert into EmployeeClassRelation(EmployeeID, EmployeeClassID)
values('EMP00261', 2);

insert into EmployeeClassRelation(EmployeeID, EmployeeClassID)
values('EMP00262', 2);

insert into EmployeeClassRelation(EmployeeID, EmployeeClassID)
values('EMP00262', 3);


create table EmployeeTeam(
    EmployeeTeamID int PRIMARY key AUTO_INCREMENT,
    EmployeeTeamName nvarchar(60) not NULL
);

create table EmployeeSubstitute(
    EmployeeSubstituteID int AUTO_INCREMENT primary key,
    EmployeeID varchar(20) not NULL,
    SubstituteEmployeeID varchar(20) not NULL
);


create table LeaveDayApply (
	ApplyNo varchar(40) not NULL primary key,
    LeaveBeginDate TIMESTAMP not NULL,
    LeaveEndDate TIMESTAMP not NULL,
    OffDay int NULL,
    OffHours int NULL,
    LeaveSignLevelID varchar(20) not NULL,
    CurrentStep int not NULL,
    LeaveDayKindID varchar(20) not NULL,
    FinalStep int not NULL,
    LeaveDayStateID varchar(5) not NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table LeaveDayApplyDetail (
    ApplyNo varchar(40) not NULL ,
    Step int not NULL,
    EmployeeID varchar(20) not NULL,
    SignTime TIMESTAMP NULL,
    IsApprove bit not null 
);

-- 無法使用功能維護 通過 審核中 新單 不同意

create table LeaveDayState (
    LeaveDayStateID varchar(5) not NULL,
    LeaveDayStateName varchar(40) not NULL
);

insert into LeaveDayState (LeaveDayStateID, LeaveDayStateName)
values('A','通過');

insert into LeaveDayState (LeaveDayStateID, LeaveDayStateName)
values('C','審核中');

insert into LeaveDayState (LeaveDayStateID, LeaveDayStateName)
values('N','新單');

insert into LeaveDayState (LeaveDayStateID, LeaveDayStateName)
values('D','不同意');

create table LeaveDayKind(
    LeaveDayKindID varchar(20) primary key,
    LeaveDayKindName nvarchar(60) not NULL,
    IsActive bit not NULL
);

create table LeaveSignLevel(
    LeaveSignLevelID varchar(20) primary key,
    LeaveSignLevelName nvarchar(60) not NULL
);

create table LeaveSignLevelEveryStep(
    LeaveSignLevelID varchar(20) not NULL,
    LeaveSignLevelStep int not NULL,
    EmployeeID varchar(20) not NULL
);

-- drop database AttendanceSystem;