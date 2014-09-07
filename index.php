<?php

if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
  preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
  if (count($lang_parse[1])){
    $langs = array_combine($lang_parse[1], $lang_parse[4]);
    foreach ($langs as $lang => $val){
      if ($val === '') $langs[$lang] = 1;
    }
    //arsort($langs, SORT_NUMERIC);
  }
  $language = 'en';
  foreach ($langs as $lang => $val){
    if (strpos($lang,'fr')===0){
      $language = 'fr';
      break;
    } 
  }
}

//if(is_null($language)){
//	$language="en"; 
//	} 
include ("_include/php/parameters_$language.php");

?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>
<link rel="SHORTCUT ICON" href="favicon.ico">
<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Matala'a | The eyes of the sun</title>   

<meta name="description" content="Artist based in Noumea. Polynesian/maori inspired tattoo project, logo, album artwork, objects customization, you name it.." /> 
<meta name="keywords" content="matala'a,wallis,polynesie,tribal,polynesian,maori,moko,tattoo,tatau,tapa,polynesia,art,drawing,dessin,koru,graphic, design,kiri tuhi,Aotearoa,Samoa,Wallis,Tonga,Fidji"> 

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>   

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

<!-- Bootstrap -->
<link href="_include/css/bootstrap.min.css" rel="stylesheet">

<!-- Main Style -->
<link href="_include/css/main.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- FancyBox -->
<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="_include/css/fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="_include/css/shortcodes.css" rel="stylesheet">

<!-- Responsive -->
<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="_include/css/responsive.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

<!-- Fav Icon -->
<link rel="shortcut icon" href="#">

<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">

<!-- Modernizr -->
<script src="_include/js/modernizr.js"></script>

<!-- Analytics -->
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43712127-1', 'matalaa.com');
  ga('send', 'pageview');


  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'Insert Your Code']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- End Analytics -->

</head>


<body>

<!-- This section is for Splash Screen -->
<!--div class="ole">
<section id="jSplash">
	<div id="circle"></div>
</section>
</div-->
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<!--div id="home-slider"-->	
    <!--div class="overlay"></div-->
    
<!--a id="nextsection2" href="#work">
    <div class="slider-text"-->
    	<!--div id="slidecaption"></div-->
    	
    <!--/div>  
</a>    
	
	<div class="control-nav">
        <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
        <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
        <ul id="slide-list"></ul>
        
        <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div-->
<!-- End Homepage Slider -->

<!-- Header -->
<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	<a id="goUp" href="#home-slider" data-toggle="tooltip" data-placement="bottom" title="Matala'a | The eyes of the sun"></a>
        </div>
        <div id="social-area">
                <nav id="social">
                    <ul>
                    	<li><font size="6">{</font></li>
                        <li><a href="https://www.facebook.com/matalaadesign" data-toggle="tooltip" data-placement="bottom" title="<?php echo $socialFB; ?>" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                        <li><a href="https://twitter.com/_matalaa_" data-toggle="tooltip" data-placement="bottom" title="twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>
                        <li><a href="<?php echo $zazzle; ?>matalaa" data-toggle="tooltip" data-placement="bottom" title="<?php echo $socialZazzle; ?>" target="_blank"><span class="font-icon-social-zerply"></span></a></li>
                        <li><font size="6">}</font></li>
                    </ul>
                </nav>
        </div>
            
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="#home-slider"><?php echo $menu1; ?></a></li>
                <li><a href="#work"><?php echo $menu2; ?></a></li>
                <li><a href="#shop"><?php echo $menu3; ?></a></li>
                <li><a href="#contact"><?php echo $menu4; ?></a></li>
               
            </ul>
        </nav>
         <!--div id="flag">
         	<FORM method="POST" action="index.php">
  				<input id="flag" type="image" data-toggle="tooltip" title="français" src="_include/img/fr.jpg" name="lang" value="fr"/>
				<input id="flag" type="image" data-toggle="tooltip" title="english" src="_include/img/en.jpg" name="lang" value="en"/>
				<input id="flag" type="image" data-toggle="tooltip" title="fakauvea" src="_include/img/wf.jpg" name="lang" value="wf"/>
  			</FORM>
  				
         </div-->
         
        
    </div>
</header>
<!-- End Header 한국어-->

<div id="home-slider" id="about" class="firstpage">
			
</div>

<!--ul class="content"><li class="content"-->

<!-- Our Work Section -->
<div id="work" class="pageb">
	<div class="container">
    	<!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title"><?php echo $myWorkTitle; ?></h2>
                    <h3 class="title-description"><?php echo $myWorkDesc; ?></h3>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
        <div class="row">
<!--         	<div class="span3"> -->
            	<!-- Filter -->
                <nav id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                    	<li class="type-work"><?php echo $myWork_type; ?></li>
                        <!--li><a href="#filter" data-option-value="*" class="selected"><?php echo $myWork_all; ?></a></li-->
                        <li><a href="#filter" data-option-value=".logo" class="selected">logos</a></li>
                        <li><a href="#filter" data-option-value=".tattoo">tattoo designs</a></li>
                        <li><a href="#filter" data-option-value=".phone">phone case</a></li>
                        <li><a href="#filter" data-option-value=".sketch">sketches</a></li>
                        
                    </ul>
                </nav>
                <!-- End Filter -->
<!--             </div> -->
            
            <div class="span12">
            	<div class="row">
                	<section id="projects">
                    	<ul id="thumbs">
                        <?php
                         //generated from a parameter file
                         $file_handle = fopen("listphotos.txt", "rb");

						while (!feof($file_handle) ) {
							$line_of_text = fgets($file_handle);
							$parts = explode(';', $line_of_text);
                         	$project_group = "$parts[0]";
							$project_title = "$parts[1]";
							$project_imageUrl = "$parts[2]";
							$project_imageThumbUrl = "$parts[3]";
							$project_description = "$parts[4]";				
							 echo "
				 				<!-- Item Project and Filter Name -->
								<li class=\"item-thumbs span2 $project_group\">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class=\"hover-wrap fancybox\" data-fancybox-group=\"$project_group\" title=\"$project_title\" href=\"$project_imageUrl\">
                                	<span class=\"overlay-img\"></span>
                                    <span class=\"overlay-img-thumb font-icon-plus\"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src=\"$project_imageThumbUrl\" alt=\"$project_description\">
                            </li>
						";
                         }
                         ?>
							
                        </ul>
                    </section>
                    
            	</div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->
<!--/li><li class="content"-->


<!-- Shop Section -->
<div id="shop" class="page-alternate">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2bis class="title"><?php echo $shopTitle; ?></h2bis><br>
                <h3bis class="title-description"><?php echo $shopeDesc; ?></h3bis>
                <span class="msg"><?php echo $shopeDesc2; ?></span>
    
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    <!-- Carousel -->
    <div class="row">
    <div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">	
  				<div class="active item">
					<a href="<?php echo $zazzle; ?>matalaa/gifts?cg=196852741159933128" target="_blank">
						<img src="_include/img/slider-images/website_ipad.png">
					</a>
				</div>
				<div class="item">
					<a href="<?php echo $zazzle; ?>matalaa/gifts?cg=196687929279901308" target="_blank">
						<img src="_include/img/slider-images/website_clothe.png">
					</a>
				</div>
				<div class="item">
					<a href="<?php echo $zazzle; ?>matalaa/gifts?cg=196635979569104900" target="_blank">
						<img src="_include/img/slider-images/website_sleeve.png">
					</a>
				</div>
				<div class="item">
					<a href="<?php echo $zazzle; ?>matalaa/" target="_blank">
						<img src="_include/img/slider-images/website_other.png">
					</a>
				</div>
  
        <!-- fetch zazzle info -->
    	 <?php

// configure Zazzle Store Builder display
$_GET['showPagination'] = 'false';
$_GET['showSorting'] = 'false';
$_GET['showProductDescription'] = 'true';
$_GET['showByLine'] = 'true';
$_GET['showProductTitle'] = 'true';
$_GET['showProductPrice'] = 'true';
$_GET['gridCellSize'] = 'huge';
$_GET['showHowMany'] = '100';
 
//include "_include/php/zstore.php";


?>  
        <!-- End Profile -->
   </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>      
       
        
    </div>
    <!-- End People -->
</div>
</div>
<!-- End About Section -->

<!--/li><li class="content"-->


<!-- Contact Section -->
<div id="contact" class="page">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title"><?php echo $contactTitle; ?></h2>
    
                <h3 class="title-description"><?php echo $contactDesc; ?></h3>
                
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- Contact Form -->
    <div class="row">
    	<div class="span9">
        
        	<form id="contact-form" class="contact-form" action="#">
            	<p class="contact-name">
            		<input id="contact_name" type="text" placeholder="<?php echo $contact_name; ?>" value="" name="name" />
                </p>
                <p class="contact-email">
                	<input id="contact_email" type="text" placeholder="<?php echo $contact_address; ?>" value="" name="email" />
                </p>
                <p class="contact-message">
                	<textarea id="contact_message" placeholder="<?php echo $contact_msg; ?>" name="message" rows="15" cols="40"></textarea>
                </p>
                <p class="contact-submit">
                	<a id="contact-submit" class="submit" href="#"><?php echo $contact_button; ?></a>
                </p>
                
                <div id="response">
                
                </div>
            </form>
         
        </div>
        
        <div class="span3">
        	<div class="contact-details">
        		<h3><?php echo $contact_details; ?></h3>
                <ul>
                    <li><span class="color-text"><?php echo $contact_email; ?></span></li>
                    <li>
                    	<?php echo $contact_city; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->
    
    
</div>
</div>
<!-- End Contact Section -->

<!--/li><li class="content"-->

<!--<div id="home-slider">	
    <div class="overlay"></div>

   
</div>
	-->

<!-- Footer -->
<footer>
	<p class="credits"><?php echo $footerTitle; ?></p>
</footer>
<!-- End Footer -->
<!--/li></ul-->

<!-- Back To Top -->
<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->


<!-- Js -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->
<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="_include/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="_include/js/waypoints.js"></script> <!-- WayPoints -->
<script src="_include/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="_include/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="_include/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="_include/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
<script src="_include/js/jquery.tweet.js"></script> <!-- Tweet -->
<script src="_include/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="_include/js/main.js"></script> <!-- Default JS -->
<!-- End Js -->
<!-- SnapScroll Core Files -->
<script type="text/JavaScript" src="_include/js/dependencies/jquery.scroll_to.js"></script>
<script type="text/JavaScript" src="_include/js/jquery.snapscroll.js"></script>

</body>
</html>