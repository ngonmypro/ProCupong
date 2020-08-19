<?php session_start();
include "Connections/connect_mysql.php";
/*mysql_query("SET NAMES TIS620");
mysql_query("SET character_set_results=tis620");
mysql_query("SET character_set_client=tis620");
mysql_query("SET character_set_connection=tis620");*/
mysql_query("set names utf8");


$sql = 'INSERT INTO tbluser (use_code_user, use_username, use_password, use_name, use_lname, use_branid, use_groid, use_createby, use_createtime, use_updateby, use_updatetime) VALUES ("'.$_POST['code_user'].'", "'.$_POST['username2'].'", "'.$_POST['password2'].'", "'.$_POST['name'].'",
"'.$_POST['lastname'].'", "'.$_POST['bran'].'", "'.$_POST['group'].'", "'.$_SESSION['Uuser'].'", NOW(), "'.$_SESSION['Uuser'].'", NOW())';
$result = mysql_query($sql) or die(mysql_error());

echo "Y";
mysql_close($c);
 ?>
