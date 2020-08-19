<?
include "connect_mysql.php";

$sql_s = "SELECT * FROM tbluser";
$result_s = mysql_query($sql_s) or die(mysql_error());
if (mysql_num_rows($result_s)==0){
  $sql = " INSERT INTO  `cupong_db`.`tbluser` ( ";
  $sql .= " `use_id` , ";
  $sql .= " `use_code_user` , ";
  $sql .= " `use_username` , ";
  $sql .= " `use_password` , ";
  $sql .= " `use_name` , ";
  $sql .= " `use_lname` , ";
  $sql .= " `use_branid`, ";
  $sql .= " `use_groid`, ";
  $sql .= " `use_createby`, ";
  $sql .= " `use_createtime`, ";
  $sql .= " `use_updateby`, ";
  $sql .= " `use_updatetime`, ";
  $sql .= " `use_status` ";
  $sql .= " ) ";
  $sql .= " VALUES ('', 'A001', 'admin',  'admin123456',  'Admini',  'strator',  '1', '1', 'Admin', NOW(), 'Admin', NOW(), '1'); ";
  $result = mysql_query($sql) or die(mysql_error());
}
mysql_close($c);
?>
