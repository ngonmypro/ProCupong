<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lobi Panel Test2</title>

 	<link rel="stylesheet" href="lib/jquery-ui.min.css"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="dist/css/lobipanel.min.css"/>
    
    <script src="lib/jquery.1.11.min.js"></script>
    <script src="lib/jquery-ui.min.js"></script>
    <script src="lib/jquery.ui.touch-punch.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/lobipanel.js"></script>
    
    <script>
	
	$(document).ready(function() {
		
		$("#pnl1").lobiPanel({
				//reload: false,
    			//close: false,
    			//editTitle: false,
				reload: {
        			icon: 'fa fa-refresh'
    			},
    			editTitle: {
        			icon: 'fa fa-edit',
        			icon2: 'fa fa-save'
    			},
    			unpin: {
        			icon: 'fa fa-arrows'
    			},
    			minimize: {
        			icon: 'fa fa-chevron-up',
        			icon2: 'fa fa-chevron-down'
    			},
    			close: {
        			icon: 'fa fa-times-circle'
    			},
    			expand: {
        			icon: 'fa fa-expand',
        			icon2: 'fa fa-compress'
    			},
				
				//reload: false,
				editTitle: false,
				
				minWidth: 300,
    			minHeight: 300,
    			maxWidth: 600,
    			maxHeight: 480,
    			bodyHeight: 400,
				sortable: true,
				draggable: true,
				tooltips: true,
				//state: 'unpinned'  //pinned, unpinned, collapsed, minimized, fullscreen
				// change styles
				styles: [
				  {
					bg: '#d9534f',
					text: '#FFF'
				  },
				  {
					bg: '#f0ad4e',
					text: '#FFF'
				  },
				  {
					bg: '#337ab7',
					text: '#FFF'
				  },
				  {
					bg: '#5bc0de',
					text: '#FFF'
				  },
				  {
					bg: '#4753e4',
					text: '#FFF'
				  },
				  {
					bg: '#9e4aea',
					text: '#FFF'
				  }
				]
				
			});
			
			
	
		$('#pn1').lobiPanel({
			sortable: true,
			//reload: false,
    		//close: true,
			expand: false,
			unpin: false,
    		editTitle: false		
		});
		
		
		
		$('#pn1').hide();
		
		$('#pn1').on('beforeMaximize.lobiPanel', function(ev, lobiPanel){
    		window.console.log("Maximize", ev, lobiPanel);
			//alert('open maximize');
			
		});
		
		
		$('#obj2').attr({
			data:  "https://app.powerbi.com/view?r=eyJrIjoiZWYxZjY0MWItMDg3Yi00MzEyLWFiNGEtNDY2YTI4YWVmZWZmIiwidCI6IjU0N2ExOGQ1LTFmZjUtNDQ0MS05ZTU0LTQ5YjEwMmFhOTNkZCIsImMiOjEwfQ%3D%3D",
			//type: "application/pdf",
			width:"100%",
			height: "100%"
		});
		
			
	}); //end function
	
	
	// ฟังก์ชั่นสำหรับ ดึง lobipanal ที่ hide ไว้ แสดงขึ้นมาโดยส่ง พารามิเตอร์ ต่างๆ เข้ามา
		function showpdf(pno,objo){ //pno,insto,pnhtt,docname,attname,objo
			//alert("ok");
			var w = 900;
			var h = 750;
			var left = (screen.width/2)-(w/2);
  			var top = 20; //(screen.height/2)-(h/2);
			$(pno).show();
			//$(pnhtt).html(docname);
			var insto = $(pno).data('lobiPanel');
			insto.unpin();
			insto.setSize(w, h);
			insto.setPosition(left, top);
			
			
			$(objo).attr({
				data:  "https://app.powerbi.com/view?r=eyJrIjoiOGNiMWYwYzUtNGUyMS00ZmU2LThhM2ItMTQ3N2VkNzBkM2UzIiwidCI6IjU0N2ExOGQ1LTFmZjUtNDQ0MS05ZTU0LTQ5YjEwMmFhOTNkZCIsImMiOjEwfQ%3D%3D",
				//type: "application/pdf",
				width:"100%", //"350px",
				height: h-140	
			});
			
		}
		
		function closepdf(pno){
			$(pno).hide();	
		}
		
		
	
	</script>
</head>

<body>
<div id="pp2"></div>
<div class="row">
	<div class="col-lg-12">
    	<p><button id="bt1" value="open lobipanel" onClick="javascript:showpdf('#pn1','#obj1');">open lobipanel</button></p>
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
    
    	<div id="pnl1" class="panel panel-info">
        	<div class="panel-heading">
            	<div class="panel-title">
                	<h4>Panel 2</h4>
                </div>
            </div>
            <div class="panel-body">
            	<p id="pp1">Test Test</p>
        		<object id="obj2"></object>
        	</div>
        </div>
       
    </div>
    <div class="col-lg-6">
    	<div id="pnl2" class="panel panel-success">
        	<div class="panel-heading">
            	<div class="panel-title">
                	<h4>Panel-3</h4>
                </div>
            </div>
            <div class="panel-body">
        		Panel-3
        	</div>
        </div>
    </div>
    
</div>

<!---- Pn1 --------------------------------------------------------------------------------------------------->       
        	<div class="row">
            	<div class="col-md-12">
                    <div id="pn1" class="panel panel-primary">
                    	<div id="pnh1" class="panel-heading"> <i class="glyphicon-apple"></i> Panel4 </div>
                        <div class="panel-body">
                           <div id="apn1">
								<object id="obj1"></object>
                           </div><!--apn1-->
                        </div><!--pn1 body-->
                        <div class="panel-footer" style="text-align:right;">
                        	<button type="button" id="RefreshReq" class="btn btn-info" onClick="javascript:closepdf('#pn1');"><i class="ti-reload"></i> Close</button>
                        </div>
                    </div><!-- pn1 -->
                </div><!-- col -->
            </div><!-- row-->
<!---- Pn1 -------------------------------------------------------------------------------------------------------->
</body>
</html>