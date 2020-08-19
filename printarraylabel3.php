<?php include "Connections/connect_mysql.php"; ?>
<?php $i = $_GET['priceP'];
if ($_GET['numbarP'] != 0) {
  $b = $_GET['numbarP'];
}else {
  echo "ไม่มีข้อมูลที่ต้องปริ้น";
}

 ?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="images/LOGOYONGHOUSE.png" type="image/png" />
    <meta charset="utf-8">
    <title>Print Barcode</title>
    <link href="labels.css" rel="stylesheet" type="text/css" >
    <!--<script type="text/javascript" src="jquery/sample/jquery-1.3.2.min.js"></script>-->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-barcode.js"></script>
<style>


    body {
        width: 21.7cm; /*8.5in;*/
        /*margin: 0;/*0in .1875in;*/
		/*text-align:center;
		margin-left: 2cm;*/
		color:#000000;
		/*background: rgb(204,204,204);*/
    }
	page[size="A4"] { /* กำหนด style กระดาษบนหน้า webpage */
	  background: white;
	  width: 21.4cm;
	  height: 29.7cm;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	  padding-left:0.5cm;
	}

  page[size="A3"] {
	  background: white;
	  width: 29.7cm;
	  height: 42cm;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	  padding-left:0.5cm;
	}

	page[size="A2"] {
	  background: white;
	  width: 21cm;
	  height: 16cm;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	  padding-left:0.5cm;
	}

    .label{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 8.5cm; /*  2.025in;  plus .6 inches from padding */
        height: 5.8cm; /* .875in; plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */

		background-image:url(<?php if ($i == 1) { ?> cupong/50.jpg
      <?php }elseif ($i == 2) { ?> cupong/100.jpg
        <?php }elseif ($i == 3) { ?> cupong/200.jpg
          <?php }elseif ($i == 4) { ?> cupong/300.jpg
            <?php }elseif ($i == 5) { ?> cupong/500.jpg
              <?php }elseif ($i == 6) { ?> cupong/1000.jpg
                <?php }elseif ($i == 7) { ?> cupong/2000.jpg
                  <?php }elseif ($i == 8) { ?> cupong/3000.jpg
                    <?php }elseif ($i == 9) { ?> cupong/5000.jpg
      <?php }else {
        # code...
      } ?>);
		background-repeat:no-repeat;
		background-size: 10cm 6cm;
		/*width: 100%;
		height:5.8cm;*/

        float: left;

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }

	.page-break { /* ขึ้นหน้าใหม่ แบบหน้า ถัดไป */
		display:block;
		height:5px;
		page-break-before:always;
	 }
     .page-break-no{ /* ขึ้นหน้าใหม่ แบบหน้า หน้าแรก */
	 	display:block;
		height:5px;
		page-break-after:avoid;
	 }

#consition{
  font-size: 14px;
}
   .condition_print {
      position: absolute;
      margin-left: 7.7mm;
     	margin-top: 33.7mm;
 	}

  #day {
    font-size: 12px;
  }

   .day_print {
      position: absolute;
      margin-left: -5.5mm;
     	margin-top: 4.35mm;
 	}

	.bar_print {
      position: absolute;
      margin-left: 49.5mm;
    	margin-top: 41.5mm;
	}


	@media all
	{
    	.page-break { display:none; }
    	.page-break-no{ display:none; }
	}
  /* สร้างปุ่มพิมพ์ */
.btn_print {
	text-align:center;
	width:2cm;
	height:1cm;
}
	@media print{
	  input{
		  display:none;
	  }
	  @page { /* จัดการเกี่ยวกับหน้ากระดาษ */
			  /*margin: 0;*/
			  size: 21.4cm 29.7cm; /*A4*/
        /*size: 29.7cm 42cm; /*A3*/
			  /*size: portrait;
			  size: landscape;
			  */
			  margin-bottom: 2mm;
			  margin-top: 2mm;
			  margin-left: 10mm;
			  margin-right: 0.5mm;
			  text-align:center;
			  background: white;
	  }
	  .page-break { /* ขึ้นหน้าใหม่ แบบหน้า ถัดไป */
		display:block;
		height:1px;
		page-break-before:always;
	  }
      .page-break-no{ /* ขึ้นหน้าใหม่ แบบหน้า หน้าแรก */
	 	display:block;
		height:1px;
		page-break-after:avoid;
	  }
	}

  * {
      color:#7F7F7F;
      font-family:Arial,sans-serif;
      font-size:15px;
      background-color: none;
  }
</style>



<script type="text/javascript">
  function genbar(){
    <?php $sql = 'SELECT *  FROM tblcupong WHERE cup_price = "'.$i.'" and cup_status_print = 1';
    $result = mysql_query($sql) or die(mysql_error());
    $j = 1;
    while ($row = mysql_fetch_array($result)) {
      $datestart = displaydatestart($row['cup_day_start']);
      //$datestart = substr($dates, 8, 2);
      $dateend = displaydateend($row['cup_day_end']);
      $consition = $row['cup_condition'];
      if ($j <= $b) {
      $bar = $row['cup_code'];
      ?>
       var bargen = '<?=$bar?>';
        generateBarcode(bargen,<?=$j?>);
        <?$j = $j +  1; } }?>
  }

  function generateBarcode(barcn1,n1){
    var btype = "code128";
        $("#barcodeTarget" + n1 +"").barcode(barcn1, btype, {barWidth:1, barHeight:40});
      }
    generateBarcode();

    function print_bar() {
      <?php $sql = 'SELECT *  FROM tblcupong WHERE cup_price = "'.$i.'" and cup_status_print = 1';
      $result = mysql_query($sql) or die(mysql_error());
      $j = 1;
      while ($row = mysql_fetch_array($result)) {
        if ($j <= $b) {
        $bar = $row['cup_code']; ?>
         var bargen = '<?=$bar?>';
          upprint(bargen);
          <?$j = $j +  1; } }?>
        }

    function upprint(bar) {
      var up = "0";
      var data = "up=" + up + "&bar=" + bar;
      $.ajax({
    		type: "POST",
    		url: "upprint_pro.php",
    		cache: false,
    		data: data,
    		success: function(msg){
          //
        }
      });
    }

    function back() {
        window.location.href = "index.php";
    }

</script>

</head>
<body onload="jQuery:genbar();">
<div style="text-align:left;">
  <input class="btn_print" type="button" name="button" id="button" value="Print" onclick="print_bar();print();">
  <input class="btn_print" type="button" name="button" id="button" value="ย้อนกลับ" onclick="back();">
</div>
<?
	$numall = $b;  //จำนวนการปริ้นรูป
	$p_size=10; //กำหนดจำนวน Record ที่จะแสดงผลต่อ 1 เพจ
	$total_page=ceil($numall/$p_size);
?>
<?
	if($numall >= 10){
		$start = 1;
		$end = 10;
	}else{
		$start = 1;
		$end = $numall;
	}
?>
<? for($p=1;$p<=$total_page;$p++) { ?>
<div class="page-break<?=($p==1)?"-no":""?>">&nbsp;</div>
<!--<page size="A4">-->
<?php for($i=$start;$i<=$end;$i++){ ?>
<div class="label">
<div class="condition_print"><b><i style="color:#000000;" id="consition"><?=$consition?></i></b></div>
<div class="day_print"><b><i style="color:#000000;" id="day"><?=$datestart?> - <?=$dateend?></i></b></div>
<div class="bar_print" >
<div  id="barcodeTarget<?=$i?>" ></div>
</div>
    </div>

<?php } ?>
<?

	$numall =  $numall - 10;
	if($numall >= 10){
		$start = $start + 10;
		$end = $end + 10;
	}else{
		$start = $end + 1;
		$end = $end + $numall;
	}
?>

<? } ?>



</body>
</html>

<?php function  displaydatestart($x){
	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

	$date_array=explode("-",$x);
	$y=substr($date_array[0]+543,  2, 2);
	$m=$date_array[1]-1;
	$d=substr($date_array[2], 0, 2);

	$m=$date_m[$m];

	$displaydate="$d $m";
	return $displaydate;
}

function  displaydateend($x){
	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

	$date_array=explode("-",$x);
	$y=substr($date_array[0]+543,  2, 2);
	$m=$date_array[1]-1;
	$d=substr($date_array[2], 0, 2);

	$m=$date_m[$m];

	$displaydate="$d $m $y";
	return $displaydate;
} ?>
