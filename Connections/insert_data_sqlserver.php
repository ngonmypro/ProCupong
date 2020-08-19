<?
include "connect_sqlserver.php";
$sql_s = "SELECT * FROM [approve_tb]";
$result_s = odbc_exec($cid,$sql_s) or die(odbc_error());
$items = 0;
while ($row = odbc_fetch_array($result_s)) 
   {
       $items++; //หาจำนวน reccord ใน table sql_server                          
   }  
 	odbc_free_result($result_s);
echo "<br>total No. of rows: $items";

if ($items==0){
	//echo " ยังไม่มีข้อมูล! ";	
$sql = "INSERT INTO [approve_tb] (EID,EmployeeID, ApprFormName, ApprFirstName, ApprLastName, ApprDepartment, ApprEmail, ApprPermit, ApprStatus, CreateID, CreateDate, UpdateID, UpdateDate) ";
$sql .= " VALUES ( 627,'1629345', 'Miss', 'KANYAKORN', 'WANNASRI', null, null, 1, 'Active', 'A001' , getdate() , 'A001', getdate()), "; 
$sql .= " (119, '1511084','Mr.','KOMSAN','BUNTENGSUK',null, null, 1, 'Active','A002', getdate(),	'A002', getdate()), ";
$sql .= " ( 425, '1605032','Mr.','RACHAN','KHONGKHAM', null, 'khongkham.r@pg.com',1,'Active'	,'A003', getdate(),	'A003', getdate()), "; 
$sql .= " ( 711, '1676982','Miss','RATTANA','SANPAUNG','QAQC','sanpaung.r@pg.com', 1,'Active', 'A004',  getdate(),'A004',  getdate()), ";
$sql .= " ( 653, '1642665','Miss', 'PORNTIP','WANNAPAK','HR', null, 1,'Active','A005', getdate(),'A005', getdate()), "; 
$sql .= " ( 172, '1511421','Mr.','TEERASAK','KHAEWCHAROEN',null,null,1,'Active','A006',getdate(),'A006', getdate()), ";
$sql .= " ( 155, '1511380','Mr.','SANIT','BOONJARAT', null, null,1,'Active','A007', getdate(),'A007', getdate()), ";
$sql .= " (1308,  '99991111','Mr.','PITAK','EIAMSAMANG',null,'EIAMSUM.PI',2,'Active','A008', getdate(),'A008',getdate()) ";

$insert_dt1 =odbc_exec($cid,$sql) or die(odbc_error()); 

echo " Insert data success! ";
	
}else{
    //echo " มีข้อมูลแล้ว ";	
}

odbc_close($cid);
?>