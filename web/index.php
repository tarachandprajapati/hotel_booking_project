<!DOCTYPE HTML>
<html>
<head>
<title>Paradise-Hotels</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
		  <script>
				  $(function() {
				    $( "#datepicker,#datepicker1" ).datepicker();
				  });
		  </script>
<!---/End-date-piker---->
<link type="text/css" rel="stylesheet" href="css/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
		<script type="text/javascript" src="js/JFCore.js"></script>
		<script type="text/javascript" src="js/JFForms.js"></script>
		<!-- Set here the key for your domain in order to hide the watermark on the web server -->
		<script type="text/javascript">
			(function() {
				JC.init({
					domainKey: ''
				});
				})();
		</script>
<!--nav-->
<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
</script>
<style>
	/*body { padding: 2em; }*/


/* Shared */
.loginBtn {
  box-sizing: border-box;
  opacity:.88;
  position: relative;
  top:150px;
 /*position: relative;
    /*width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  /*top: 0px;
  left: 0;
  height: 100%;*/
  width: 34px;
  
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}
	</style>
</head>
<body>
<!-- start header -->
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="index.html"><img src="images/logo.png" alt=""></a>
		</div>
		<div class="h_right">
			<!--start menu -->
			<ul class="menu">
				<li class="active"><a href="index.html">hotel</a></li> |
				<li><a href="rooms.html">rooms & suits</a></li> |
				<li><a href="reservation.html">reservation</a></li> |
				<li><a href="activities.html">activities</a></li> |
				<li><a href="contact.html">contact</a></li>
				<div class="clear"></div>
			</ul>
			<!-- start profile_details -->
					<form class="style-1 drp_dwn">
						<div class="row">
							<div class="grid_3 columns">
								<select class="custom-select" id="select-1">
									<option selected="selected">EN</option>
									<option>USA</option>
									<option>AUS</option>
									<option>UK</option>
									<option>IND</option>
								</select>
							</div>		
						</div>		
					</form>
		</div>
		<div class="clear"></div>
		<div class="top-nav">
		<nav class="clearfix">
				<ul>
				<li class="active"><a href="index.html">hotel</a></li> 
				<li><a href="rooms.html">rooms & suits</a></li> 
				<li><a href="reservation.html">reservation</a></li> 
				<li><a href="activities.html">activities</a></li> 
				<li><a href="contact.html">contact</a></li>
				</ul>
				<a href="#" id="pull">Menu</a>
			</nav>
		</div>
	</div>
</div>
</div>
<div class="loginBtn">
		<button class="loginBtn loginBtn--facebook">
			Login with Facebook
		</button>

		<button class="loginBtn loginBtn--google">
			Login with Google
		</button>
		</div>
<!----start-images-slider---->
		<div class="images-slider">
			<!-- start slider -->
		    <div id="fwslider">
		        <div class="slider_container">
		            <div class="slide"> 
		                <!-- Slide image -->
		                    <img src="images/slider-bg.jpg" alt=""/>
		                <!-- /Slide image -->
		                <!-- Texts container -->
		                <div class="slide_content">
		                    <div class="slide_content_wrap">
		                        <!-- Text title -->
		                        <h4 class="title"><i class="bg"></i>Book your room with paradise <span class="hide"></span></h4>
		                        <h5 class="title1"><i class="bg"></i>Give yourself a paradise welcome <span class="hide" ></span></h5>
		                        <!-- /Text title -->
		                    </div>
		                </div>
		                 <!-- /Texts container -->
		            </div>
		            <!-- /Duplicate to create more slides -->
		            <div class="slide">
		                <img src="images/slider-bg.jpg" alt=""/>
		                <div class="slide_content">
		                     <div class="slide_content_wrap">
		                        <!-- Text title -->
		                        <h4 class="title"><i class="bg"></i>Paradise is always there with you <span class="hide"></span></h4>
		                        <h5 class="title1"><i class="bg"></i>Give yourself a special treat <span class="hide"></span> </h5>
		                        <!-- /Text title -->
		                    </div>
		                </div>
		            </div>
		            <!--/slide -->
		        </div>
		        <div class="timers"> </div>
		        <div class="slidePrev"><span> </span></div>
		        <div class="slideNext"><span> </span></div>
		    </div>
		    <!--/slider -->
		</div>

<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="online_reservation">
	<div class="b_room">
		<div class="booking_room">
			<h4>book a room online</h4>
			<p>Rooms are filling faster book now to catch a good price</p>
		</div>
		<div class="reservation">
			<ul>
				<li class="span1_of_1">
					<h5>type of room:</h5>
					<!-- Room Details -->
					<div class="section_room">
						<select id="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select City</option><?php/*
							$sql = "SELECT city FROM `hotel_list` LIMIT 0, 30 ";
				            while($sql){
				            echo <option value=".$row[].">".$row[]."</option>; 

				            }*/  ?>      
				           <!-- <option value="AX">Single room</option>
							<option value="AX">Double room</option>-->
		        		</select>
					</div>	
				</li>
				<li  class="span1_of_1 left">
					<h5>check-in-date:</h5>
					<div class="book_date">
						<form>
							<input class="date" id="datepicker" name="in_date"; type="text" value="DD/MM/YY" onfocus="this.value = '';" onblur=" if (this.value == '') {this.value = 'DD/MM/YY';}">
						</form>

					</div>					
				</li>
				<li  class="span1_of_1 left">
					<h5>check-out-date:</h5>
					<div class="book_date">
						<form>
							<input class="date" id="datepicker1" name="out_date"; type="text" value="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
						</form>
					</div>		
				</li>
				<li class="span1_of_2 left">
					<h5>Adults:</h5>
					<!--start section_room-->
					<div class="section_room">
						<select id="country" onchange="change_country(this.value)" name="capacity"; class="frm-field required">
							<option value="null">1</option>
				            <option value="null">2</option>         
				            <option value="AX">3</option>
							<option value="AX">4</option>
		        		</select>
					</div>					
				</li>
				<li class="span1_of_3">
					<div class="date_btn">
						<form>
							<input type="submit" value="book now" />
						</form>
					</div>
				</li>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
		</div>
	</div>
	<!--start grids_of_3 -->
	<div class="grids_of_3">
		<div class="grid1_of_3">
			<div class="grid1_of_3_img">
				<a href="details.html">
					<img src="images/pic2.jpg" alt="" />
					<span class="next"> </span>
				</a>
			</div>
			<h4><a href="#">single room<span>120$</span></a></h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>
		<div class="grid1_of_3">
			<div class="grid1_of_3_img">
				<a href="details.html">
					<img src="images/pic1.jpg" alt="" />
					<span class="next"> </span>
				</a>
			</div>
			<h4><a href="#">double room<span>180$</span></a></h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>
		<div class="grid1_of_3">
			<div class="grid1_of_3_img">
				<a href="details.html">
					<img src="images/pic3.jpg" alt="" />
					<span class="next"> </span>
				</a>
			</div>
			<h4><a href="#">suite room<span>210$</span></a></h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>
		<div class="clear"></div>
	</div>	
</div>
</div>		
<!--start main -->
<div class="footer_bg">
<div class="wrap">
<div class="footer">
			<div class="copy">
				<p class="link"><span>© All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
			</div>
			<div class="f_nav">
				<ul>
					<li><a href="index.html">home</a></li>
					<li><a href="rooms.html">rooms & suits</a></li>
					<li><a href="reservation.html">reservation</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="soc_icons">
				<ul>
					<li><a class="icon1" href="#"></a></li>
					<li><a class="icon2" href="#"></a></li>
					<li><a class="icon3" href="#"></a></li>
					<li><a class="icon4" href="#"></a></li>
					<li><a class="icon5" href="#"></a></li>
					<div class="clear"></div>
				</ul>	
			</div>
			<div class="clear"></div>
</div>
</div>
</div>		
</body>
</html>