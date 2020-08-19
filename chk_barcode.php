<?php session_start();
date_default_timezone_set("Asia/Bangkok");
//echo $_POST['barcode']," ",$_POST['idcustomer']," ",$_POST['idorder'];
include "Connections/connect_mysql.php";

$sql = 'SELECT * FROM tblcupong WHERE cup_code ="'.$_POST['barcode'].'"';
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);
    $row['cup_id'];
    $row['cup_status_using'];
    $row['cup_price'];
    $row['cup_day_end'];



if ($row['cup_code'] != $_POST['barcode']) {
  echo "N3,0";
/*}elseif ($row[''] != $_POST['idcustomer']) {
  echo "N5,0";
}*/
}elseif ($row['cup_status_using'] != 1) {
  echo "N1,0";
}elseif ($row['cup_day_end'] < date('Y-m-d')) {
  echo "N2,0";
}else {

  $sql1 ='INSERT INTO tblcheck (chk_use_code, chk_customer, chk_num_order, chk_bran_id, chk_cup_id, chk_day_using ) VALUES ("'.$_SESSION['Ucode'].'", "'.$_POST['idcustomer'].'","'.$_POST['idorder'].'","'.$_SESSION['Ubran'].'","'.$row['cup_id'].'", NOW())';
  $result1 = mysql_query($sql1) or die(mysql_error());

  $sql2 = 'UPDATE tblcupong SET cup_status_using = 0 WHERE cup_id = "'.$row['cup_id'].'"';
  $result2 = mysql_query($sql2) or die(mysql_error());

  $sql3 = 'SELECT * FROM tblmoney WHERE mon_id = "'.$row['cup_price'].'"';
  $result3 = mysql_query($sql3) or die(mysql_error());
  $row3 = mysql_fetch_array($result3);
      $row3['mon_name'];

  echo "N4,{$row3['mon_name']}";

}
mysql_close($c); //close connection

 ?>
