<?php session_start();
include "Connections/connect_mysql.php";
mysql_query("set names utf8");

//echo $_POST["password_edt"],"",$_SESSION['Uid'];

$sqlED = "UPDATE tbluser SET `use_password` = '".$_POST['password_edt']."' , use_updateby = '".$_SESSION['Uuser']."' , use_updatetime = NOW() , `use_status_pass` =  '1' WHERE use_id = '".$_SESSION['Uid']."' ";
$resultED = mysql_query($sqlED) or die(mysql_error());

mysql_close($c);
echo "Y";

 ?>
