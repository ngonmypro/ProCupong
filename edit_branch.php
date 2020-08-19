<?php session_start();
include "Connections/connect_mysql.php";
  $sql_userE = "SELECT * FROM tblbrand WHERE bran_id = {$_SESSION['Uid']}";
  $objuserE = mysql_query($sql_userE);
    while ($rowE = mysql_fetch_array($objuserE)) {
  ?>
<div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Branchname <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="branE" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['bran_name'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ชื่อย่อ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="bransE" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['bran_names'];?>">
  </div>
</div>
</div>
<?php } ?>
