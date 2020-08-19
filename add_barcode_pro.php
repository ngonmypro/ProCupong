<?php session_start();
include "Connections/connect_mysql.php";
mysql_query("set names utf8");
  $date = $_POST['date_start'];
  $datestart = substr($date, 2, 2).substr($date, 5, 2).substr($date, 8, 2);

$sqls = 'SELECT * FROM tblcupong WHERE cup_letid = "'.$_POST['letter'].'" AND cup_price = "'.$_POST['price'].'" AND cup_day_start = "'.$date.'" ORDER BY cup_number DESC ';
$results = mysql_query($sqls);
$rows = mysql_fetch_array($results);
  $rows['cup_day_start'];
  $rows['cup_number'];
        if ($rows['cup_day_start'] == $date) {
          if ($rows['cup_number'] < 10000) {
              $b = $rows['cup_number'];
          }else if ($rows['cup_number'] >= 10000) {
            $b = 10000;
          }else {
          $b = 0;
          }
        }else {
        $b = 0;
        }
if ($b >= 10000) {
    echo "NN";
}else{
for ($i=1; $i <= $_POST['numbar']; $i++) {
    $a = $b+$i;
    //echo $a;
  if ($a <= 9) {
    $s = "00".$a;
  }elseif ($a <=99) {
    $s = "0".$a;
  }elseif ($a <=999) {
    $s = "".$a;
  }else {
    echo "string";
  }
  $sql = 'SELECT * FROM tblletter, tblmoney WHERE let_id = "'.$_POST['letter'].'" AND mon_id = "'.$_POST['price'].'"';
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
    $row['let_name'];
    $row['mon_names'];
  $bar = $row['let_name'].$row['mon_names'].$datestart.$s;

    $sql2 = 'SELECT * FROM tblcupong';
    $result2 = mysql_query($sql2) or die(mysql_error());
    $barcode = mysql_fetch_array($result2);
    $barcode['cup_code'];
  if ($barcode['cup_code'] == $bar) {
  echo "N";
}else{$sql3 = 'INSERT INTO tblcupong (cup_code, cup_price, cup_letid, cup_number, cup_condition, cup_day_start, cup_day_end, cup_createby, cup_createtime, cup_updateby, cup_updatetime) VALUES ("'.$bar.'", "'.$_POST['price'].'", "'.$_POST['letter'].'", "'.$a.'", "'.$_POST['condition'].'", "'.$_POST['date_start'].'", "'.$_POST['date_end'].'", "'.$_SESSION['Uuser'].'", NOW(), "'.$_SESSION['Uuser'].'", NOW())';
  $result3 = mysql_query($sql3) or die(mysql_error());
}
}
echo "Y";
}


mysql_close($c);
 ?>
