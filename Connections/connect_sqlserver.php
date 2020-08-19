<?
$servername = '192.168.1.92'; //\SQLEXPRESS'; //​กำ​หนดชื่อ​ server
$user = 'sa'; //​กำ​หนดชื่อ​ user name ​ที่​จะ​ connect database
$pass = 'yongdb'; //​กำ​หนด​ password ​ที่​จะ​ connect ​ไปที่​ database

//$servername = '192.168.1.92'; // Server จริง
//$user = 'sa'; // user จริง
//$pass = 'yongdb'; //password จริง

$databasename = 'dbpos_yonghouse'; //​กำ​หนดชื่อ​ database ​บน​ Microsoft SQL

$connection_string = "DRIVER={SQL Server};SERVER=$servername;DATABASE=$databasename;AutoTranslate=no"; 
//​เป็น​การกำ​หนด​ connection string ​ใน​การ​ connect ODBC
$cid = odbc_connect($connection_string,$user, $pass) or die ("เชื่อม​ไม่​ได้");
if (!$cid){
	echo "Can't connect SQL SERVER database!";
	exit();
	//$txtsql = "SELECT * FROM dbo.Officer WHERE Password='036780421580221'";	
	//$itemresult = odbc_exec($cid,$txtsql);
}
?>