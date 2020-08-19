<?
	session_start();
	
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	
	include "Connections/create_new_db.php";
	include "Connections/create_new_tb.php";
	include "Connections/insert_admim.php";
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!--<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">-->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Approve Credit System (ACS)</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    
    
    <!-- ajax && function javascript -->
    <script src="ajax/function.js"></script>
    <script src="ajax/ajax_framework.js"></script>
    
    <!-- Bootstrap -->
 	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
  	<!--<script src="dist/js/jquery.min.js"></script>-->
    <script src="media/js/jquery-1.12.4.js"></script>
  	<script src="dist/js/bootstrap.min.js"></script>
    
    <!-- Lobi Panel -->
  	<link rel="stylesheet" href="dist/css/lobipanel.min.css" />
  	<link rel="stylesheet" href="dist/css/jquery-ui.min.css" />
  	<script src="dist/js/lobipanel.min.js"></script>
  	<script src="dist/js/jquery-ui.min.js"></script>
    
     <!-- include bootstrap dialog -->
	<link href="dist/css/bootstrap-dialog.min.css" rel="stylesheet">
	<script src="dist/js/bootstrap-dialog.min.js"></script>
    
    <!-- WebPage StyleSheet ------------------------------------------------------------------------------->
    <!--<link href="../assets/css/paper-dashboard.css" rel="stylesheet"/>-->
    <!--<script src="../assets/js/paper-dashboard.js"></script>-->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/themify-icons.css" rel="stylesheet"> <!-- รูป icon เพิ่มเติม -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script> 
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- End WebPage StyleSheet ------------------------------------------------------------------------------->
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 	<link rel="stylesheet" href="/resources/demos/style.css">
 	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    
  
  <style>
  	.navbar-default .navbar-nav > li > a:hover,
	.navbar-default .navbar-nav > li > a:focus {
    	color: #8a0e0b;
		background-color:#FFDFBF;
	}
  	.navbar-default .navbar-nav > .active > a, 
	.navbar-default .navbar-nav > .active > a:hover, 
	.navbar-default .navbar-nav > .active > a:focus {
    	color: #8a0e0b;
    	background-color:#FFDFBF;
	}
	.bootstrap-dialog .modal-header.bootstrap-dialog-draggable {
         cursor: move; /* set cursor */
    }
	.card {
  		border-radius: 6px;
  		/*box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);*/
  		background-color: #FFFFFF;
  		color: #252422;
  		margin-bottom: 20px;
  		position: relative;
  		z-index: 1; 
	}
	.card .content {
    	padding: 15px 15px 10px 15px; 
	}
  </style>
  
	<script type="text/javascript">
    	$(document).ready(function(){
		$('#pncomment').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			expand: false,
			unpin: false,
    		editTitle: false,
			//minimize:false
			
		});
		$('#pnratting').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			expand: false,
			unpin: false,
    		editTitle: false,
			//minimize:false
			
		});
		$('#pnappdetail').lobiPanel({
			sortable: true,
			reload: false,
    		close: false,
			expand: false,
			unpin: false,
    		editTitle: false,
			//minimize:false
			
		});
		$('#pncomment').hide();
		$('#pnratting').hide();
		$('#pnappdetail').hide();
		
/*
        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome to <b>Approve Credit System</b> - a system that monitors the automatic approval of credit lines."

            },{
                type: 'success',
                timer: 4000
            });
			
	
			//$('#pn1').lobiPanel();
			
			$('#btnlogin').click( function () {
				BootstrapDialog.alert('I am Day Jakkrit!');
			});
*/			
    	});
		
	
	</script>
    


</head>
<body onLoad="javascript:loadData();">
<div class="wrapper">
    <div style="width:100%;">
    
        <nav class="navbar navbar-default"  style="background-color: #e3f2fd;" >
            <div class="container-fluid">
                <div class="navbar-header" onMouseOver="javascript:Chgtxt();" onMouseOut="javascript:Retrntxt();">	
                    <!--<button type="button" class="navbar-toggle">-->
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                    	<div id="logo1"> 
                        <font color="#FF6600"><i class="ti-check-box"></i></font> 
                        <font color="#0099FF">Approve Credit System (<font color="#FF6600">ACS</font>)</font>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                	
      			<!--	<ul class="nav navbar-nav">
        				<li class="active"><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        				<li><a href="#">About</a></li>
        				<li><a href="#">Projects</a></li>
        				<li><a href="#">Contact</a></li>
      				</ul>
      				<ul class="nav navbar-nav navbar-right">
        				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      				</ul> -->
                    
    			</div>
            </div>
        </nav>
		<div id="a1" style="padding-left:20px; padding-right:20px;">
       
     <!--   <div class="content">
            <div class="container-fluid">
                <div class="row">
                	<div class="col-md-offset-4 col-md-3">
                    	<div class="card">
                        	<div class="header">
                                <h4 class="title"><font color="#0099FF"><i class="ti-unlock"></i> Login</font></h4>
                            </div>
                            <div class="content">
                            	<div class="row">
                            		<div class="col-md-12">
                                    	<div class="form-group">
                                        	<label><font color="#757575"><i class="ti-user"></i> Username </font></label>
                                            <input type="text" class="form-control border-input" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                            		<div class="col-md-12">
                                    	<div class="form-group">
                                        	<label><font color="#757575"><i class="ti-key"></i> Password</font></label>
                                            <input type="password" class="form-control border-input" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                	<button type="submit" class="btn btn-info btn-fill btn-wd" id="btnlogin"><i class="glyphicon glyphicon-log-in"></i>&nbsp; Sign in </button>
                                </div>
                                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

	</div><!-- a1 -->
	<footer class="panel-footer" style="position:fixed; bottom:0px;right:0px; height:30px; width:100%; padding-bottom:30px;">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Create <font color="#FF3300"><i class="glyphicon glyphicon-heart-empty"></i></font>  by <a href="index.php">Yonghouse IT Team.</a> 
                </div>
            </div>
    </footer>

    </div>
</div>

<div class="row">
            	<div class="col-md-12">
                	<div id="pncomment" >
                    	<div id="pnhcomment" class="panel-heading"><i class="ti-comments"></i><font id="httcomment"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pncomment');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
                        <div class="panel-body">
                        	<div id="apncomment"></div>
                        </div>
                        <div class="panel-footer" style="text-align:right;">
                        	<div class="btn-group" role="group" aria-label="menufootercomment">
                            	<button type="button" id="Closefrmcomment" class="btn btn-secondary" onClick="HidePanel('#pncomment');"><i class='glyphicon glyphicon-share'></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
            
             <div class="row">
            	<div class="col-md-12">
                	<div id="pnratting" >
                    	<div id="pnhratting" class="panel-heading"><i class="ti-comments"></i><font id="httratting"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pnratting');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
                        <div class="panel-body">
                        	<div id="apnratting"></div>
                        </div>
                        <div class="panel-footer" style="text-align:right;">
                        	<div class="btn-group" role="group" aria-label="menufooterratting">
                            	<button type="button" id="Closefrmratting" class="btn btn-secondary" onClick="HidePanel('#pnratting');"><i class='glyphicon glyphicon-share'></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
            
             <div class="row">
            	<div class="col-md-12">
                	<div id="pnappdetail" >
                    	<div id="pnhappdetail" class="panel-heading"><i class="ti-comments"></i><font id="httappdetail"> ความคิดเห็น</font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pnappdetail');" style="float:right;" onMouseOver="changeCursor(this,'pointer');"></i></div>
                        <div class="panel-body">
                        	<div id="apnappdetail"></div>
                        </div>
                        <div class="panel-footer" style="text-align:right;">
                        	<div class="btn-group" role="group" aria-label="menufooterappdetail">
                            	<button type="button" id="Closefrmappdetail" class="btn btn-secondary" onClick="HidePanel('#pnappdetail');"><i class='glyphicon glyphicon-share'></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->


</body>
</html>
<?
	//ตรวจสอบการ Login
	
	if($_SESSION['emp_permission']=='admin'){	
		echo "<script> loadadminpage(); </script>";
	}else
	if($_SESSION['emp_permission']=='requester'){
		echo "<script> loadrequesterpage(); </script>";
	}else
	if($_SESSION['emp_permission']=='approver'){
		
		if($_SESSION['emp_approver']=='apv1'){
			echo "<script> loadapprovepage1(); </script>";
		}else if($_SESSION['emp_approver']=='apv2'){
			echo "<script> loadapprovepage2(); </script>";
		}else if($_SESSION['emp_approver']=='apv3'){
			echo "<script> loadapprovepage3(); </script>";
		}else if($_SESSION['emp_approver']=='apv4'){
			echo "<script> loadapprovepage4(); </script>";
		}
		
	}else
	if($_SESSION['emp_permission']=='visitor'){
		echo "<script> loadvisitorpage(); </script>";
	}else{
		echo "<script> loadLoginPage(); </script>";
	}
?>