<?
$servername = 'MT_PROGRAM_01'; //\SQLEXPRESS'; //​กำ​หนดชื่อ​ server
$user = 'sa'; //​กำ​หนดชื่อ​ user name ​ที่​จะ​ connect database
$pass = 'yongdb'; //​กำ​หนด​ password ​ที่​จะ​ connect ​ไปที่​ database
$databasename = ''; //​กำ​หนดชื่อ​ database ​บน​ Microsoft SQL
$connection_string = "DRIVER={SQL Server};SERVER=$servername;DATABASE=$databasename;AutoTranslate=no";
//​เป็น​การกำ​หนด​ connection string ​ใน​การ​ connect ODBC
$cid = odbc_connect($connection_string,$user, $pass) or die ("เชื่อม​ไม่​ได้");
if (!$cid){
	echo "Can't connect SQL SERVER database!";
	exit();
}else{
	//echo "Connect SQL Server Success";
}
//เริ่มสร้าง database ใน SQL Server
$sql = "IF NOT EXISTS (SELECT [name] FROM Master..sysdatabases WHERE [name] = 'newdb') BEGIN CREATE DATABASE newdb END";
$result = odbc_exec($cid,$sql);
if(!$result){
    echo "Can'not Create data base";
    odbc_close($cid);
    exit();
}else{
   //	echo "Create SQL Server database success! ";
}

odbc_close($cid);
?>
