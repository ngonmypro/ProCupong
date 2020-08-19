<?

$servername = '192.168.5.92'; // Server จริง
$user = 'sa'; // user จริง
$pass = 'Y@ngH0u$e'; //password จริง

$databasename = 'dbposy7_yonghouse'; //​กำ​หนดชื่อ​ database ​บน​ Microsoft SQL

$conCSIW = "DRIVER={SQL Server};SERVER=$servername;DATABASE=$databasename;AutoTranslate=no"; 
//​เป็น​การกำ​หนด​ connection string ​ใน​การ​ connect ODBC
$cp = odbc_connect($conCSIW,$user, $pass) or die ("เชื่อม​ไม่​ได้");
if (!$cp){
	echo "Can't connect SQL SERVER database!";
	exit();
	//$txtsql = "SELECT * FROM dbo.Officer WHERE Password='036780421580221'";	
	//$itemresult = odbc_exec($cid,$txtsql);
}else{
	//echo "connect success";	
}
?>