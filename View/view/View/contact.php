<?php
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$toEmail = "magfirahash@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Received successfully! We will contact you soon.";
	    $type = "success";
	}
}
require_once "contact.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<title>Brac || University Management System</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" href="images/apple-touch-icon.png"/>
<link rel="apple-touch-icon" sizes="57x57" href="images/apple-touch-icon-57x57.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="images/xapple-touch-icon-72x72.png.pagespeed.ic.lf5d8kCpOf.png"/>
<link rel="apple-touch-icon" sizes="76x76" href="images/xapple-touch-icon-76x76.png.pagespeed.ic.ATZZpSeito.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="images/xapple-touch-icon-114x114.png.pagespeed.ic.Fi5O5s2tzL.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="images/xapple-touch-icon-120x120.png.pagespeed.ic.uPQH0sygdV.png"/>
<link rel="apple-touch-icon" sizes="144x144" href="images/xapple-touch-icon-144x144.png.pagespeed.ic.yZ9-_sm5OF.png"/>
<link rel="apple-touch-icon" sizes="152x152" href="images/xapple-touch-icon-152x152.png.pagespeed.ic.gThaVrKtXF.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="images/xapple-touch-icon-180x180.png.pagespeed.ic.Q8Pmsj5fQM.png"/>
<link rel="stylesheet" type="text/css" href="rs-plugin/css/A.settings.css.pagespeed.cf.xeOyGChsgq.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="A.fonts%2c%2c_font-awesome-4.3.0%2c%2c_css%2c%2c_font-awesome.min.css%2bcss%2c%2c_bootstrap.css%2bcss%2c%2c_animate.css%2cMcc.kSNwpaaMDX.css.pagespeed.cf.w2G3xGgFf0.css"/>
<link rel="stylesheet" type="text/css" href="css/A.menu.css.pagespeed.cf.0_hLwXzYkZ.css">
<link rel="stylesheet" type="text/css" href="css/A.carousel.css%2bbbpress.css%2cMcc.aXsJ7_Y__m.css.pagespeed.cf.ERce4VkS3l.css"/>
<link rel="stylesheet" type="text/css" href="A.style.css%2bcss%2c%2c_custom.css%2cMcc.HvWh1qoob-.css.pagespeed.cf.pWH5huNcWh.css"/>
</head>
<body>
<div id="loader">
<div class="loader-container">
<img src="images/site.gif" alt="" class="loader-site">
</div>
</div>
<div id="wrapper">
<div class="topbar">
<div class="container">
<div class="row">
<div class="col-md-6 text-left">
  <p><em class="fa fa-graduation-cap"></em> Assignment on University Management System</p>
</div>
<div class="col-md-6 text-right">
<ul class="list-inline">
<li>
<a class="social" href="https://www.facebook.com/BRACUniversity" target="_blank"><i class="fa fa-facebook"></i></a>
<a class="social" href="https://twitter.com/BRACUniversity" target="_blank"><i class="fa fa-twitter"></i></a>
<a class="social" href="#"><i class="fa fa-google-plus"></i></a>
<a class="social" href="https://www.linkedin.com/school/brac-university/" target="_blank"><i class="fa fa-linkedin"></i></a>
</li>
<li class="dropdown">
<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-lock"></i>Student's Login & Register</a>
<div class="dropdown-menu">
<div class="form-title">
</div>
<div class="clearfix"></div>
<a href="loginsystem/login.php"><button type="submit" class="btn btn-block btn-primary">Login</button></a>
<hr>
<h4><a href="loginsystem/signup.php">Create an Account</a></h4>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<header class="header">
<div class="container">
<div class="hovermenu ttmenu">
<div class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
<div class="logo">
<a class="navbar-brand" href="index.php"><img src="images/xlogo.png.pagespeed.ic.vap6Ukaf0i.png" alt=""></a>
</div>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">About<b class="fa fa-angle-down"></b></a>
		<ul class="dropdown-menu">
		<li>
		<div class="ttmenu-content">
		<div class="row">
		<div class="col-md-6">
		<div class="box">
		<ul>
		<li><a href="mission.php">Mission</a></li>
		<li><a href="leadership_&_management.php">Leadership and Management</a></li>
		<li><a href="affiliations.php">Affiliations</a></li>
		<li><a href="hr_and_administrative_policies.php">HR and Administrative Policies</a></li>
		<li><a href="Bracu_employment_policy.php">BracU Employment Policy</a></li>
		</ul>
		</div>
		</div>
		</div>
		</div>
		</li>
		</ul>
		</li>	

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Academic<b class="fa fa-angle-down"></b></a>
	<ul class="dropdown-menu">
	<li>
	<div class="ttmenu-content">
	<div class="row">
	<div class="col-md-6">
	<div class="box">
	<ul>
	<li><a href="Institutes_and_Schools.php">Institutes and Schools</a></li>
	<li><a href="Departments.php">Departments</a></li>
	<li><a href="Centres_and_Initiatives.php">Centres and Initiatives</a></li>
	<li><a href="Office_of_the_Registrar.php">Office of the Registrar</a></li>
	<li><a href="Fees_and_Payment.php">Fees and Payment</a></li>
	</ul>
	</div>
	</div>
	</div>
	</div>
	</li>
	</ul>
	</li>

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Admission<b class="fa fa-angle-down"></b></a>
		<ul class="dropdown-menu">
		<li>
		<div class="ttmenu-content">
		<div class="row">
		<div class="col-md-6">
		<div class="box">
		<ul>
		<li><a href="Undergraduate.php">Undergraduate Admission</a></li>
		<li><a href="Postgraduate.php">Postgraduate Admission</a></li>
		<li><a href="Scholarship_Financial_Aid.php">Scholarship / Financial Aid</a></li>
		<li><a href="International_Scholarship_Offers.php">International Scholarship Offers</a></li>
		<li><a href="Important_Dates_and_Deadlines.php">Important Dates and Deadlines</a></li>
		</ul>
		</div>
		</div>
		</div>
		</div>
		</li>
		</ul>
		</li>

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">International Applicants<b class="fa fa-angle-down"></b></a>
	<ul class="dropdown-menu">
	<li>
	<div class="ttmenu-content">
	<div class="row">
	<div class="col-md-6">
	<div class="box">
	<ul>
	<li><a href="Undergraduate_Admission.php">Undergraduate Admission</a></li>
	<li><a href="Postgraduate_Admission.php">Postgraduate Admission</a></li>
	<li><a href="fee_structure_international_students.php">Fee structure for international students</a></li>
	</ul>
	</div>
	</div>
	</div>
	</div>
	</li>
	</ul>
	</li>

<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle">News & Notices<b class="fa fa-angle-down"></b></a>
	<ul class="dropdown-menu">
	<li>
	<div class="ttmenu-content">
	<div class="row">
	<div class="col-md-6">
	<div class="box">
	<ul>
	<li><a href="Announcements.php">Announcements</a></li>
	<li><a href="News.php">News</a></li>
	<li><a href="BracU_in_Media.php">BracU in Media</a></li>
	</ul>
	</div>
	</div>
	</div>
	</div>
	</li>
	</ul>
	</li>
	
<li><a class="active" href="contact.php">Contact</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a class="btn btn-primary" href="applynow/register.php">Apply Now</a></li>
</ul>
</div>
</div>
</div>
</div>
</header>
<p></p>
	<section class="white section">
	<div class="container">
	<div class="row contact-wrapper">
	<div class="col-md-9 col-sm-9 col-xs-12 content-widget">
	<div class="widget-title">
<div id="statusMessage"> 
                        <?php
                        if (! empty($message)) {
                            ?>
                            <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                        <?php
                        }
                        ?>
                    </div>	
<h4>Contact Form</h4>
	<hr>
	
	<div class="form-container">
        <form name="frmContact" id="" frmContact"" method="post"
            action="contact.php" enctype="multipart/form-data"
            onsubmit="return validateContactForm()">

            <div class="input-row">
                <label style="padding-top: 20px;">Name</label> <span
                    id="userName-info" class="info"></span><br /> <input
                    type="text" class="form-control" name="userName"
                    id="userName" />
            </div>
            <div class="input-row">
                <label>Email</label> <span id="userEmail-info"
                    class="info"></span><br /> <input type="text"
                    class="form-control" name="userEmail" id="userEmail" />
            </div>
            <div class="input-row">
                <label>Subject</label> <span id="subject-info"
                    class="info"></span><br /> <input type="text"
                    class="form-control" name="subject" id="subject" />
            </div>
            <div class="input-row">
                <label>Message</label> <span id="userMessage-info"
                    class="info"></span><br />
                <textarea name="content" id="content"
				class="form-control" cols="60" rows="6"></textarea>
            </div>
            <div>
                <input type="submit" name="send" class="btn btn-primary btn-block"
                    value="Send" />
                
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
            return valid;
        }
</script>


	</div>	
	</div>
	</div>
	</section>
<p></p>
<footer class="dark footer section">
  <div class="container">
<div class="row">
<div class="col-md-3 col-md-6 col-xs-12">
<div class="widget">
<div class="widget-title">
<h4>About</h4>
<hr>
</div>
<ul><li>Mission</li>
<li>Leadership and Management</li>
<li>Affiliations</li>
<li>HR and Administrative Policies</li>
<li>BracU Employment Policy</li>
<li>Career at BracU</li>
<li>The Vice Chancellor</li>
<li>Former Vice Chancellors</li>
<li>Office Of The Proctor</li>
<li>Brac University New City Campus</li>
<li>Stakeholder Policy</li></ul>
</div>
</div>
<div class="col-md-3 col-md-6 col-xs-12">
<div class="widget">
<div class="widget-title">
<h4>Academics</h4>
<hr>
	</div>
<ul>
<li>Institutes and Schools</li>
<li>Departments</li>
<li>Centres and Initiatives</li>
<li>Office of the Registrar</li>
<li>Fees and Payment</li>
<li>Programs</li>
<li>Policies and Procedures</li>
<li>Residential Campus</li>
<li>Institutional Quality Assurance Cell (IQAC)</li>
<li>Teaching and Research</li>
<li>Draft Policy</li>

	</ul>

<div class="twitter-widget"> </div>
</div>
</div>
<div class="col-md-3 col-md-6 col-xs-12">
<div class="widget">
<div class="widget-title">
<h4>Popular Events &amp; News</h4>
<hr>
</div>
<ul class="popular-courses">
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_01.png.pagespeed.ic.2iuJZT3CaV.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_02.png.pagespeed.ic.c6RThoxSWC.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_03.png.pagespeed.ic.E_Ew4wn4ZP.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_04.png.pagespeed.ic.NGi9jRXTXk.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_05.png.pagespeed.ic.2iuJZT3CaV.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_06.png.pagespeed.ic.o2Uniwq-y5.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_07.png.pagespeed.ic.H-fRTeeP8u.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_08.png.pagespeed.ic.76ek5JLaEY.png" alt=""></a>
</li>
<li>
<a href="#" title=""><img class="img-thumbnail" src="upload/xservice_09.png.pagespeed.ic.FJcG938KC-.png" alt=""></a>
</li>
</ul>
</div>
</div>
<div class="col-md-3 col-md-6 col-xs-12">
<div class="widget">
<div class="widget-title">
<h4>Contact Details</h4>
<hr>
</div>
<ul class="contact-details">
<li><i class="fa fa-link"></i> <a href="https://www.bracu.ac.bd/" target="_blank">www.bracu.ac.bd</a></li>
<li><i class="fa fa-envelope"></i> <a href="mailto:info@bracu.ac.bd">info@bracu.ac.bd</a></li>
<li><i class="fa fa-phone"></i>+880-2-222264051-4</li>
<li><i class="fa fa-home"></i>66 Mohakhali, Dhaka 1212, Bangladesh</li>
</ul>
</div>
</div>
</div>
</div>
</footer>
<section class="copyright">
<div class="container">
<div class="row">
<div class="col-md-6 text-left">
<p><a target="_blank" href="https://www.bracu.ac.bd/">Copyright &copy; Brac University 2021</a></p>
</div>
<div class="col-md-6 text-right">
<ul class="list-inline">
<li><a href="loginsystem/admin/">Administrator Login</a></li>
</ul>
</div>
</div>
</div>
</section>
</div>
<script src="js/jquery.min.js.pagespeed.jm.iDyG3vc4gw.js"></script>
<script src="js/bootstrap.min.js%2bretina.js%2bwow.js.pagespeed.jc.pMrMbVAe_E.js"></script><script>eval(mod_pagespeed_gFRwwUbyVc);</script>
<script>eval(mod_pagespeed_rQwXk4AOUN);</script>
<script>eval(mod_pagespeed_U0OPgGhapl);</script>
<script src="js/carousel.js%2bparallax.min.js%2bcustom.js.pagespeed.jc.lVSvRd9-tY.js"></script><script>eval(mod_pagespeed_6Ja02QZq$f);</script>
<script>eval(mod_pagespeed_AZ_gON44eP);</script>
<script>eval(mod_pagespeed_KxQMf5X6rF);</script>
<script src="rs-plugin/js/jquery.themepunch.tools.min.js.pagespeed.jm.0PLSBOOLZa.js"></script>
<script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script>jQuery(document).ready(function(){jQuery('.tp-banner').show().revolution({dottedOverlay:"none",delay:16000,startwidth:1170,startheight:620,hideThumbs:200,thumbWidth:100,thumbHeight:50,thumbAmount:5,navigationType:"none",navigationArrows:"solo",navigationStyle:"preview3",touchenabled:"on",onHoverStop:"on",swipe_velocity:0.7,swipe_min_touches:1,swipe_max_touches:1,drag_block_vertical:false,parallax:"mouse",parallaxBgFreeze:"on",parallaxLevels:[10,7,4,3,2,5,4,3,2,1],parallaxDisableOnMobile:"off",keyboardNavigation:"off",navigationHAlign:"center",navigationVAlign:"bottom",navigationHOffset:0,navigationVOffset:20,soloArrowLeftHalign:"left",soloArrowLeftValign:"center",soloArrowLeftHOffset:20,soloArrowLeftVOffset:0,soloArrowRightHalign:"right",soloArrowRightValign:"center",soloArrowRightHOffset:20,soloArrowRightVOffset:0,shadow:0,fullWidth:"on",fullScreen:"off",spinner:"spinner4",stopLoop:"off",stopAfterLoops:-1,stopAtSlide:-1,shuffle:"off",autoHeight:"off",forceFullWidth:"off",hideThumbsOnMobile:"off",hideNavDelayOnMobile:1500,hideBulletsOnMobile:"off",hideArrowsOnMobile:"off",hideThumbsUnderResolution:0,hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,startWithSlide:0,fullScreenOffsetContainer:""});});</script>
</body>
</html>