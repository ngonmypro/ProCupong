<?
	session_start();

	if(isset($_SESSION["Uid"])){

	}else{
		header("location:login.php");
	}

	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

	include "Connections/connect_mysql.php";
	$sqluser = " SELECT *  FROM `tbluser` WHERE `use_id` = {$_SESSION['Uid']} ";
	$resultuser = mysql_query($sqluser) or die(mysql_error());
	mysql_query("set names utf8");
	$memberuser = mysql_fetch_array($resultuser); // เก็บข้อมูลไว้ใน recordset
	$usernameth = $memberuser['use_name'];
	$userlnameth = $memberuser['use_lname'];
	$stapass = $memberuser['use_status_pass'];


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

    <script src="ajax/function.js"></script>

  </head>

	<?php if ($stapass == 0) { ?>
	<body class="nav-md" onLoad="javascript:edit_use_user();">
	<?php }else { ?>
  <body class="nav-md" onload="javascript:inputcupong();">
		<?php }  ?>

    <div class="container body col-md-12">
  <!--    <div class="main_container">-->

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Welcome : <?=$usernameth?>  <?=$userlnameth?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
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
          <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="contant"></div>
          </div>
          <!-- /top tiles -->
        <!-- /page content -->


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


  </body>
</html>
<?
	//ตรวจสอบสิทธฺ ในการเปิดรายงาน
	mysql_close($c); //close connection
?>
