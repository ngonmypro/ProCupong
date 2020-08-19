<?
//--- function php getdata ---//

	session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	//กำหนดวันที่ปัจจุบัน
	$date_today=date("Y-m-d");
	$time_today=date("H:i:s");
	$date_time=date("Y-m-d H:i:s");
	
	
// --- get ip address --- //
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

// --- แสดงวันที่แบบไทย --- //
function  displaydate($x){
	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	
	$date_array=explode("-",$x);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=$date_array[2];
	
	$m=$date_m[$m];
	
	$displaydate="$d $m $y";
	return $displaydate;
}

// --- ดึงชื่อหน่วยนับ --- //
function get_unitname($unitid){
   //เชื่อมต่อฐานข้อมูล Winspeed
   include "Connections/connect_dbwins_yonghouse.php"; //เปิดการเชื่อมต่อ sql  
   
   $sql2 = " SELECT * FROM emgoodunit WHERE goodunitid ='{$unitid}' ";
   $result2 = odbc_exec($cwmt,$sql2);
	if($result2){
		$gooditem2 = odbc_fetch_array($result2);
		$goodunitname2 = iconv('tis-620','utf-8',$gooditem2['GoodUnitName']); 	
	}
	
   //ปิดการเชื่อมต่อ Winspeed
   odbc_close($cwmt); // ปิดการเชื่อมต่อ sql  
   //ตรวสอบผลลัพธ์แล้วส่งกลับโปรแกรมหลัก
   if($goodunitname2){
	   $goodunitname2=$goodunitname2;	   
   }else{
	   $goodunitname2='-';
   }
   //ส่งค่ากลับโปรแกรมหลัก
   return $goodunitname2;
}

// --- ดึงบาร์โค้ด --- //
function get_barcode($goodid){
	//EMGoodMultiUnit
   //เชื่อมต่อฐานข้อมูล Winspeed
   include "Connections/connect_dbwins_yonghouse.php"; //เปิดการเชื่อมต่อ sql  
   $sql3 = " SELECT * FROM EMGoodMultiUnit WHERE GoodID ='{$goodid}' ";
   $result3 = odbc_exec($cwmt,$sql3);
   if($result3){
		$gooditem3 = odbc_fetch_array($result3);
		$goodbarcode3 = $gooditem3['Barcode'];   
   }
   //ปิดการเชื่อมต่อ Winspeed
   odbc_close($cwmt); // ปิดการเชื่อมต่อ sql 
   
   //ตรวสอบผลลัพธ์
   if($goodbarcode3){
	  $goodbarcode3 = $goodbarcode3;   
   }else{
	  $goodbarcode3 = "-"; 
   }
   
   //ส่งค่ากลับโปรแกรมหลัก
   return $goodbarcode3;
   
}

// --- ดึงราคาแยกคลัง --- //
function get_stock1($goodcode,$brchid,$invecode){
	
   //เชื่อมต่อฐานข้อมูล Winspeed
   include "Connections/connect_dbwins_yonghouse.php"; //เปิดการเชื่อมต่อ sql  
	
	$sql4 = " select (eminve.invecode) invecode , (eminve.invename) invename , (eminve.invenameeng) invenameeng , (emloca.locacode) locacode , (emloca.locaname) locaname , (emloca.locanameeng) locanameeng ,(emgood.goodcode) goodcode ,(emgood.goodname1) goodname1 ,(emgood.goodnameeng1) goodnameeng1 ,(emgoodunit.goodunitname) goodunitname ,(emgoodunit.goodunitnameeng) goodunitnameeng ,(isnull(sum(case icstockdetail.stockflag when 1 then icstockdetail.goodstockqty when -1 then -icstockdetail.goodstockqty else 0 end),0)) remaqty ";
	$sql4 .= " from	emgood left outer join emgoodtype on (emgood.goodtypeid =  emgoodtype.goodtypeid) left outer join emgoodcate on (emgood.goodcateid = emgoodcate.goodcateid) left outer join emgoodbrand on (emgood.goodbrandid = emgoodbrand.goodbrandid) left outer join emgoodgroup on (emgood.goodgroupid = emgoodgroup.goodgroupid) left outer join icstockdetail on (emgood.goodid = icstockdetail .goodid) left outer join eminve on (eminve.inveid = icstockdetail.inveid) left outer join emloca on (emloca.locaid = icstockdetail.locaid),emgoodunit ";
	$sql4 .= " WHERE  (emgood.maingoodunitid = emgoodunit.goodunitid) and   (emgood.goodpackflag not in ('S')) and (icstockdetail.stockflag in (1, -1)) and  (convert(varchar(8), icstockdetail.docudate, 112) <= '" . date("Ymd") . "' ) ";
	$sql4 .= " and (icstockdetail.brchid =" . $brchid . " ) ";
	$sql4 .= " AND (  ( eminve.invecode between '" . $invecode . "' and '" . $invecode . "' ) "; 
 	$sql4 .= " and ( emgood.goodcode between '" . $goodcode . "' and '" . $goodcode . "' )) ";  
	$sql4 .= " group by ";
	$sql4 .= " eminve.invecode , ";
	$sql4 .= " eminve.invename , ";
	$sql4 .= " eminve.invenameeng , ";
	$sql4 .= " emloca.locacode , ";
	$sql4 .= " emloca.locaname , ";
	$sql4 .= " emloca.locanameeng , ";
	$sql4 .= " emgood.goodcode , ";
	$sql4 .= " emgood.goodname1 , ";
	$sql4 .= " emgood.goodnameeng1 , ";
	$sql4 .= " emgoodunit.goodunitname , ";
	$sql4 .= " emgoodunit.goodunitnameeng ";
	$sql4 .= " having (isnull(sum(case icstockdetail.stockflag when 1 then icstockdetail.goodstockqty when -1 then -icstockdetail.goodstockqty else 0 end),0) <> 0) ";
	$sql4 .= " order by ";
	$sql4 .= " eminve.invecode , ";
	$sql4 .= " emloca.locacode , ";
	$sql4 .= " emgood.goodcode  ";
   
    $result4 = odbc_exec($cwmt,$sql4);
	
   if($result4){
		$gooditem4 = odbc_fetch_array($result4);
		$goodstock4 = $gooditem4['remaqty'];   
   }

   //ปิดการเชื่อมต่อ Winspeed
   odbc_close($cwmt); // ปิดการเชื่อมต่อ sql 
   	
	//ตรวสอบผลลัพธ์
   if($goodstock4){
	  $goodstock4 = $goodstock4;   
   }else{
	  $goodstock4 = "0.00"; 
   }
   
   
   //ส่งค่ากลับโปรแกรมหลัก
   return $goodstock4;
   
}

// --- แสดงวันที่แบบไทย --- //
function  displaydate($x){
	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	
	$date_array=explode("-",$x);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=$date_array[2];
	
	$m=$date_m[$m];
	
	$displaydate="$d $m $y";
	return $displaydate;
}

?>