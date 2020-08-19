<?
	session_start();
  include "Connections/connect_mysql.php";
	$username = $_POST['username'];
	$password = $_POST['password'];

	//echo "{$username},{$password}";


	$sql = " SELECT *  FROM `tbluser` WHERE `use_username` LIKE '{$username}' AND `use_password` LIKE '{$password}'  ";
	//$sql = $sql . " AND `statonline` = 'N' ";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)==0){
		//header("content-type: text/javascript; charset=utf-8");
		//echo "alertBDialog('ข้อมูลไม่ถูกต้อง','Username หรือ Password ไม่ถูกต้อง. ');";
		echo "username หรือ password ไม่ถูกต้อง <br> หรือคุณอาจ login ที่เครื่องอื่นอยู่แล้ว ";
	}else{
		$member = mysql_fetch_array($result); //เก้บข้อมูลไว้ใน recordset
		//$_SESSION[''] = $member[''];
		//$_SESSION[''] = iconv('tis-620','utf-8',$member['']);
		$_SESSION['Uid'] = $member['use_id'];
		$_SESSION['Ucode'] = $member['use_code_user'];
		$_SESSION['Uuser'] = $member['use_username'];
		$_SESSION['Ubran'] = $member['use_branid'];
		$_SESSION['Ustapass'] = $member['use_status_pass'];
		$_SESSION['Utype'] = $member['use_groid'];

		if ($_SESSION['Utype']!=2) {
			echo "Y";
		}else {
			echo "N";
		}
	}


	mysql_close($c); //close connection


?>
