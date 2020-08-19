<?php include "Connections/connect_mysql.php";
  $sql_barE = 'SELECT * FROM tblcupong WHERE cup_id = "'.$_POST['id'].'"';
  $objbarE = mysql_query($sql_barE);
    while ($rowE = mysql_fetch_array($objbarE)) {
  ?>
<div data-parsley-validate class="form-horizontal form-label-left">
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสบาร์โค้ด <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="code_bar_ed" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $rowE['cup_code'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">จำนวนเงิน <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="price_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['cup_price'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">วันที่เริ่มใช้ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="date" id="dates_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['cup_day_start'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">วันที่หมดอายุ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="date" id="datee_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['cup_day_end'];?>">
  </div>
</div>
</div>
<?php } ?>
