<?php session_start();
include "Connections/connect_mysql.php";
mysql_query("set names utf8");

//echo $_POST["id"];

$sqlED = 'UPDATE tblcupong SET cup_code = "'.$_POST["code_bar_ed"].'" , cup_price = "'.$_POST["price_ed"].'" , cup_day_start = "'.$_POST["dates_ed"].'" , cup_day_end = "'.$_POST["datee_ed"].'", cup_updateby = "'.$_SESSION['Uuser'].'", cup_updatetime = NOW() WHERE cup_id = "'.$_POST["id"].'" ';
$resultED = mysql_query($sqlED) or die(mysql_error());

mysql_close($c);
echo "Y";

 ?>
