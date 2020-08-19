<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	  <!--Include this css file in the <head> tag -->
    <link rel="stylesheet" href="lib/jquery-ui.min.css"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="dist/css/lobipanel.min.css"/>
    
    <script src="lib/jquery.1.11.min.js"></script>
    <script src="lib/jquery-ui.min.js"></script>
    <script src="lib/jquery.ui.touch-punch.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/lobipanel.js"></script>
      
</head>

<body>
<div class="panel panel-default">
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
   $(function(){
        $('.panel').lobiPanel({ /* กำหนดให้ class panel ทั้งหมดเป็น lobipanel */
            //Options go here
            
			//Minimum width <b>unpin, resizable</b> panel can have.
			minWidth: 200,

			//Minimum height <b>unpin, resizable</b> panel can have.
			minHeight: 100,

			//Maximum width <b>unpin, resizable</b> panel can have.
			maxWidth: 1200,

			//Maximum height <b>unpin, resizable</b> panel can have.
			maxHeight: 700,
			
			state: 'pinned'  //pinned, unpinned, collapsed, minimized, fullscreen
        });
    });
</script>


</body>
</html>