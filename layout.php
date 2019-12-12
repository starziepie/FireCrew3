<!DOCTYPE HTML>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title><?php echo SITE_NAME; ?> Crew Center</title>
		<?php echo $page_htmlhead; ?>
		<!-- Bootstrap core CSS     -->
    	<link href="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/css/bootstrap.min.css" rel="stylesheet" />
    	<!-- Animation library for notifications   -->
    	<link href="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/css/animate.min.css" rel="stylesheet"/>
    	<!--  Paper Dashboard core CSS    -->
    	<link href="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/css/paper-dashboard.min.css" rel="stylesheet"/>
    	<!--  Fonts and icons     -->
    	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    	<link href="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/css/themify-icons.css" rel="stylesheet">
    	<link rel="shortcut icon" type="image/png" href="<?php echo SITE_URL?>/lib/images/favicon.png">
	</head>

	<body>

		<?php echo $page_htmlreq; ?>

		<div class="wrapper">
					<?php
					// var_dump($_SERVER['REQUEST_URI']);
					# Hide the header if the page is not the registration or login page
					# Bit hacky, don't like doing it this way
					if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/registration') {
					if(Auth::LoggedIn()) {
							Template::Show('app_top.php');
					}
					}
					?>
					<?php
					// var_dump($_SERVER['REQUEST_URI']);
					# Hide the header if the page is not the registration or login page
					# Bit hacky, don't like doing it this way
					if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/registration') {
					if(Auth::LoggedIn()) {
						Template::Show('header.php');
					}
					}
					?>

		<div class="main-panel">
			<div class="content">
            	<div class="container-fluid">
					<?php echo $page_content; ?>
				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="container-fluid">
				<?php
				# Hide the footer if the page is not the registration or login page
				# Bit hacky, don't like doing it this way
				if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/registration') {
				if(Auth::LoggedIn()) {
					Template::Show('app_bottom.php');
					}
				}
				?>
			</div>
		</footer>

		</div>

	</body>
	<!--   Core JS Files   -->
    <!-- <script src="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
	<script src="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo SITE_URL ?>/lib/skins/FireCrew3/assets/js/paper-dashboard.js"></script>

	<!-- Welcome Script -->
	<script type="text/javascript">
		if(cssID===1){
						$(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-rocket',
                message: "Welcome to the Dashboard of <b>FireCrew</b> - the best freeware CrewCenter on Earth."

            },{
                type: 'success',
                timer: 4000
            });

        });
					}
		var cssID=0;			
    </script>   

	<!-- Snowfall Script -->
	<!--
	<script>

// Set the number of snowflakes (more than 30 - 40 not recommended)
var snowmax=90
// Set the colors for the snow. Add as many colors as you like
var snowcolor=new Array("#aaaacc","#ddddff","#ccccdd","#f3f3f3","#f0ffff")
// Set the fonts, that create the snowflakes. Add as many fonts as you like
var snowtype=new Array("Times","Arial","Times","Verdana")
// Set the letter that creates your snowflake (recommended: * )
var snowletter="*"
// Set the speed of sinking (recommended values range from 0.3 to 2)
var sinkspeed=0.9
// Set the maximum-size of your snowflakes
var snowmaxsize=30
// Set the minimal-size of your snowflakes
var snowminsize=8
// Set the snowing-zone
// Set 1 for all-over-snowing, set 2 for left-side-snowing
// Set 3 for center-snowing, set 4 for right-side-snowing
var snowingzone=1
///////////////////////////////////////////////////////////////////////////
// CONFIGURATION ENDS HERE
///////////////////////////////////////////////////////////////////////////

// Do not edit below this line
var snow=new Array()
var marginbottom
var marginright
var timer
var i_snow=0
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
var ns6=document.getElementById&&!document.all
var opera=browserinfos.match(/Opera/)
var browserok=ie5||ns6||opera
function randommaker(range) {
		    rand=Math.floor(range*Math.random())
    return rand
}
function initsnow() {
		    if (ie5 || opera) {
						    marginbottom = document.body.scrollHeight
						    marginright = document.body.clientWidth-15
		    }
		    else if (ns6) {
						    marginbottom = document.body.scrollHeight
						    marginright = window.innerWidth-15
		    }
		    var snowsizerange=snowmaxsize-snowminsize
		    for (i=0;i<=snowmax;i++) {
						    crds[i] = 0;
				    lftrght[i] = Math.random()*15;
				    x_mv[i] = 0.03 + Math.random()/10;
						    snow[i]=document.getElementById("s"+i)
						    snow[i].style.fontFamily=snowtype[randommaker(snowtype.length)]
						    snow[i].size=randommaker(snowsizerange)+snowminsize
						    snow[i].style.fontSize=snow[i].size+'px';
						    snow[i].style.color=snowcolor[randommaker(snowcolor.length)]
						    snow[i].style.zIndex=1000
						    snow[i].sink=sinkspeed*snow[i].size/5
						    if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
						    if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
						    if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
						    if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
						    snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size)
						    snow[i].style.left=snow[i].posx+'px';
						    snow[i].style.top=snow[i].posy+'px';
		    }
		    movesnow()
}
function movesnow() {
		    for (i=0;i<=snowmax;i++) {
						    crds[i] += x_mv[i];
						    snow[i].posy+=snow[i].sink
						    snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+'px';
						    snow[i].style.top=snow[i].posy+'px';
						    if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])){
										    if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
										    if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
										    if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
										    if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
										    snow[i].posy=0
						    }
		    }
		    var timer=setTimeout("movesnow()",50)
}
for (i=0;i<=snowmax;i++) {
		    document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"'>"+snowletter+"</span>")
}
if (browserok) {
		    window.onload=initsnow
}

</script>-->
</html>
