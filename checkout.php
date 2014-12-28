<?php
	$shopPropertiesId=$_GET['id'];
	
	$image="";
	$description="";
	$unitPrice="";
	$quantity="";
	$delivery="";
	$deliveryPrice="";
	$deliveryQuantity="";
	$total="";
	$currency="";
	
    //generated from a parameter file
    $file_handle = fopen("_include/properties/shop_".$shopPropertiesId.".txt", "rb");
	
	while (!feof($file_handle) ) {
		$line_of_text = fgets($file_handle);
		$parts = explode('=', $line_of_text);
        $propName = "$parts[0]";
		$propValue = "$parts[1]";
		switch ($propName) {
  			case "image":
    			$image=$propValue;
    		break;
  			case "description":
    			$description=$propValue;
    		break;
  			case "unitPrice":
    			$unitPrice=$propValue;
    		break;
  			case "quantity":
    			$quantity=$propValue;
    		break;
  			case "delivery":
    			$delivery=$propValue;
    		break;
  			case "deliveryPrice":
    			$deliveryPrice=$propValue;
    		break;
  			case "deliveryQuantity":
    			$deliveryQuantity=$propValue;
    		break;
  			case "total":
    			$total=$propValue;
    		break;
  			case "currency":
    			$currency=$propValue;
    		break;
		}			
     }
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

<!-- Header -->
<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	<a id="goUp" href="http://www.matalaa.com" data-toggle="tooltip" data-placement="bottom" title="Matala'a | The eyes of the sun"></a>
        </div>
        <div id="social-area">
                <nav id="social">
                    <ul>
                    	<li><font size="6">{</font></li>
                        <li><a href="https://www.facebook.com/matalaadesign" data-toggle="tooltip" data-placement="bottom" title="facebook" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                        <li><a href="https://twitter.com/_matalaa_" data-toggle="tooltip" data-placement="bottom" title="twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>
                        <li><a href="http://www.zazzle.fr/matalaa" data-toggle="tooltip" data-placement="bottom" title="zazzle" target="_blank"><span class="font-icon-social-zerply"></span></a></li>
                        <li><font size="6">}</font></li>
                    </ul>
                </nav>
        </div>
        
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="http://www.matalaa.com">www.matalaa.com</a></li>
            	<li ><a href="">SHOP</a></li>
        	</ul>
        </nav>
    </div>
</header>
<!-- End Header 한국어-->

	<div class="page" align="center">
		<div class="row">
        	
			
		<!-- Start Blockquote -->
            <div class="span5" id="shopImg">
           		<img <?php echo "src=\"".$image."\""; ?>/>
				
			</div>
			<div class="span7">
				<div class="tabbable">
                
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab2" data-toggle="tab">Infos livraison</a></li>
					</ul>
					
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab2">
							<form id="shop-form2" class="contact-form" action="#">
            					<div id="recap">
									Récapitulatif de la commande: <br/>
									<table style="width:60%;">
										<tr>
											<td>Description</td>
											<td>qtt</td>
											<td>prix unitaire</td>
										</tr>
										<tr>
											<td id="recapProduct">
												<?php echo $description; ?>
											</td>
											<td id="recapQtty">
												<?php echo $quantity; ?>
											</td>
											<td id="recapUnitPrice">
												<?php echo $unitPrice; ?>
											</td>
										</tr>
										<tr>
											<td id="livraison">
												<?php echo $delivery; ?>
											</td>
											<td id="recapLivQtty">
												<?php echo $deliveryQuantity; ?>
											</td>
											<td id="recapLivPrice">
												<?php echo $deliveryPrice; ?>
											</td>
										</tr>
										<tr>
											<td>TOTAL</td>
											<td/>
											<td id="recapTotal">
												<?php echo $total.$currency; ?>
											</td>
										</tr>
									</table>
                				</div>
								<br/>
								
								<?php echo " <input id=\"price\" type=\"hidden\" value=\"".$total."\" name=\"price\" />"; ?> 
                				
								Informations client: <br/>
								<p class="contact-name">
            						<input id="contact_name" type="text" placeholder="Nom Prénom" value="" name="name" />
                				</p>
                				<p class="contact-email">
                					<input id="contact_email" type="text" placeholder="Email" value="" name="email" />
                				</p>
                				
                				<?php
                				if ($deliveryQuantity == 1) {
								echo "<div id=\"ad-liv\" >
                					<p class=\"contact-ad1\">
                						<input id=\"contact-ad1\" type=\"text\" placeholder=\"Adresse\" value=\"\" name=\"adress\" />
                					</p>
									<p class=\"contact-ad2\">
                						<input id=\"contact-ad2\" type=\"text\" placeholder=\"Code postal\" value=\"\" name=\"postCode\" />
                					</p>
									<p class=\"contact-ad3\">
                						<input id=\"contact-ad3\" type=\"text\" placeholder=\"Ville\" value=\"\" name=\"city\" />
                					</p>
								</div>";
								}
								?>
                				<p class="contact-submit">
                					<a id="shop-submit2" class="button" href="#">Procéder au paiement</a>
               					</p>
                
                				<div id="responseShop2">
                
                				</div>
            				</form>
						</div>
                    </div>
                            
				</div>
				
				
			</div>
			
		</div>
	</div>
<!-- Footer -->
<footer>
	<p class="credits">&copy;2013 Matala'a est le nom d'un petit mont sur l'île de Wallis, la'a: signifie soleil et mata: yeux, visage => les yeux/visages du soleil</p>
</footer>
<!-- End Footer -->
<!--/li></ul-->

<!-- Back To Top -->
<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->
<div id="fb-root"></div>
<!-- Js -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->
<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script src="https://checkout.stripe.com/checkout.js"></script>
</body>
</html>