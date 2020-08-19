<?php include "Connections/connect_mysql.php";
  $sql_userE = 'SELECT * FROM tbluser WHERE use_id = "'.$_POST['id'].'"';
  $objuserE = mysql_query($sql_userE);
    while ($rowE = mysql_fetch_array($objuserE)) {
      $rowE['use_branid'];
      $rowE['use_groid'];
  ?>
<div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">รหัสพนักงาน <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="code_user_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['use_code_user'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Username <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="username_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['use_username'];?>" disabled>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">password <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="password" id="password_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['use_password'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">ชื่อ <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="name_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['use_name'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">นามสกุล <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="lastname_ed" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['use_lname'];?>">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">กลุ่มผู้ใช้งาน <span class="required">*</span></label>
  <div class="col-md-6 col-sm-6 col-xs-12">
                   <select class="form-control" id="group_ed">
                     <option value="0"> # กลุ่มผู้ใช้งาน # </option>
                     <?php
                     $sqlgro = 'SELECT * FROM tblgroup';
                     $resultgro = mysql_query($sqlgro) or die(mysql_error());
                     while ($rowgro = mysql_fetch_array($resultgro)) {?>
                       <option value="<?php echo $rowgro['gro_id']; ?>"
                         <?php if ($rowE['use_groid'] == $rowgro['gro_id']) {
                           echo 'selected="selected"';
                         } ?>
                         ><?php echo $rowgro['gro_name']; ?></option>
                     <?php } ?>
                   </select>
</div></div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">สาขา <span class="required">*</span></label>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <select class="form-control" id="bran_ed">
    <option value="0"> # เลือกสาขา # </option>
    <?php
    $sqlbran = 'SELECT * FROM tblbrand';
    $resultbran = mysql_query($sqlbran) or die(mysql_error());
    while ($rowbran = mysql_fetch_array($resultbran)) {?>
      <option value="<?php echo $rowbran['bran_id']; ?>"
        <?php if ($rowE['use_branid'] == $rowbran['bran_id']) {
          echo 'selected="selected"';
        } ?>
        ><?php echo $rowbran['bran_name'], " : ",$rowbran['bran_names']; ?></option>
    <?php } ?>
  </select>
</div></div>
</div>
<?php } ?>
