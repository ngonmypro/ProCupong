<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test lopbipanel</title>

 	 <!--Default installation-->
    <link rel="stylesheet" href="lib/jquery-ui.min.css"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css"/>


    <!--Installation using bower. Preferred!!! -->
    <!--<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"/>-->
    <!--<link rel="stylesheet" href="bower_components/jquery-ui/themes/ui-lightness/jquery-ui.min.css"/>-->
    <!--Run `bower install font-awesome` and uncomment this line to see font awesome examples-->
    <!--<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css"/>-->

    <link rel="stylesheet" href="dist/css/lobipanel.min.css"/>
      
      
      
</head>

<body>
	
    <div id="pn1" class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>Panel title</h4>
        </div>
    </div>
    <div class="panel-body">
        Lorem ipsum...
    </div>
	</div>
 	<script>
		$('.panel').lobiPanel();
	</script>
    
    <!--Default installation-->
    <script src="lib/jquery.1.11.min.js"></script>
    <script src="lib/jquery-ui.min.js"></script>
    <script src="lib/jquery.ui.touch-punch.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!--Installation using bower. Preferred!!! -->
    <!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
    <!--<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>-->
    <!--<script src="bower_components/jquery-ui-touch-punch-improved/jquery.ui.touch-punch-improved.js"></script>-->
    <!--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->

    <script src="dist/js/lobipanel.js"></script>
</body>
</html>