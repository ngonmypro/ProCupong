<?
	session_start();

	if(isset($_SESSION["Uid"])){
		if ($_SESSION['Utype']==2) {
			header("location:cupong.php");
		}
	}else{
		header("location:login.php");
	}



	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

	include "Connections/create_new_db.php";
	include "Connections/create_new_tb.php";
	include "Connections/insert_admim.php";


	include "Connections/connect_mysql.php";
	$sqluser = " SELECT *  FROM `tbluser` WHERE `use_id` = {$_SESSION['Uid']} ";
	$resultuser = mysql_query($sqluser) or die(mysql_error());
	mysql_query("set names utf8");
	$memberuser = mysql_fetch_array($resultuser); // เก็บข้อมูลไว้ใน recordset
	$usernameth = $memberuser['use_name'];
	$userlnameth = $memberuser['use_lname'];
	$stapass = $memberuser['use_status_pass'];
	/*$usernameen = $memberuser['usernameen'];
	$userlnameen = $memberuser['userlnameen'];
	$userpicpath = $memberuser['userpicpath'];*/

	/*if(($userpicpath=='-') or ($userpicpath=='')){
		$userpicpath = 'user.png';
	}*/


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/LOGOYONGHOUSE.png" type="image/png" />
    <!--<link rel=“icon” type=“image/png” href=“http://example.com/image.png” />-->

    <title>Discount</title>

	<!-- jquery-ui css for lobipanel -->
    <link rel="stylesheet" type="text/css" href="vendors/lobipanel/lib/jquery-ui.min.css">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="../vendors/lobipanel/bootstrap/css/bootstrap.min.css">-->
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- lobipanel -->
    <link rel="stylesheet" type="text/css" href="vendors/lobipanel/dist/css/lobipanel.min.css">

    <!-- bootstrapdialog -->
    <link rel="stylesheet" type="text/css" href="vendors/bootstrapdialog/dist/css/bootstrap-dialog.min.css">

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="vendors/datatables/jquery.Datatable.css">
    <link rel="stylesheet" type="text/css" href="datatableexport/buttons.dataTables.min.css">

    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
		<!--<link href="vendors/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">-->

    <script src="ajax/function.js"></script>

  </head>
	<?php if ($stapass == 0) { ?>
	<body class="nav-md" onLoad="javascript:edit_use_user();">
	<?php }else { ?>
  <body class="nav-md" onLoad="">
		<?php }  ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-gift"></i> <span>Discount</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$usernameth?>  <?=$userlnameth?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General Menu</h3>
                <ul class="nav side-menu">
									<?php if ($_SESSION['Utype']==1) { ?>

                  <li><a data-toggle="tooltip" data-placement="bottom" title="ผู้ใช้งาน"><i class="fa fa-users"></i> Manage User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:;" onClick="javascript:add_user();">เพิ่มผู้ใช้งาน</a></li>
                      <li><a href="javascript:;" onClick="javascript:view_user();">จัดการผู้ใช้งาน</a></li>
                    </ul>
                  </li>
									<li><a data-toggle="tooltip" data-placement="bottom" title="กลุ่มผู้ใช้งาน"><i class="fa fa-users"></i> Manage GroupUser <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:;" onClick="javascript:add_group();">เพิ่มกลุ่มผู้ใช้งาน</a></li>
                      <li><a href="javascript:;" onClick="javascript:view_group();">จัดการกลุ่มผู้ใช้งาน</a></li>
                    </ul>
                  </li>
									<li><a data-toggle="tooltip" data-placement="bottom" title="สาขา"><i class="fa fa-sitemap"></i> Manage Branch <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:;" onClick="javascript:add_branch();">เพิ่มสาขา</a></li>
                      <li><a href="javascript:;" onClick="javascript:view_branch();">จัดการสาขา</a></li>
                    </ul>
                  </li>
									<li><a data-toggle="tooltip" data-placement="bottom" title="ใช้บาร์โค้ด" href="javascript:;" onClick="javascript:admincupong();" ><i class="fa fa-barcode"></i> Scan Barcode </a></li>
									<li><a data-toggle="tooltip" data-placement="bottom" title="ปริ้นคูปอง" href="javascript:;" onClick="javascript:print_bar();"><i class="fa fa-print"></i> Print Barcode </a></li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="บาร์โค้ด"><i class="fa fa-barcode"></i> Manage Barcode <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:;" onClick="javascript:add_barcode();">เพิ่มบาร์โค้ด</a></li>
                      <li><a href="javascript:;" onClick="javascript:view_barcode();">จัดการบาร์โค้ด</a></li>
											<li><a href="javascript:;" onClick="javascript:view_use_barcode();">ประวัติการใช้บาร์โค้ด</a></li>
                    </ul>
                  </li>
								<?php }elseif ($_SESSION['Utype']==4) { ?>
									<li><a data-toggle="tooltip" data-placement="bottom" title="ปริ้นคูปอง" href="javascript:;" onClick="javascript:print_bar();"><i class="fa fa-print"></i> Print Barcode </a></li>
								<?php }elseif ($_SESSION['Utype']==3) { ?>
									<li><a data-toggle="tooltip" data-placement="bottom" title="ปริ้นคูปอง" href="javascript:;" onClick="javascript:print_bar();"><i class="fa fa-print"></i> Print Barcode </a></li>
									<li><a data-toggle="tooltip" data-placement="bottom" title="บาร์โค้ด"><i class="fa fa-barcode"></i> Manage Barcode <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:;" onClick="javascript:add_barcode();">เพิ่มบาร์โค้ด</a></li>
                      <li><a href="javascript:;" onClick="javascript:view_barcode();">จัดการบาร์โค้ด</a></li>
											<li><a href="javascript:;" onClick="javascript:view_use_barcode();">ประวัติการใช้บาร์โค้ด</a></li>
                    </ul>
                  </li>
								<?php }else {
									# code...
								} ?>

								</ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="javascript:logoutuser();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?=$usernameth?>  <?=$userlnameth?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:edit_use_user();"> Profile</a></li>

                    <!--<li><a href="javascript:;">Help</a></li>-->
                    <li><a href="javascript:logoutuser();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
      <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="content"></div>

          </div>
          <!-- /top tiles -->
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright © <a id="footer"></a> All Rights Reserved - Create by <a href="">Yong Group IT Teams.</a>
          </div>
          <div class="clearfix"></div>
        </footer>
				<script>var d = new Date();document.getElementById("footer").innerHTML = d.getFullYear();</script>
        <!-- /footer content -->
      </div>
    </div>
	</div>


    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>



    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- lobipanel -->
    <!--<script src="../vendors/lobipanel/lib/jquery.1.11.min.js"></script>-->
    <script src="vendors/lobipanel/lib/jquery-ui.min.js"></script>
    <script src="vendors/lobipanel/lib/jquery.ui.touch-punch.min.js"></script>
    <!--<script src="../vendors/lobipanel/bootstrap/js/bootstrap.min.js"></script>-->
    <script src="vendors/lobipanel/dist/js/lobipanel.js"></script>
    <!-- bootstrapdialog -->
    <script src="vendors/bootstrapdialog/dist/js/bootstrap-dialog.min.js"></script>
    <!-- datatable -->
		<script src="vendors/datatables/jquery.Datatable.js"></script>
		<script src="datatableexport/dataTables.buttons.min.js"></script>
		<script src="datatableexport/buttons.flash.min.js"></script>
		<script src="datatableexport/jszip.min.js"></script>
		<script src="datatableexport/pdfmake.min.js"></script>
		<script src="datatableexport/vfs_fonts.js"></script>
		<script src="datatableexport/buttons.html5.min.js"></script>
		<script src="datatableexport/buttons.print.min.js"></script>
		<script src="datatableexport/dataTables.fixedHeader.min.js"></script>
		<script src="datatableexport/buttons.colVis.min.js"></script>

  </body>
</html>
<?
	//ตรวจสอบสิทธฺ ในการเปิดรายงาน
	mysql_close($c); //close connection
?>
