<?php include "Connections/connect_mysql.php";
  $sql_groE = 'SELECT * FROM tblgroup WHERE gro_id = "'.$_POST['id'].'"';
  $objgroE = mysql_query($sql_groE);
    while ($rowE = mysql_fetch_array($objgroE)) {
  ?>
<div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Groupname <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="groupE" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rowE['gro_name'];?>">
  </div>
</div>
</div>
<?php } ?>
