<?php include "Connections/connect_mysql.php"; ?>
<div data-parsley-validate class="form-horizontal form-label-left">
<!--<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสบาร์โค้ด <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="code_barcode" required="required" class="form-control col-md-7 col-xs-12">
  </div>
</div>-->
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">จำนวนเงิน <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
      <select class="form-control" id="price">
          <option value="0"> # เลือกจำนวนเงิน # </option>
          <?php $sqlcom = 'SELECT * FROM tblmoney';
                $resultcom = mysql_query($sqlcom) or die(mysql_error());
                while ($rowcom = mysql_fetch_array($resultcom)) { ?>
          <option value="<?php echo $rowcom['mon_id']; ?>" ><?php echo $rowcom['mon_name']; ?></option>
          <?php } ?>
        </select>
    </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">จำนวนใบ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="numbar" required="required" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">อักษร <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
      <select class="form-control" id="letter">
          <option value="0"> # เลือกโหมดอักษร # </option>
          <?php $sqlcom = 'SELECT * FROM tblletter';
                $resultcom = mysql_query($sqlcom) or die(mysql_error());
                while ($rowcom = mysql_fetch_array($resultcom)) { ?>
          <option value="<?php echo $rowcom['let_id']; ?>" ><?php echo $rowcom['let_name']; ?></option>
          <?php } ?>
        </select>
    </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">วันที่เริ่มใช้ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="date" id="date_start" required="required" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">วันที่หมดอายุ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="date" id="date_end" required="required" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">เงื่อนไขรับคูปอง <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="condition" required="required" class="form-control col-md-7 col-xs-12" maxlength="100">
  </div>
  <p style="color:red;">ใส่ได้ไม่เกิน 37 คอลัมน์</p>
</div>
</div>
