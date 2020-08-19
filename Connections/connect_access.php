<?
	
	// Microsoft Access
	
	//Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\mydatabase.accdb;Uid=Admin;Pwd=;
	//Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\mydatabase.accdb;SystemDB=C:\mydatabase.mdw;
	//Driver={Microsoft Access Driver (*.mdb,*.accdb)};DBQ=" & Server.MapPath("/access/mydatabase.accdb")
	
	$mdbFilename =  "D:\webyong58\PCR\CSIW_DB.accdb"; //"E:\jakkirtYH\CSIW_DB_new.accdb"; //"C:\AppServ\www\PCR\CSIW_DB.accdb";
	$user = "";
	$password = "";
	$conacc = odbc_connect("Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$mdbFilename", $user, $password);
	
	//$connection = odbc_connect("testOdbc", $user, $password);
	if(!$conacc){
		echo "Can't connect Access database!";
		exit();	
	}else{
		//echo "Connect Access Database successful.";
	}
	
	

	//odbc_close($Cacc);
?>