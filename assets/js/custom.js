function podcaster_radio_menu_open_nav() {
	window.podcaster_radio_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function podcaster_radio_menu_close_nav() {
	window.podcaster_radio_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});

	new WOW().init();
});

jQuery(document).ready(function () {
	window.podcaster_radio_currentfocus=null;
  	podcaster_radio_checkfocusdElement();
	var podcaster_radio_body = document.querySelector('body');
	podcaster_radio_body.addEventListener('keyup', podcaster_radio_check_tab_press);
	var podcaster_radio_gotoHome = false;
	var podcaster_radio_gotoClose = false;
	window.podcaster_radio_responsiveMenu=false;
 	function podcaster_radio_checkfocusdElement(){
	 	if(window.podcaster_radio_currentfocus=document.activeElement.className){
		 	window.podcaster_radio_currentfocus=document.activeElement.className;
	 	}
 	}
 	function podcaster_radio_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.podcaster_radio_responsiveMenu){
			if (!e.shiftKey) {
				if(podcaster_radio_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				podcaster_radio_gotoHome = true;
			} else {
				podcaster_radio_gotoHome = false;
			}

		}else{

			if(window.podcaster_radio_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.podcaster_radio_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.podcaster_radio_responsiveMenu){
				if(podcaster_radio_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					podcaster_radio_gotoClose = true;
				} else {
					podcaster_radio_gotoClose = false;
				}
			
			}else{

			if(window.podcaster_radio_responsiveMenu){
			}}}}
		}
	 	podcaster_radio_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery(document).ready(function () {
	function podcaster_radio_search_loop_focus(element) {
		var podcaster_radio_focus = element.find('select, input, textarea, button, a[href]');
		var podcaster_radio_firstFocus = podcaster_radio_focus[0];  
		var podcaster_radio_lastFocus = podcaster_radio_focus[podcaster_radio_focus.length - 1];
		var KEYCODE_TAB = 9;

		element.on('keydown', function podcaster_radio_search_loop_focus(e) {
			var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

			if (!isTabPressed) { 
			  return; 
			}

			if ( e.shiftKey ) /* shift + tab */ {
			  if (document.activeElement === podcaster_radio_firstFocus) {
		    podcaster_radio_lastFocus.focus();
		      e.preventDefault();
		    }
		  } else /* tab */ {
		  	if (document.activeElement === podcaster_radio_lastFocus) {
		    	podcaster_radio_firstFocus.focus();
		      e.preventDefault();
		    }
		  }
		});
	}
	
	jQuery('.search-box a.search-open').click(function(){
    jQuery(".serach_outer").slideDown(1000);
  	podcaster_radio_search_loop_focus(jQuery('.serach_outer'));
  });

  jQuery('.closepop a').click(function(){
    jQuery(".serach_outer").slideUp(1000);
  });
});

jQuery('document').ready(function(){
  var owl = jQuery('#podcast-series-section .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: true,
    dots:false,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});