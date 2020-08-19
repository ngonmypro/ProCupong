<?

$servername = '192.168.1.92'; // Server จริง
$user = 'sa'; // user จริง
$pass = 'yongdb'; //password จริง

$databasename = 'dbwins_yonghouse'; //​กำ​หนดชื่อ​ database ​บน​ Microsoft SQL

$conChkStore = "DRIVER={SQL Server};SERVER=$servername;DATABASE=$databasename;AutoTranslate=no"; 
//​เป็น​การกำ​หนด​ connection string ​ใน​การ​ connect ODBC
$cwmt = odbc_connect($conChkStore,$user, $pass) or die ("เชื่อม​ไม่​ได้");
if (!$cwmt){
	echo "Can't connect SQL SERVER database!";
	exit();
	//$txtsql = "SELECT * FROM dbo.Officer WHERE Password='036780421580221'";	
	//$itemresult = odbc_exec($cid,$txtsql);
}else{
    //echo "เชื่อมต่อสำเร็จ...";	
}
?>