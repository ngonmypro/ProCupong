<?php include "Connections/connect_mysql.php"; ?>
  <div class="form-group" id="print">
    <div class="form-group">
      <label class="control-label col-sm-1" for="useru">จำนวนเงิน <span class="required">*</span></label>
    <div class="form-group col-sm-2">
      <select class="form-control" id="priceP" onchange="javascript:change_mon();">
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
        <label class="control-label col-sm-2" for="useru">จำนวนคูปองที่ยังไม่ได้ปริ้น <span class="required">*</span></label>
      <div class="form-group col-sm-2" id="denum">
        <input type="text" id="numbarP" required="required" class="form-control col-md-7 col-xs-12" name="numP" value="">
      </div>
      <div class="form-group col-sm-2">
        <button class="form-control btn-info" type="button"  onclick="javascript:go_print();" id="go">ตกลง</button>
      </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="separator"></div>
<div class="clearfix"></div>
<div class="" id="show_barprint"></div>

<script type="text/javascript">
  //$("#show_barprint").load("printarraylabel3.php");
</script>
