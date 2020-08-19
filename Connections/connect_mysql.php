<?
	$host="localhost";
	$user="root";
	$pw="root30323";

	$dbname="cupong_db";

	$c=mysql_connect($host,$user,$pw); //เชื่อมตอ
	mysql_select_db($dbname,$c); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
	mysql_query("set names utf8");
	//mysql_query("set names tis620"); //เชื่อมต่อไปเป็นภาษาไทย
 	if(!$c){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}else{
		//echo"<h3>connect database is success</h3>";
	}
 ?>
