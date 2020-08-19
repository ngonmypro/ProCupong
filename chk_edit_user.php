<?php session_start();
include "Connections/connect_mysql.php";
mysql_query("set names utf8");

//echo $_POST["bran_ed"];

$sqlED = 'UPDATE tbluser SET use_code_user = "'.$_POST["code_user_ed"].'" , use_username = "'.$_POST["username_ed"].'" , use_password = "'.$_POST["password_ed"].'" , use_name = "'.$_POST["name_ed"].'" , use_lname = "'.$_POST["lastname_ed"].'" , use_branid = "'.$_POST["bran_ed"].'" ,
use_groid = "'.$_POST["group_ed"].'" , use_updateby = "'.$_SESSION['Uuser'].'" , use_updatetime = NOW() WHERE use_id = "'.$_POST["id"].'" ';
$resultED = mysql_query($sqlED) or die(mysql_error());

mysql_close($c);
echo "Y";

 ?>
