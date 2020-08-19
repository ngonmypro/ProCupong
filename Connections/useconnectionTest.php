<?
	session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	
	include "Connections/create_new_db.php";
	include "Connections/create_new_tb.php";
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head><!-- Created by Artisteer v4.1.0.59688 -->

    <meta charset="utf-8">
    <title>Top 5 YongHouse Sales</title>
    
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = yes, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
    
    <!-- // เรียกใช้ Bootstrap stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet"  />
    
    <!-- // เรียกใช้ Bootstrap javascript -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    
    <!-- // เรียกใช้ javascript ajax -->
    <script src="ajax/ajax_framework.js"></script>
    <script src="ajax/function.js"></script>


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
    
	<meta name="description" content="Description">
	<meta name="keywords" content="Keywords">
    
    <!--  // กำหนด favicon // -->
    <link rel="shortcut icon" href="images/favicon.ico">
    
    
    <!-- css slideshow -->
    <style>
		* {box-sizing:border-box}
		body {font-family: Verdana,sans-serif;}
		.mySlides {display:none}
		
		/* Slideshow container */
		.slideshow-container {
		  max-width: 200px;/*1000px;*/
		  position: relative;
		  margin: auto;
		}
		
		/* Caption text */
		.text {
		  color: #f2f2f2;
		  font-size: 15px;
		  padding: 8px 12px;
		  position: absolute;
		  bottom: 8px;
		  width: 100%;
		  text-align: center;
		}
		
		/* Number text (1/3 etc) */
		.numbertext {
		  color: #f2f2f2;
		  font-size: 12px;
		  padding: 8px 12px;
		  position: absolute;
		  top: 0;
		}
		
		/* The dots/bullets/indicators */
		.dot {
		  height: 13px;
		  width: 13px;
		  margin: 0 2px;
		  background-color: #bbb;
		  border-radius: 50%;
		  display: inline-block;
		  transition: background-color 0.6s ease;
		}
		
		.active {
		  background-color: #717171;
		}
		
		/* Fading animation */
		.fade {
		  -webkit-animation-name: fade;
		  -webkit-animation-duration: 1.5s;
		  animation-name: fade;
		  animation-duration: 1.5s;
		}
		
		@-webkit-keyframes fade {
		  from {opacity: .4}
		  to {opacity: 1}
		}
		
		@keyframes fade {
		  from {opacity: .4}
		  to {opacity: 1}
		}
		
		/* On smaller screens, decrease text size */
		@media only screen and (max-width: 300px) {
		  .text {font-size: 11px}
		}
		
</style>


	<!-- //  Time Script  // -->
	<script>
	
	function getTextmq(){
		var textmq = $("#textmq").val();
		$("#tmq").html(textmq);	
	}
	
	function hiderow3(){	
		$("#rown3").hide(1000);
		$("#th2").css({
			width: '300px'
		});
		$("#th3").css({
			width: '300px'
		});
	}
	
	function showrow3(){
		$("#rown3").show(1000);	
	}
	
	
	
	var myVar = setInterval(myTimer, 1000);

	function myTimer() {
    	var d = new Date();
    	//document.getElementById("timenow").innerHTML = d.toLocaleTimeString();
		$("#timenow").html(d.toLocaleTimeString());	 
	}
	
	var ft1 = 15*6000;
	var ft2 = 20*6000;
	var ft3 = 21*6000;
	//เรียกใช้ฟังก์ชั่น 
	
	setInterval("getSaleAll()", ft1);
	setInterval("orderTop5()", ft2);
	setInterval("showDetail()", ft3);
	
	
	
	
	</script>
    
</head>

<body background="BG.jpg">

<div id="art-main" style=" text-align:center;">	
<marquee>
<br>
<div>
 <p style="font-family:BrowalliaUPC, AngsanaUPC; color:#F00; padding-top:10px;"> 
    <b style="font-size:50px;" id="tmq"></b>
 </p> 
</div>
</marquee>
	<div class="art-sheet clearfix">
    	<div class="art-layout-wrapper clearfix">
        	<div class="art-content-layout">
            	<div class="art-content-layout-row">
                	<div class="art-layout-cell art-content clearfix">
                    <article class="art-post art-article">                              
                		<div class="art-postcontent art-postcontent-0 clearfix">
                        <div class="art-content-layout">
    						<div class="art-content-layout-row">
    							<div class="art-layout-cell" style="width: 100%" >
        							<div style="width:100%; float:left">
                                    	<table class="table">
                                          <tbody>
                                            <tr>
                                              <th scope="row"  style="text-align:center; vertical-align:middle; height:250px;">
                                              	<!--
                                                <div style="float:left; width:40%;">
													<!-- //// slideshow 
                                                    <h2 style="color:#F00; font-size:60px; font-family:BrowalliaUPC, AngsanaUPC;">
                                                    <b>แจก TV LED 29" ทุกวัน</b></h2>
                                                    <!--<p>สำหรับลูกค้ายอดซ์้อ สูงสุด</p>
                                                    
                                                    <div class="slideshow-container">
                                                    
                                                    <div class="mySlides fade">
                                                      <div class="numbertext">1 / 3</div>
                                                      <img src="images/tv1.jpg" style="width:100%">
                                                      <div class="text">TV LED 29"</div>
                                                    </div>
                                                    
                                                    <div class="mySlides fade">
                                                      <div class="numbertext">2 / 3</div>
                                                      <img src="images/tv3.jpg" style="width:100%">
                                                      <div class="text">TV LED 29"</div>
                                                    </div>
                                                    
                                                    <div class="mySlides fade">
                                                      <div class="numbertext">3 / 3</div>
                                                      <img src="images/tv4.jpg" style="width:100%">
                                                      <div class="text">TV LED 29"</div>
                                                    </div>
                                                    
                                                   
                                                    
                                                    </div>
                                                                                                        
                                                    <div style="text-align:center">
                                                      <span class="dot"></span>
                                                      <span class="dot"></span>
                                                      <span class="dot"></span>
                                                    </div> 
                                                    
                                                    <script>
                                                    var slideIndex = 0;
                                                    showSlides();
                                                    
                                                    function showSlides() {
                                                        var i;
                                                        var slides = document.getElementsByClassName("mySlides");
                                                        var dots = document.getElementsByClassName("dot");
                                                        for (i = 0; i < slides.length; i++) {
                                                           slides[i].style.display = "none";
                                                        }
                                                        slideIndex++;
                                                        if (slideIndex> slides.length) {slideIndex = 1}
                                                        for (i = 0; i < dots.length; i++) {
                                                            dots[i].className = dots[i].className.replace(" active", "");
                                                        }
                                                        slides[slideIndex-1].style.display = "block";
                                                        dots[slideIndex-1].className += " active";
                                                        setTimeout(showSlides, 2000); // Change image every 2 seconds
                                                    }
                                                    </script>
                                                    

                                                    <!-- //// slideshow 
												</div> -->
                                                
                                                <div id="a1" style=" text-align:center; vertical-align:middle;">Customer name1</div>
                                              </th>
                                            </tr>
                                           </tbody>
                                         </table>                                 
                                    </div>
                                    <div style="float:left; width:100%; height:150px;" id="rown2">
                                    	
                                    	<table class="table" style="width:100%;">
                                          <tbody>
                                            <tr>
                                              <th scope="row" id="th2" style="text-align:center; vertical-align:middle;width:50%;">
                                              	<div id="a2">Customer name2</div>
                                              </th>
                                              <th scope="row" id="th3"  style="text-align:center; 
                                              	vertical-align:middle;width:50%;">
                                              	<div id="a3">Customer name3</div>
                                              </th>
                                            </tr>
                                           </tbody>
                                        </table>
                                        
                                    	<!--    
                                            <tr>
                                              <th scope="row"  style="text-align:center; 
                                              vertical-align:middle; height:150px;">
                                              	<div id="a4">Customer name4</div>
                                              </th>
                                            </tr>
                                           </tbody>
                                           
                                         </table>  
                                         -->              
                                    </div>
                                    <div style="float:right; width:100%; height:150px;" id="rown3">
                                    	
                                    	
                                    	<table class="table">
                                          <tbody>
                                            <tr>
                                              <th scope="row" id="th4" style="text-align:center; 
                                              	vertical-align:middle;width:50%;">
                                              	<div id="a4">Customer name4</div>
                                              </th>
                                              <th scope="row" id="th5" style="text-align:center; 
                                              	vertical-align:middle;width:50%;">
                                              	<div id="a5">Customer name5</div>
                                              </th>
                                            </tr>
                                          </tbody>
                                        </table>
                                        
                                        <!-- 
                                            <tr>
                                              <th scope="row" style="text-align:center; 
                                              	vertical-align:middle; height:150px;">
                                              	<div id="a5">Customer name5</div>
                                              </th>
                                            </tr>
                                           </tbody>
                                           
                                         </table>   
                                         -->             
                                    </div>
                                    <!-- <h3>Spend Time With Your Family</h3> -->
                                    
                                    <!--
        							<p><img width="305" height="3" alt="" src="images/line.jpg" style=" margin:0;"></p>
        							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pharetra, tellus sit amet congue vulputate, nisi erat iaculis nibh, vitae feugiat sapien ante eget mauris. Cras elit nisl, rhoncus nec iaculis ultricies, feugiat eget sapien.</p>
        							<p>Pellentesque ac felis tellus.&nbsp;Aenean sollicitudin imperdiet arcu, vitae dignissim est posuere id. Donec vel neque in neque porta venenatis sed sit amet lectus.&nbsp;</p>
        							<p><a href="#">Learn more</a>...</p>
                                    -->
                                    
    							</div>
    						</div>
						</div>
						<div class="art-content-layout">
    						<div class="art-content-layout-row">
    							<div class="art-layout-cell" style="width: 33%" >
                                
                                <!--
        							<p style="text-align: center;"><img width="189" height="126" alt="" src="images/contentimage4.jpg" style="float: left;" class=""></p>
                                 -->
                                 
    							</div>
    							<div class="art-layout-cell" style="width: 34%" >
                                
                                <!--
        							<p style="text-align: center;"><img width="189" height="126" alt="" src="images/contentimage3.jpg" style="float: left;"></p>
                                 -->
                                 
    							</div>
    							<div class="art-layout-cell" style="width: 33%" >
                                
                                <!--
        							<p style="text-align: center;"><img width="189" height="126" alt="" src="images/contentimage2.jpg" style="float: left;"></p>
                                 -->
                                 
    							</div>
    						</div>
						</div>
                        <div class="art-content-layout">
    						<div class="art-content-layout-row">
    							<div class="art-layout-cell" style="width: 100%" >
                                	
        							<!--
        							<h3>Nine Secrets of Successful Marriage</h3>
        							<p><img width="305" height="3" alt="" src="images/line.jpg" style=" margin:0;" class=""></p>
        							<p><img width="300" height="285" alt="" src="images/contentimage5.jpg" style="float: left; margin-right: 10px" class=""></p>
        							<p>Suspendisse pharetra auctor pharetra. Nunc a sollicitudin est. Curabitur ullamcorper gravida felis, sit amet scelerisque lorem iaculis sed. Donec vel neque in neque porta venenatis sed sit amet lectus.&nbsp;</p>
        							<p><span style="color: rgb(56, 120, 240);"><span style="font-style: italic;"><span style="font-size: 18px;">1.</span></span></span> Fusce ornare elit nisl, feugiat bibendum lorem. Vivamus pretium dictum sem vel laoreet. In fringilla pharetra purus, semper vulputate ligula cursus in. Donec at nunc nec dui laoreet porta eu eu ipsum.&nbsp;</p>
        							<p><span style="font-style: italic;"><span style="font-size: 16px;"><span style="color: rgb(56, 120, 240);">2.</span></span></span> Sed eget lacus sit amet risus elementum dictum.</p>
        							<p><a href="#">Learn more</a>..</p>
                                    -->
                                    
    							</div>
    						</div>
						</div>
                        
					</div>
				</article>
			</div>
        </div>
     </div>
  </div>
  
  <footer class="art-footer clearfix">
	<div style="position:relative;display:inline-block;padding-left:42px;padding-right:42px">
    	<p><img src="images/logoyh4.jpg" width="29" height="29" style="vertical-align:middle;" onClick="togglemf1();">
        YongHouse Copyright © <?=date('Y')?>. All Rights Reserved. <font id="datenow"><?=displaydate(date("Y-m-d"))?></font>&nbsp;&nbsp;<b id="timenow"><?=date("H:i:s")?></b>
        </p>
        <div id="mf1" class="form-inline" style="display:none;">
        
        	begin date(2017-08-01):
        	<input type="text" style="width:110px;" id="dts1" value="">
            end date:
            <input type="text" style="width:110px;" id="dts2" value="">
            time1:
            <input type="text" style="width:50px;" id="tts1" value="">
            time2:
            <input type="text" style="width:50px;" id="tts2" value="">
            minimum sale:
            <input type="text" style="width:80px;" id="mts1" value="">
            
                  
            <button class="btn" id="btns1" onClick="getSaleAll();">ดึงรายการขาย</button>
            <button class="btn" id="btns2" onClick="orderTop5();">จัดลำดับ</button>
            <button class="btn" id="btns3" onClick="showDetail();">แสดงผล</button>
            
            
            <div id="errortxt"></div>
            <br>
            text marquee :
            <input type="text" style="width:200px;" id="textmq" value=" input youre text here!"> 
            <button class="btn" id="btns4" onClick="getTextmq();">เปลี่ยนข้อความ</button>
            <br>
            <button class="btn-info" id="hider3" onClick="hiderow3();">hide</button>
            <button class="btn-info" id="showr3" onClick="showrow3();">show</button>
            
        </div>
        
    	<!--
    	<a title="RSS" class="art-rss-tag-icon" style="position: absolute; bottom: -10px; left: -6px; line-height: 32px;" href="#"></a>
		<p>Copyright © 2011. All Rights Reserved.</p>
        -->
        
	</div>
  </footer>

    </div>
    	<p class="art-page-footer">
        	
        	<!--
        	<span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a> created with Artisteer.</span>
    		-->
            
        </p>
	</div>


</body>
</html>
<? 
// --- แสดงวันที่แบบไทย --- //

function  displaydate($x){
	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	
	$date_array=explode("-",$x);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=$date_array[2];
	
	$m=$date_m[$m];
	
	$displaydate="$d $m $y";
	return $displaydate;
}

?>