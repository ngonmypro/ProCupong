<?
include "connect_sqlserver.php";

$sqlt1 = "IF NOT EXISTS (SELECT [name] FROM sys.tables WHERE [name] = 'approve_tb') BEGIN  CREATE TABLE approve_tb ";
$sqlt1 .= "( ApprID INT NOT NULL IDENTITY (1,1) PRIMARY KEY , "; 
$sqlt1 .= " EID INT NOT NULL, ";
$sqlt1 .= " EmployeeID VARCHAR(10) NOT NULL, ";
$sqlt1 .= " ApprFormName VARCHAR(10) NULL, ";
$sqlt1 .= " ApprFirstName VARCHAR(100) NULL, ";
$sqlt1 .= " ApprLastName VARCHAR(100)  NULL, ";
$sqlt1 .= " ApprDepartment VARCHAR(100) NULL, ";
$sqlt1 .= " ApprEmail VARCHAR(100) NULL, ";
$sqlt1 .= " ApprPermit INT NULL, ";
$sqlt1 .= " ApprStatus VARCHAR(10) NULL, ";
$sqlt1 .= " CreateID VARCHAR(10) NULL, ";
$sqlt1 .= " CreateDate DATETIME NULL, ";
$sqlt1 .= " UpdateID VARCHAR(10) NULL, ";
$sqlt1 .= " UpdateDate DATETIME NULL) ";
$sqlt1 .= " END ";

$create_tb1 =odbc_exec($cid,$sqlt1) or die(odbc_error()); 

$sqlt2 = "IF NOT EXISTS (SELECT [name] FROM sys.tables WHERE [name] = 'approve_tb_2') BEGIN  CREATE TABLE approve_tb_2 ";
$sqlt2 .= "( Appr2ID INT NOT NULL IDENTITY (1,1) PRIMARY KEY , "; 
$sqlt2 .= " EmployeeID VARCHAR(10) NOT NULL, ";
$sqlt2 .= " Appr2Status VARCHAR(10) NULL, ";
$sqlt2 .= " CreateID VARCHAR(10) NULL, ";
$sqlt2 .= " CreateDate DATETIME NULL, ";
$sqlt2 .= " UpdateID VARCHAR(10) NULL, ";
$sqlt2 .= " UpdateDate DATETIME NULL) ";
$sqlt2 .= " END ";

$create_tb2 =odbc_exec($cid,$sqlt2) or die(odbc_error());

odbc_close($cid);
?>