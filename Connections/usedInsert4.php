<?
include "new_connect.php";

$sql_s = "SELECT * FROM employee_tb";
$result_s = mysql_query($sql_s) or die(mysql_error());
if (mysql_num_rows($result_s)==0){ //ถ้ายังไม่มี admin ในระบบ
$sql = " INSERT INTO `cas_db`.`employee_tb` ( ";
$sql .= " `emp_id` , ";
$sql .= " `emp_begin_name` , ";
$sql .= " `emp_firstname` , ";
$sql .= " `emp_lastname` , ";
$sql .= " `emp_username` , ";
$sql .= " `emp_password` , ";
$sql .= " `emp_position` , ";
$sql .= " `emp_statuslogin` , "; //<!--0=ไม่ login , 1= กำลัง login อยู่ -->
$sql .= " `emp_permission` , "; //<!-- admin , requestor, approver, visitor -->
$sql .= " `emp_approver` ,  ";  //<!-- apv0, apv1, apv2, apv3, apv4, apv5 -->
$sql .= " `creation_user` ,  ";
$sql .= " `modification_user` ,  ";
$sql .= " `creation_time` ,  ";
$sql .= " `modification_time`   ";
$sql .= " ) ";
$sql .= " VALUES ( ";
$sql .= " NULL , '', 'Administrator', '', 'admin', 'admin1234', 'System Admin', '0', 'admin', 'apv5', 'admin','admin', NOW() , NOW() ";
$sql .= " ); ";
$result = mysql_query($sql) or die(mysql_error());
}	
mysql_close($c);
?>