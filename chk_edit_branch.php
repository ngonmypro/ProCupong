<?php session_start();
include "Connections/connect_mysql.php";
mysql_query("set names utf8");


$sqlED = "UPDATE tblbrand SET `bran_name` = '".$_POST['branE']."',`bran_names` = '".$_POST['bransE']."', `bran_updateby` = '".$_SESSION['Uuser']."' , `bran_updatetime` = NOW()  WHERE bran_id = '".$_POST['id']."' ";
$resultED = mysql_query($sqlED) or die(mysql_error());

mysql_close($c);
echo "Y";

 ?>
