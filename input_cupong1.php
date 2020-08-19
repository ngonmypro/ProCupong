<?php session_start();

include "Connections/connect_mysql.php";
$sqluser = " SELECT *  FROM `tbluser` WHERE `use_id` = {$_SESSION['Uid']} ";
$resultuser = mysql_query($sqluser) or die(mysql_error());
mysql_query("set names utf8");
$memberuser = mysql_fetch_array($resultuser); // เก็บข้อมูลไว้ใน recordset
$usernameth = $memberuser['use_name'];
$userlnameth = $memberuser['use_lname'];
$usercode = iconv('tis-620','utf-8',$_SESSION['Ucode']);
 ?>
<script src="ajax/function.js"></script>

<div class="col-sm-12">
    <div>

      <div class="form-group col-sm-2">
        <select class="form-control" id="bran" disabled>
          <option value="0"> # เลือกสาขา # </option>
        <?php
        $sqlbran = 'SELECT * FROM tblbrand';
        $resultbran = mysql_query($sqlbran) or die(mysql_error());
        while ($rowbran = mysql_fetch_array($resultbran)) {?>
          <option value="<?php echo $rowbran['bran_id']; ?>"
            <?php if ($_SESSION['Ubran'] == $rowbran['bran_id']) {
              echo 'selected="selected"';
            } ?>
            ><?php echo $rowbran['bran_name'], " : ",$rowbran['bran_names']; ?></option>
        <?php } ?>
     </select>
    </div>
    <div class="form-group col-sm-1">
      <button class="form-control btn-danger" type="button"  onclick="javascript:clearbar();" id="clear" onKeyUp="clearbar(this.id);" style="Width:101px;">Clear</button>
    </div>
      <div class="form-group ">
        <div class="col-sm-2" >
        <input type="text" id="idcustomer" class="form-control" placeholder="รหัสลูกค้า" onKeyUp="checkiput(this.id);" style="Width:150px;" />
        </div>
        <!--<div class="col-sm-2">
        <input type="text" id="idorder" class="form-control" placeholder="รหัสใบสั่งซื้อ" onKeyUp="checkiput(this.id);" style="Width:150px;" />
      </div>-->
    </div>

      <div class="clearfix"></div>

      <div class="separator">
        <div class="form-group col-sm-2">
        <input type="text" id="barcode" class="form-control" placeholder="Barcode" onKeyUp="scanKey(this.id);" style="Width:320px;"/>
        </div>

        <!--<a class="btn btn-default submit" href="javascript:scan();">Save</a>
        <a class="reset_pass" href="#">Lost your password?</a>-->

      </div>
        <!--<p class="change_link">New to site?
          <a href="#signup" class="to_register"> Create Account </a>
        </p>-->

        <div class="clearfix"></div>

        <br />
          <div class="text-center" id="pp"></div>
          <br />
          <div class="text-center" id="show" style="color:red;"></div>
          <br />
      </div>
    </form>
  </div>
