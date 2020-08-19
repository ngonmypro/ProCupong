<?php include "Connections/connect_mysql.php";
$sql = 'SELECT *  FROM tblcupong WHERE cup_price = "'.$_POST['priceP'].'" and cup_status_print = 1';
$result = mysql_query($sql) or die(mysql_error());
$b = mysql_num_rows($result);

if ($b != 0) {
  echo $b;
}else {
  echo 0;
}

mysql_close($c); //close connection
?>
