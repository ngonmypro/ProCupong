<?php session_start();
include "Connections/connect_mysql.php";
mysql_query("set names utf8");


$sqlED = "UPDATE tblgroup SET `gro_name` = '".$_POST['groupE']."', `gro_updateby` = '".$_SESSION['Uuser']."' , `gro_updatetime` = NOW()  WHERE gro_id = '".$_POST['id']."' ";
$resultED = mysql_query($sqlED) or die(mysql_error());

mysql_close($c);
echo "Y";

 ?>
