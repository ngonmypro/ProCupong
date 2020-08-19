<?php session_start();
include "Connections/connect_mysql.php";
  $sql_userE = "SELECT * FROM tbluser WHERE use_id = {$_SESSION['Uid']}";
  $objuserE = mysql_query($sql_userE);
    while ($rowE = mysql_fetch_array($objuserE)) {
  ?>
<div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
<!--<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสพนักงาน <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="code_user_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php #echo $rowE['use_code_user'];?>" disabled>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Username <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="username_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php #echo $rowE['use_username'];?>" disabled>
  </div>
</div> -->
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">password <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="password" id="password_edt" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['use_password'];?>">
  </div>
</div>
<!--<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ชื่อ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="name_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php #echo $rowE['use_name'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">นามสกุล <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="lastname_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php #echo $rowE['use_lname'];?>">
  </div>
</div>-->
</div>
<?php } ?>
