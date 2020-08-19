<?php session_start();
include "Connections/connect_mysql.php";
/*mysql_query("SET NAMES TIS620");
mysql_query("SET character_set_results=tis620");
mysql_query("SET character_set_client=tis620");
mysql_query("SET character_set_connection=tis620");*/
mysql_query("set names utf8");


$sql = 'INSERT INTO tblbrand (bran_name, bran_names, bran_createby, bran_createtime, bran_updateby, bran_updatetime) VALUES ("'.$_POST['bran'].'", "'.$_POST['brans'].'", "'.$_SESSION['Uuser'].'", NOW(), "'.$_SESSION['Uuser'].'", NOW())';
$result = mysql_query($sql) or die(mysql_error());

echo "Y";
mysql_close($c);
 ?>
