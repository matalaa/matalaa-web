jQuery(function($){


var BRUSHED = window.BRUSHED || {};

/* ==================================================
   Mobile Navigation
================================================== */
var mobileMenuClone = $('#menu').clone().attr('id', 'navigation-mobile');

BRUSHED.mobileNav = function(){
	var windowWidth = $(window).width();
	
	if( windowWidth <= 979 ) {
		if( $('#mobile-nav').length > 0 ) {
			mobileMenuClone.insertAfter('#menu');
			$('#navigation-mobile #menu-nav').attr('id', 'menu-nav-mobile');
		}
	} else {
		$('#navigation-mobile').css('display', 'none');
		if ($('#mobile-nav').hasClass('open')) {
			$('#mobile-nav').removeClass('open');	
		}
	}
}

BRUSHED.listenerMenu = function(){
	$('#mobile-nav').on('click', function(e){
		$(this).toggleClass('open');
		
		if ($('#mobile-nav').hasClass('open')) {
			$('#navigation-mobile').slideDown(500, 'easeOutExpo');
		} else {
			$('#navigation-mobile').slideUp(500, 'easeOutExpo');
		}
		e.preventDefault();
	});
	
	$('#menu-nav-mobile a').on('click', function(){
		$('#mobile-nav').removeClass('open');
		$('#navigation-mobile').slideUp(350, 'easeOutExpo');
	});
}


/* ==================================================
   Slider Options
================================================== */

BRUSHED.slider = function(){
	$.supersized({
		// Functionality
		slideshow               :   1,			// Slideshow on/off
		autoplay				:	1,			// Slideshow starts playing automatically
		start_slide             :   1,			// Start slide (0 is random)
		stop_loop				:	0,			// Pauses slideshow on last slide
		random					: 	0,			// Randomize slide order (Ignores start slide)
		slide_interval          :   12000,		// Length between transitions
		transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	300,		// Speed of transition
		new_window				:	1,			// Image links open in new window/tab
		pause_hover             :   0,			// Pause slideshow on hover
		keyboard_nav            :   1,			// Keyboard navigation on/off
		performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
		image_protect			:	1,			// Disables image dragging and right click with Javascript
												   
		// Size & Position						   
		min_width		        :   0,			// Min width allowed (in pixels)
		min_height		        :   0,			// Min height allowed (in pixels)
		vertical_center         :   1,			// Vertically center background
		horizontal_center       :   1,			// Horizontally center background
		fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
		fit_portrait         	:   1,			// Portrait images will not exceed browser height
		fit_landscape			:   0,			// Landscape images will not exceed browser width
												   
		// Components							
		slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		thumb_links				:	0,			// Individual thumb links for each slide
		thumbnail_navigation    :   0,			// Thumbnail navigation
		slides 					:  	[			// Slideshow Images
											{image : '_include/img/slider-images/image01.jpg', title : '<div class="slide-content">Brushed</div>', thumb : '', url : ''},
											{image : '_include/img/slider-images/image02.jpg', title : '<div class="slide-content">Brushed</div>', thumb : '', url : ''},  
											{image : '_include/img/slider-images/image03.jpg', title : '<div class="slide-content">Brushed</div>', thumb : '', url : ''}, 
											{image : '_include/img/slider-images/image04.jpg', title : '<div class="slide-content">Brushed</div>', thumb : '', url : ''},
									],
									
		// Theme Options			   
		progress_bar			:	0,			// Timer for each slide							
		mouse_scrub				:	0
		
	});

}


/* ==================================================
   Navigation Fix
================================================== */

BRUSHED.nav = function(){
	$('.sticky-nav').waypoint('sticky');
}


/* ==================================================
   Filter Works
================================================== */

BRUSHED.filter = function (){
	if($('#projects').length > 0){		
		var $container = $('#projects');
		
		$container.isotope({
		  // options
		  animationEngine: 'best-available',
		  itemSelector : '.item-thumbs',
		  layoutMode : 'fitRows'
		});
	
		
		// filter items when filter link is clicked
		var $optionSets = $('#options .option-set'),
			$optionLinks = $optionSets.find('a');
	
		  $optionLinks.click(function(){
			var $this = $(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
			  return false;
			}
			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');
	  
			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
				key = $optionSet.attr('data-option-key'),
				value = $this.attr('data-option-value');
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
			if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
			  // changes in layout modes need extra logic
			  changeLayoutMode( $this, options )
			} else {
			  // otherwise, apply new options
			  $container.isotope( options );
			}
			
			return false;
		});
	}
}


/* ==================================================
   FancyBox
================================================== */

BRUSHED.fancyBox = function(){
	if($('.fancybox').length > 0 || $('.fancybox-media').length > 0 || $('.fancybox-various').length > 0){
		
		$(".fancybox").fancybox({				
				padding : 0,
				beforeShow: function () {
					this.title = $(this.element).attr('title');
					this.title = '<h4>' + this.title + '</h4>' + '<p>' + $(this.element).parent().find('img').attr('alt') + '</p>';
				},
				helpers : {
					title : { type: 'float' },
				}
			});
			
		$('.fancybox-media').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});
	}
}


/* ==================================================
   Contact Form
================================================== */

BRUSHED.contactForm = function(){
	$("#contact-submit").on('click',function() {
		$contact_form = $('#contact-form');
		
		var fields = $contact_form.serialize()+"&subject=Contact from your website";
		
		$.ajax({
			type: "POST",
			url: "_include/php/contact.php",
			data: fields,
			dataType: 'json',
			success: function(response) {
				if(response.status){
					$('#contact-form input').val('');
					$('#contact-form textarea').val('');
				}
				
				$('#response').empty().html(response.html);
			},
			error: function (jqXHR, textStatus, errorThrown) {
    			var test = $.parseJSON(jqXHR.responseText);
   				var test2 = $.parseJSON(test.d);
    			alert(test2[0].Name);
			},
		});
		return false;
	});
}


/* ==================================================
   Shop Form
================================================== */

BRUSHED.shopForm = function(){
	$body = $("body");

	/*
		declare the vars
	*/
	var size=null;
	var qtty=0;
	var newPrice=0;
	var liv=0;
	var livStr="non";
	var ad1=null;
	var ad2=null;
	var ad3=null;
	var mail="";
	var name="";
	var designation="TShirt Matala'a NC";
	
	$("#mainTab").on('click',function() {
		/* reload page */
		location.reload();
	});
	$('#quantity').on('change',function(){
		qtty = document.forms["shop-form1"]["quantity"].value;
    	var textToInsert='';
    	for (i = 1; i <= qtty; i++) { 
			textToInsert += "<select name=\"size"+i+"\" style=\"width:100px\" form=\"shop-form1\">"+
  											"<option value=\"none\">Taille"+((qtty==1)?"":" n°"+i)+"</option>"+
  											"<option value=\"M\">M</option>"+
  											"<option value=\"L\">L</option>"+
  											"<option value=\"XL\">XL</option>"+
  											"<option value=\"XXL\">XXL</option>"+
										"</select><br/>";
		}
		$('#shop-form1-size').empty().html(textToInsert);
	});
	/*****************
	* listener for the first form
	******************/
	$("#shop-submit1").on('click',function() {
		
		var basePrice=2500;
		var baseDeliveryPrice=500;
		/* check form
		 */
		size='';
		for (i = 1; i <= qtty; i++) { 
			var sizeTmp = document.forms["shop-form1"]["size"+i].value;
    		if (sizeTmp == null || sizeTmp == "none") {
				$('#responseShop').empty().html("<font color=\"red\">Veuillez choisir une taille</font>");
        		return false;
    		}
			size+= sizeTmp+", ";
		}
		size = size.substring(0, size.length-2);
		qtty = document.forms["shop-form1"]["quantity"].value;
    	if (qtty == null || qtty == "none") {
        	$('#responseShop').empty().html("<font color=\"red\">Veuillez choisir une quantité</font>");
        	return false;
    	}
		liv = document.getElementById('doDeliver').checked?1:0;
		
		/* calculate price */
		var livPrice = 0;
		if (liv == 1){
			switch (parseInt(qtty)) {
				case 1:
					livPrice = 0;
					break;
				case 2:
					livPrice = 500;
					break;
				case 3:
					livPrice = 700;
					break;
				case 4:
					livPrice = 700;
					break;
				case 5:
					livPrice = 700;
					break;
			}
		}
		
		newPrice = basePrice*qtty + livPrice;
		
		/* activate the infos livs
		but hide the liv address if liv=0*/
		$('.nav-tabs > .active').next('li')[0].style.display="";
		$('.nav-tabs > .active').next('li').find('a').trigger('click');
		
		if (liv == 1){
			document.getElementById('ad-liv').style.display="";
			livStr="oui";
		}
		
		//fill the recap table
		$('#recapProduct').empty().html(designation +" taille(s): "+ size);
		$('#recapQtty').empty().html(qtty);
		$('#recapUnitPrice').empty().html(basePrice);
		$('#livraison').empty().html("livraison");
		$('#recapLivQtty').empty().html(liv);
		$('#recapLivPrice').empty().html(livPrice);
		$('#recapTotal').empty().html(newPrice + " FrcsCFP");
        document.forms["shop-form2"]["price"].value = newPrice;
		
    	
	});
	/*****************
	* listener for the second form
	******************/
	$("#shop-submit2").on('click',function() {
		newPrice = document.forms["shop-form2"]["price"].value.trim();
		designation = document.getElementById("recapProduct").innerText;
		liv = document.getElementById("recapLivQtty").innerText;
		/* check form
		 */
		name = document.forms["shop-form2"]["name"].value;
    	if (name == null || name == "") {
			$('#responseShop2').empty().html("<font color=\"red\">Veuillez saisir votre nom et prénom</font>");
        	return false;
    	}
		mail = document.forms["shop-form2"]["email"].value;
		var re = /\S+@\S+\.\S+/;
    	if (re.test(mail) == false) {
        	$('#responseShop2').empty().html("<font color=\"red\">Veuillez saisir un email valide</font>");
        	return false;
    	}
		ad1 = document.forms["shop-form2"]["adress"].value;
    	ad2 = document.forms["shop-form2"]["postCode"].value;
    	ad3 = document.forms["shop-form2"]["city"].value;
		if (liv > 0){
			if (ad1 == "" || isNaN(ad2) == true || ad3 == "") {
				$('#responseShop2').empty().html("<font color=\"red\">Veuillez saisir votre adresse complète</font>");
        		return false;
    		}
		}
		$('#responseShop2').empty();
		
		/* launch bill with newPrice
		pk_test_tNU31VJhGfF52OrEeE9Un4F0
		pk_live_GFH31bGg0LjNCanNOl3Tf9EQ
		*/
		var handler = StripeCheckout.configure({
   			 key: 'pk_live_GFH31bGg0LjNCanNOl3Tf9EQ',
   			 image: 'https://scontent-b-hkg.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/10347239_872040652823427_4401894174088211437_n.jpg?oh=6de7d37358285eb92599c0e733b98f68&oe=54A0C010',
   			 token: callback
 		 });
		// Open Checkout with further options
    	handler.open({
      		name: designation,
      		description: '',
      		amount: newPrice,
			email: mail,
			currency: 'XPF'
    	});
	});
	
	/*****************
	* listener for the stripe process
	******************/
	var callback = function(token) {
		/* pay 
		   serialize infos
		   send infos by mail  
		*/
		var charge = "token="+token.id+"&amount="+newPrice+"&currency=XPF&description=Achat sur www.matalaa.com";
		$.ajax({
			type: "POST",
			url: "_include/php/stripe.php",
			data: charge,
			dataType: 'json',
			success: function (response) {
					if(response.status == 0){
						window.alert("un problème est survenu, merci de reitérer votre achat ultérieurement");
					}
					/* send a mail to me*/
					var mailmsg="Bonjour, \n \n"+
					"Merci d'avoir acheté sur www.matalaa.com, voici le récapitulatif de votre commande: \n "+
					"-Désignation: "+designation+" \n "+
					"-Quantité: "+qtty+" \n "+
					"-Taille(s): "+size+" \n "+
					"-Livraison: "+livStr+" \n "+
					"-Adresse de livraison: "+name +" "+ad1+" "+ad2+" "+ad3+" \n "+
					"=>Total payé: "+newPrice+" frcs"+" \n "+
					" \n "+
					"Matala'a";
					var fields = "name="+name+"&email="+mail+"&message=" + mailmsg+"&subject=Achat sur www.matalaa.com";
					$.ajax({
						type: "POST",
						url: "_include/php/contact.php",
						data: fields,
						dataType: 'json',
						success: function(response) {
							if(response.status == 0){
								window.alert("un problème est survenu, merci de me contacter à contact@matalaa.com");
							} else {
								window.alert("Merci d'avoir acheté sur www.matalaa.com, un mail de confirmation va vous être envoyé");
							}
							location.reload();
							
						},
						error: function (jqXHR, textStatus, errorThrown) {
    						window.alert("un problème est survenu, merci de reitérer votre achat ultérieurement");
						},
					});
	
			},
			error: function (jqXHR, textStatus, errorThrown) {
    			var test = $.parseJSON(jqXHR.responseText);
   				var test2 = $.parseJSON(test.d);
    			alert(test2[0].Name);
			},
		});
	};
	
	
	
}


/* ==================================================
   Twitter Feed
================================================== */

BRUSHED.tweetFeed = function(){
	var valueTop = -64;
	
    $("#ticker").tweet({
          username: "Bluxart",
          page: 1,
          avatar_size: 0,
          count: 10,
		  template: "{text}{time}",
		  filter: function(t){ return ! /^@\w+/.test(t.tweet_raw_text); },
          loading_text: "loading ..."
	}).bind("loaded", function() {
	  var ul = $(this).find(".tweet_list");
	  var ticker = function() {
		setTimeout(function() {
			ul.find('li:first').animate( {marginTop: valueTop + 'px'}, 500, 'linear', function() {
				$(this).detach().appendTo(ul).removeAttr('style');
			});	
		  ticker();
		}, 5000);
	  };
	  ticker();
	});
	
}


/* ==================================================
   Menu Highlight
================================================== */

BRUSHED.menu = function(){
	$('#menu-nav, #menu-nav-mobile').onePageNav({
		currentClass: 'current',
    	changeHash: false,
    	scrollSpeed: 750,
    	scrollOffset: 30,
    	scrollThreshold: 0.5,
		easing: 'easeOutExpo',
		filter: ':not(.external)'
	});
}

/* ==================================================
   Next Section
================================================== */

BRUSHED.goSection = function(){
	$('#nextsection').on('click', function(){
		$target = $($(this).attr('href')).offset().top-30;
		
		$('body, html').animate({scrollTop : $target}, 750, 'easeOutExpo');
		return false;
	});
}

/* ==================================================
   GoUp
================================================== */

BRUSHED.goUp = function(){
	$('#goUp').on('click', function(){
		$target = $($(this).attr('href')).offset().top-30;
		
		$('body, html').animate({scrollTop : $target}, 750, 'easeOutExpo');
		return false;
	});
}


/* ==================================================
	Scroll to Top
================================================== */

BRUSHED.scrollToTop = function(){
	var windowWidth = $(window).width(),
		didScroll = false;

	var $arrow = $('#back-to-top');

	$arrow.click(function(e) {
		$('body,html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
		e.preventDefault();
	})

	$(window).scroll(function() {
		didScroll = true;
	});

	setInterval(function() {
		if( didScroll ) {
			didScroll = false;

			if( $(window).scrollTop() > 1000 ) {
				$arrow.css('display', 'block');
			} else {
				$arrow.css('display', 'none');
			}
		}
	}, 250);
}

/* ==================================================
   Thumbs / Social Effects
================================================== */

BRUSHED.utils = function(){
	
	$('.item-thumbs').bind('touchstart', function(){
		$(".active").removeClass("active");
      	$(this).addClass('active');
    });
	
	$('.image-wrap').bind('touchstart', function(){
		$(".active").removeClass("active");
      	$(this).addClass('active');
    });
	
	$('#social ul li').bind('touchstart', function(){
		$(".active").removeClass("active");
      	$(this).addClass('active');
    });
	
}

/* ==================================================
   Accordion
================================================== */

BRUSHED.accordion = function(){
	var accordion_trigger = $('.accordion-heading.accordionize');
	
	accordion_trigger.delegate('.accordion-toggle','click', function(event){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
		   	$(this).addClass('inactive');
		}
		else{
		  	accordion_trigger.find('.active').addClass('inactive');          
		  	accordion_trigger.find('.active').removeClass('active');   
		  	$(this).removeClass('inactive');
		  	$(this).addClass('active');
	 	}
		event.preventDefault();
	});
}

/* ==================================================
   Toggle
================================================== */

BRUSHED.toggle = function(){
	var accordion_trigger_toggle = $('.accordion-heading.togglize');
	
	accordion_trigger_toggle.delegate('.accordion-toggle','click', function(event){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
		   	$(this).addClass('inactive');
		}
		else{
		  	$(this).removeClass('inactive');
		  	$(this).addClass('active');
	 	}
		event.preventDefault();
	});
}

/* ==================================================
   Tooltip
================================================== */

BRUSHED.toolTip = function(){ 
    $('a[data-toggle=tooltip]').tooltip();
}


/* ==================================================
	Init
================================================== */

/*BRUSHED.slider();*/
$(document).on({
    	ajaxStart: function() {
			var divToAdd="<div id=\"fancybox-overlay\" class=\"fancybox-overlay fancybox-overlay-fixed\" style=\"width: auto; height: auto; display: block;\"><div class=\"fancybox-wrap fancybox-desktop fancybox-type-image fancybox-tmp\" tabindex=\"-1\"><div class=\"fancybox-skin\" style=\"padding: 0px;\"><div class=\"fancybox-outer\"><div class=\"fancybox-inner\"></div></div></div></div></div><div id=\"fancybox-loading\"><div></div></div>";
			$(divToAdd).appendTo(document.body);    
			},
     	ajaxComplete: function() {
			document.getElementById("fancybox-overlay").remove();
			document.getElementById("fancybox-loading").remove();
			},  
	});

$(document).ready(function(){
	/*Modernizr.load([
	{
		test: Modernizr.placeholder,
		nope: '_include/js/placeholder.js', 
		complete : function() {
				if (!Modernizr.placeholder) {
						Placeholders.init({
						live: true,
						hideOnFocus: false,
						className: "yourClass",
						textColor: "#999"
						});    
				}
		}
	}
	]);
	*/
	// Preload the page with jPreLoader
	/*$('body').jpreLoader({
		splashID: "#jSplash",
		showSplash: true,
		showPercentage: true,
		autoClose: true,
		splashFunction: function() {
			$('#circle').delay(250).animate({'opacity' : 1}, 500, 'linear');
		}
	});*/
	
	BRUSHED.nav();
	BRUSHED.mobileNav();
	BRUSHED.listenerMenu();
	BRUSHED.menu();
	BRUSHED.goSection();
	BRUSHED.goUp();
	BRUSHED.filter();
	BRUSHED.fancyBox();
	BRUSHED.contactForm();
	BRUSHED.shopForm();
	BRUSHED.tweetFeed();
	BRUSHED.scrollToTop();
	BRUSHED.utils();
	BRUSHED.accordion();
	BRUSHED.toggle();
	BRUSHED.toolTip();
	$("ul.content").snapscroll();

});

$(window).resize(function(){
	BRUSHED.mobileNav();
});

$('.enter_link').click(function() { 
        $(this).parent().fadeOut(500);
 });
});
