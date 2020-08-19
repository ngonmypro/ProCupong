<?
include "connect_mysql.php";

$sql1 = " CREATE TABLE IF NOT EXISTS `cupong_db`.`tbluser` ( ";
$sql1 .= " `use_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
$sql1 .= " `use_code_user` VARCHAR( 30 ) NOT NULL , ";
$sql1 .= " `use_username` VARCHAR( 30 ) NOT NULL , "; //user *
$sql1 .= " `use_password` VARCHAR( 30 ) NOT NULL , ";
$sql1 .= " `use_name` VARCHAR( 150 ) NOT NULL , ";
$sql1 .= " `use_lname` VARCHAR( 150 ) NOT NULL , ";
$sql1 .= " `use_branid` INT NOT NULL , ";
$sql1 .= " `use_groid` INT NOT NULL , ";
$sql1 .= " `use_createby` VARCHAR( 100 ) NOT NULL , ";
$sql1 .= " `use_createtime` DATE NOT NULL , ";
$sql1 .= " `use_updateby` VARCHAR( 100 ) NOT NULL , ";
$sql1 .= " `use_updatetime` DATE NOT NULL , ";
$sql1 .= " `use_status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
$sql1 .= " `use_status_pass` TINYINT( 1 ) NOT NULL DEFAULT  '0' , ";
$sql1 .= "  INDEX(use_code_user, use_username, use_password, use_name, use_lname, use_branid, use_groid, use_createby, use_createtime, use_updateby, use_updatetime, use_status) ";
$sql1 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

 $create_tb1 = mysql_query($sql1) or die(mysql_error());

 $sql2 = " CREATE TABLE IF NOT EXISTS `cupong_db`.`tblbrand` ( ";
 $sql2 .= " `bran_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
 $sql2 .= " `bran_name` VARCHAR( 100 ) NOT NULL , ";
 $sql2 .= " `bran_names` VARCHAR( 100 ) NOT NULL , ";
 $sql2 .= " `bran_createby` VARCHAR( 100 ) NOT NULL , ";
 $sql2 .= " `bran_createtime` DATE NOT NULL , ";
 $sql2 .= " `bran_updateby` VARCHAR( 100 ) NOT NULL , ";
 $sql2 .= " `bran_updatetime` DATE NOT NULL , ";
 $sql2 .= " `bran_status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
 $sql2 .= "  INDEX(bran_name, bran_names, bran_createby, bran_createtime, bran_updateby, bran_updatetime, bran_status) ";
 $sql2 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

  $create_tb2 = mysql_query($sql2) or die(mysql_error());


  $sql3 = " CREATE TABLE IF NOT EXISTS `cupong_db`.`tblcupong` ( ";
  $sql3 .= " `cup_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
  $sql3 .= " `cup_code` VARCHAR( 15 ) NOT NULL , ";
  $sql3 .= " `cup_price` INT  NOT NULL , ";
  $sql3 .= " `cup_letid` INT  NOT NULL , ";
  $sql3 .= " `cup_number` INT  NOT NULL , ";
  $sql3 .= " `cup_condition` VARCHAR( 100 ) NOT NULL , ";
  $sql3 .= " `cup_day_start` DATE NOT NULL , ";
  $sql3 .= " `cup_day_end` DATE NOT NULL , ";
  $sql3 .= " `cup_createby` VARCHAR( 100 ) NOT NULL , ";
  $sql3 .= " `cup_createtime` DATE NOT NULL , ";
  $sql3 .= " `cup_updateby` VARCHAR( 100 ) NOT NULL , ";
  $sql3 .= " `cup_updatetime` DATE NOT NULL , ";
  $sql3 .= " `cup_status_print` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
  $sql3 .= " `cup_status_using` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
  $sql3 .= "  INDEX(cup_code, cup_price, cup_createby, cup_createtime, cup_updateby, cup_updatetime, cup_status_print, cup_status_using) ";
  $sql3 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

   $create_tb3 = mysql_query($sql3) or die(mysql_error());

   $sql4 = " CREATE TABLE IF NOT EXISTS `cupong_db`.`tblcheck` ( ";
   $sql4 .= " `chk_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
   $sql4 .= " `chk_use_code` VARCHAR( 30 ) NOT NULL , ";
   $sql4 .= " `chk_customer` VARCHAR( 20 ) NOT NULL , ";
   $sql4 .= " `chk_num_order` VARCHAR( 20 ) NOT NULL , ";
  $sql4 .= " `chk_bran_id` INT NOT NULL , ";
   $sql4 .= " `chk_cup_id` INT NOT NULL , ";
   $sql4 .= " `chk_day_using` TIMESTAMP NOT NULL , ";
   $sql4 .= "  INDEX(chk_use_code, chk_customer, chk_num_order, chk_cup_id, chk_day_using) ";
   $sql4 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

    $create_tb4 = mysql_query($sql4) or die(mysql_error());


    $sql5 = " CREATE TABLE IF NOT EXISTS `cupong_db`.`tblgroup` ( ";
    $sql5 .= " `gro_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
    $sql5 .= " `gro_name` VARCHAR( 100 ) NOT NULL , ";
    $sql5 .= " `gro_createby` VARCHAR( 100 ) NOT NULL , ";
    $sql5 .= " `gro_createtime` DATE NOT NULL , ";
    $sql5 .= " `gro_updateby` VARCHAR( 100 ) NOT NULL , ";
    $sql5 .= " `gro_updatetime` DATE NOT NULL , ";
    $sql5 .= " `gro_status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
    $sql5 .= "  INDEX(gro_name, gro_createby, gro_createtime, gro_updateby, gro_updatetime, gro_status) ";
    $sql5 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

     $create_tb5 = mysql_query($sql5) or die(mysql_error());


     $sql6 = " CREATE TABLE IF NOT EXISTS `cupong_db`.`tblmoney` ( ";
     $sql6 .= " `mon_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
     $sql6 .= " `mon_name` VARCHAR( 100 ) NOT NULL , ";
     $sql6 .= " `mon_names` VARCHAR( 100 ) NOT NULL , ";
     $sql6 .= " `mon_createby` VARCHAR( 100 ) NOT NULL , ";
     $sql6 .= " `mon_createtime` DATE NOT NULL , ";
     $sql6 .= " `mon_updateby` VARCHAR( 100 ) NOT NULL , ";
     $sql6 .= " `mon_updatetime` DATE NOT NULL , ";
     $sql6 .= " `mon_status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
     $sql6 .= "  INDEX(mon_name, mon_names, mon_createby, mon_createtime, mon_updateby, mon_updatetime, mon_status) ";
     $sql6 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

      $create_tb6 = mysql_query($sql6) or die(mysql_error());


      $sql7 = " CREATE TABLE IF NOT EXISTS `cupong_db`.`tblletter` ( ";
      $sql7 .= " `let_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
      $sql7 .= " `let_name` VARCHAR( 100 ) NOT NULL , ";
      $sql7 .= " `let_createby` VARCHAR( 100 ) NOT NULL , ";
      $sql7 .= " `let_createtime` DATE NOT NULL , ";
      $sql7 .= " `let_updateby` VARCHAR( 100 ) NOT NULL , ";
      $sql7 .= " `let_updatetime` DATE NOT NULL , ";
      $sql7 .= " `let_status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
      $sql7 .= "  INDEX(let_name, let_createby, let_createtime, let_updateby, let_updatetime, let_status) ";
      $sql7 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

       $create_tb7 = mysql_query($sql7) or die(mysql_error());

mysql_close($c);
?>
