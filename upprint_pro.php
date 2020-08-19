<?php include "Connections/connect_mysql.php";

$sqlED = 'UPDATE tblcupong SET cup_status_print = 0 WHERE cup_code = "'.$_POST['bar'].'"';
$resultED = mysql_query($sqlED) or die(mysql_error());

mysql_close($c);
?>
