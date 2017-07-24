
;(function($) {

   'use strict'

    var testMobile;
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

	var heroSection = function() {
		// Background slideshow
		(function() {
			if ( $( "#slideshow" ).length ) {
				$('#slideshow').superslides({
					play: $('#slideshow').data('speed'),
					animation: 'fade',
					pagination: false
				});
			}
		})();
		// Text slider
		(function() {
			if ( $( ".text-slider" ).length ) {
				$('.text-slider').flexslider({
					animation: "slide",
					selector: ".slide-text li",
					controlNav: false,
					directionNav: false,
					slideshowSpeed: $('.text-slider').data('speed'),
					animationSpeed : 700,
					slideshow : $('.text-slider').data('slideshow'),
					touch: true,
					useCSS: false,
				});
			}
		})();

		$(function() {
          $('a[href*=#]:not([href=#],[class*="tab"] a,.wc-tabs a, .activity-content a)').click(function() { 
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top - 70
		        }, 1000);
		        return false;
		      }
		    }
		  });
		});
	};

	var responsiveMenu = function() {
		var	menuType = 'desktop';

		$(window).on('load resize', function() {
			var currMenuType = 'desktop';

			if ( matchMedia( 'only screen and (max-width: 1024px)' ).matches ) {
				currMenuType = 'mobile';
			}

			if ( currMenuType !== menuType ) {
				menuType = currMenuType;

				if ( currMenuType === 'mobile' ) {
					var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
					var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

					$('#header').find('.header-wrap').after($mobileMenu);
					hasChildMenu.children('ul').hide();
					hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
					//$('.btn-menu').removeClass('active');
				} else {
					var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

					$desktopMenu.find('.submenu').removeAttr('style');
					$('#header').find('.col-md-10').append($desktopMenu);
					$('.btn-submenu').remove();
				}
			}
		});

		$('.btn-menu').on('click', function() {
			$('#mainnav-mobi').slideToggle(300);
			$(this).toggleClass('active');
		});

		$(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
			$(this).toggleClass('active').next('ul').slideToggle(300);
			e.stopImmediatePropagation()
		});
	}

	var panelsStyling = function() {	
		$(".panel-row-style").each( function() {
			if ($(this).data('hascolor')) {
				$(this).find('h1,h2,h3,h4,h5,h6,a,.fa, div, span').css('color','inherit');
			}
			if ($(this).data('hasbg')) {
				$(this).append( '<div class="overlay"></div>' );
			}			
		});
	};

	var scrolls = function() {
		testMobile = isMobile.any();
		if (testMobile == null) {
			$(".panel-row-style, .slide-item").parallax("50%", 0.3);
		}
	};

	var rollAnimation = function() {
		$('.orches-animation').each( function() {
		var orElement = $(this),
			orAnimationClass = orElement.data('animation'),
			orAnimationDelay = orElement.data('animation-delay'),
			orAnimationOffset = orElement.data('animation-offset');

			orElement.css({
				'-webkit-animation-delay':  orAnimationDelay,
				'-moz-animation-delay':     orAnimationDelay,
				'animation-delay':          orAnimationDelay
			});
		
			orElement.waypoint(function() {
				orElement.addClass('animated').addClass(orAnimationClass);
			},{ triggerOnce: true, offset: orAnimationOffset });
		});
	};

	var goTop = function() {
		$(window).scroll(function() {
			if ( $(this).scrollTop() > 800 ) {
				$('.go-top').addClass('show');
			} else {
				$('.go-top').removeClass('show');
			}
		}); 

		$('.go-top').on('click', function() {
			$("html, body").animate({ scrollTop: 0 }, 1000);
			return false;
		});
	};

	var testimonialCarousel = function(){
		if ( $().owlCarousel ) {
			$('.roll-testimonials').owlCarousel({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 1,
				itemsDesktop: [3000,1],
				itemsDesktopSmall: [1400,1],
				itemsTablet:[970,1],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: true,
				autoPlay: $('.roll-testimonials').data('autoplay')
			});
		}
	};

	var progressBar = function() {
		$('.progress-bar').on('on-appear', function() {
			$(this).each(function() {
				var percent = $(this).data('percent');

				$(this).find('.progress-animate').animate({
					"width": percent + '%'
				},3000);

				$(this).parent('.roll-progress').find('.perc').addClass('show').animate({
					"width": percent + '%'
				},3000);
			});
		});
	};

 	var headerFixed = function() {
            if($('.site-header')[0]){
			var headerFix = $('.site-header').offset().top;
			$(window).on('load scroll', function() {
				var y = $(this).scrollTop();
				if ( y >= headerFix) {
					$('.site-header').addClass('fixed');
				} else {
					$('.site-header').removeClass('fixed');
				}
				if ( y >= 107 ) {
					$('.site-header').addClass('float-header');
				} else {
					$('.site-header').removeClass('float-header');
				}
			});
            }
	};

	var counter = function() {
		$('.roll-counter').on('on-appear', function() {
			$(this).find('.numb-count').each(function() {
				var to = parseInt($(this).attr('data-to')), speed = parseInt($(this).attr('data-speed'));
				$(this).countTo({
					to: to,
					speed: speed				
				});
			});
		}); //counter
	};

	var detectViewport = function() {
		$('[data-waypoint-active="yes"]').waypoint(function() {
			$(this).trigger('on-appear');
		}, { offset: '90%', triggerOnce: true });

		$(window).on('load', function() {
			setTimeout(function() {
				$.waypoints('refresh');
			}, 100);
		});
	};

	var teamCarousel = function(){
		if ( $().owlCarousel ) {
			$(".panel-grid-cell .roll-team").owlCarousel({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 3,
				itemsDesktopSmall: [1400,3],
				itemsTablet:[970,2],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: false,
				autoPlay: false,
			}); // end owlCarousel
		} // end if
	};

    var responsiveVideo= function(){
	  $(document).ready(function(){
	    $("body").fitVids();
	  });
    };

	var projectEffect = function() {
		var effect = $('.project-wrap').data('portfolio-effect');
	
		$('.project-item').children('.item-wrap').addClass('orches-animation');

		$('.project-wrap').waypoint(function(direction) {
			$('.project-item').children('.item-wrap').each(function(idx, ele) {
				setTimeout(function() {
					$(ele).addClass('animated ' + effect);
				}, idx * 150);
			});
		}, { offset: '75%' });
	};

	var socialMenu = function() {
	    $('.widget_fp_social a').attr( 'target','_blank' );
	};

    var removePreloader = function() {
		$('.preloader').css('opacity', 0);
		setTimeout(function(){$('.preloader').hide();}, 600);	
    }

	// Dom Ready
	$(function() {
		heroSection();
		headerFixed();
		testimonialCarousel();
		teamCarousel();
		counter();
		progressBar();
		detectViewport();
		responsiveMenu();
		responsiveVideo();
		rollAnimation();
		panelsStyling();
		scrolls();
		projectEffect();
		socialMenu();
		goTop();
		removePreloader();
   	});
})(jQuery);

jQuery(window).load(function() {
	if(document.getElementById("all_click"))
		document.getElementById("all_click").click();
	jQuery('.mask-color').fadeOut('slow');
});

jQuery(document).ready(function($) {
	
	// MENU RESPONSIVE
	$('#menu-res').slicknav({
		prependTo:'.menu-responsive'
	});
    
	// POPUP
	$('.popup-video').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
    });
	
	// SCROLL TO
	$('#mainnav a,ul.slicknav_nav li a').click(function(event){
		event.stopPropagation();
		event.preventDefault();

		if($(this).hasClass('active'))
			return;
		
		$('#mainnav a').removeClass('active').css('border-bottom-color', 'none');
		$(this).addClass('active');

		if(this.hash == "#home")
			$.scrollTo(0,800);
		else
			$.scrollTo( this.hash, 800, {offset:-$(".sticky-wrapper").height()});

		var bgcolor = $(this.hash).find('span.line-title').css('backgroundColor');
		//$(this).css('border-bottom-color', bgcolor);
        $(this).css('border-bottom-color', '#f71e1e');
		
		$('.slicknav_nav').hide('normal', function() {
			$(this).addClass('slicknav_hidden');
		});
		$('a.slicknav_btn').removeClass('slicknav_open').addClass('slicknav_collapsed');

		return false;
	});
    
	$("a#scroll_to").click(function(event) {
		$.scrollTo("#header", 800);
	});
	// PARALLAX EFFECT	
	$('.parallax').height($(this).parent().outerHeight());
	
	// ANIMATION EFFECT	
	$('.animation-wrapper').waypoint(function() {
		$(this).find('.animated').addClass("running");
	}, { offset: '85%'});
	
	// FIX BOOTSTRAP 3 
	$('.span12').removeClass('span12').addClass('col-md-12');
	$('.span11').removeClass('span11').addClass('col-md-11');
	$('.span10').removeClass('span10').addClass('col-md-10');
	$('.span9').removeClass('span9').addClass('col-md-9');
	$('.span8').removeClass('span8').addClass('col-md-8');
	$('.span7').removeClass('span7').addClass('col-md-7');
	$('.span6').removeClass('span6').addClass('col-md-6');
	$('.span5').removeClass('span5').addClass('col-md-5');
	$('.span4').removeClass('span4').addClass('col-md-4');
	$('.span3').removeClass('span3').addClass('col-md-3');
	$('.span2').removeClass('span2').addClass('col-md-2');
	$('.span1').removeClass('span1').addClass('col-md-1');

	// PORTFOLIO
	$('.close-port').click(function(){
		$.scrollTo(".portfolio-wrapper", 900, {easing:'easeOutExpo',onAfter:function(){
			$('#portfolio_content').fadeOut(500);
		}});
	});
	
	var container = $('#portfolio_list').isotope({
		animationEngine : 'best-available',
	  	animationOptions: {
	     	duration: 500,
	     	queue: false
	   	},
		layoutMode: 'fitRows'
	});;	

	$('#portfolio_filter a').click(function(){
		$('#portfolio_filter a').removeClass('active');
		$(this).addClass('active');
		var selector = $(this).attr('data-filter');
	  	container.isotope({ filter: selector });
        setProjects();		
	  	return false;
	});
		
		
	function splitColumns() { 
		var winWidth = $(window).width(), 
			columnNumb = 1;
		
		if (winWidth > 1024) {
			columnNumb = 6;
		} else if (winWidth > 900) {
			columnNumb = 4;
		} else if (winWidth > 479) {
			columnNumb = 3;
		} else if (winWidth < 479) {
			columnNumb = 2;
		}
		
		return columnNumb;
	}		
	
	function setColumns() { 
		var winWidth = $(window).width(), 
			columnNumb = splitColumns(), 
			postWidth = Math.floor(winWidth / columnNumb);
		
		container.find('.item').each(function () { 
			$(this).css( { 
				width : postWidth + 'px' 
			});
		});
	}		
	
	function setProjects() { 
		setColumns();
		$('#portfolio_list').isotope('reLayout');
	}		
	$(window).bind('resize', function () { 
		setProjects();			
	});
	
	/* ==================== HOVER PORTFOLIO ==================== */
	$(' #portfolio_list > .item ').each( function() { 
		$(this).hoverdir({
			hoverDelay : 75
		}); 
	} );
	/* ==================== HOVER PORTFOLIO ==================== */

	/* ==================== PIECHART + COUNTER ==================== */
	$('.pie-wrapper').each(function (e) {
		$(".chart").waypoint(function() {
			var data_easing = $(this).attr('data-easing'),
				data_animate = $(this).attr('data-animate'),
				data_lineCap = $(this).attr('data-line-cap'),
				data_lineWidth = $(this).attr('data-line-width'),
				data_bar_color = $(this).attr('data-bar-color'),
				data_track_color = $(this).attr('data-track-color');
				//data_sise = $(this).attr('data-size');
			$(this).easyPieChart({
					easing: data_easing,
					animate: data_animate,
					lineCap: data_lineCap, //butt, round and square.
					lineWidth: data_lineWidth,
					barColor: data_bar_color,	
					trackColor:	data_track_color,
					scaleColor: false,
					size: 150,
					onStep: function(from, to, percent) {
						$(this.el).find('.percent-chart').text(Math.round(percent));
					}
				});
		}, { offset: '85%', triggerOnce:true});
	});
	$('.counter').each(function (e) {
		$(".timer").waypoint(function() {
			$('.timer').countTo();
		}, { offset: '85%', triggerOnce:true});
	});	
	/* ==================== PIECHART + COUNTER ==================== */

	/* ==================== HEADER SLIDER ==================== */
	function random(owlSelector){
	  owlSelector.children().sort(function(){
		  return Math.round(Math.random()) - 0.5;
	  }).each(function(){
		$(this).appendTo(owlSelector);
	  });
	}
	$("#header_slider").owlCarousel({
		navigation : true, // Show next and prev buttons
		navigationText: [
		  "<span class='arrow-left-slider'></span>",
		  "<span class='arrow-right-slider'></span>"
		  ],
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true,
		autoHeight : true,
		transitionStyle:"fade",
		// Responsive 
		responsive: true,
		items : 1,
		pagination : false,
		addClassActive:true,
		beforeInit : function(elem){
		  //Parameter elem pointing to $("#owl-demo")
		  random(elem);
		},
		beforeMove:beforeMove,
	});
	function beforeMove(){
	 
	}
	/* ==================== HEADER SLIDER ==================== */

	/* ==================== OWL CAROUSEL ==================== */
	$('.carousel-play').each(function (e) {
		var data_slide_speed = $(this).attr('data-slide-speed'),
				data_pagination_speed = $(this).attr('data-pagination-speed'),
				data_auto = $(this).data('auto'),
				data_navigation = $(this).data('navigation'),
				data_pagination = $(this).data('pagination'),
				data_pagination_numbers = $(this).data('numbers'),
				data_items = $(this).attr('data-items'),
				data_desktop = $(this).attr('data-desktop'),
				data_desktop_small = $(this).attr('data-desktop-small'),
				data_tablet = $(this).attr('data-tablet'),
				data_mobile = $(this).attr('data-mobile');
		$(".carousel-play").owlCarousel({
				//Basic Speeds
				slideSpeed : data_slide_speed,
				paginationSpeed : data_pagination_speed,
			 
				//Autoplay
				autoPlay : data_auto,
				goToFirst : true,
				goToFirstSpeed : 1000,
			 
				// Navigation
				navigation : data_navigation,
				navigationText : ["prev","next"],
				pagination : data_pagination,
				paginationNumbers: data_pagination_numbers,
			 
				// Responsive 
				responsive: true,
				items : data_items,
				itemsDesktop : [1199,data_desktop_small],
				itemsDesktopSmall : [979,data_desktop_small],
				itemsTablet: [768,data_tablet],
				itemsMobile : [479,data_mobile]
		});
	});
	/* ==================== OWL CAROUSEL ==================== */

	/* ==================== OWL CAROUSEL SYNC ==================== */
	  var sync1 = $("#test_content");
	  var sync2 = $("#test_avatar");
	  
	  sync1.owlCarousel({
		  singleItem : true,
		  slideSpeed : 1000,
		  navigation: false,
		  pagination:false,
		  afterAction : syncPosition,
		  transitionStyle : "fade",
	  });
	  sync2.each(function (e) {
		  var   data_slide_speed = $(this).attr('data-slide-speed'),
				data_pagination_speed = $(this).attr('data-pagination-speed'),
				data_auto = $(this).data('auto'),
				data_navigation = $(this).data('navigation'),
				data_pagination = $(this).data('pagination'),
				data_pagination_numbers = $(this).data('numbers'),
				data_items = $(this).attr('data-items'),
				data_desktop = $(this).attr('data-desktop'),
				data_desktop_small = $(this).attr('data-desktop-small'),
				data_tablet = $(this).attr('data-tablet'),
				data_mobile = $(this).attr('data-mobile');
		  sync2.owlCarousel({
			  //Basic Speeds
			  slideSpeed : data_slide_speed,
			  paginationSpeed : data_pagination_speed,
			  
			  
			  //Autoplay
			  autoPlay : data_auto,
			  goToFirst : true,
			  goToFirstSpeed : 1000,
		   
			  // Navigation
			  navigation : data_navigation,
			  navigationText : ["prev","next"],
			  pagination : data_pagination,
			  paginationNumbers: data_pagination_numbers,
			  addClassActive:true,
		   
			  // Responsive 
			  responsive: true,
			  items : data_items,
			  itemsDesktop : [1199,data_desktop_small],
			  itemsDesktopSmall : [979,data_desktop_small],
			  itemsTablet: [768,data_tablet],
			  itemsMobile : [479,data_mobile],
			  afterInit : function(el){
				el.find(".owl-item").eq(0).addClass("synced");
			  }
		  });
	  });
	  
	 
	  $("#test_avatar").on("click", ".owl-item", function(e){
	    e.preventDefault();
	    var number = $(this).data("owlItem");
	    sync1.trigger("owl.goTo",number);
	  });
	 
	  function center(number){
	    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
	    var num = number;
	    var found = false;
	    for(var i in sync2visible){
	      if(num === sync2visible[i]){
	        var found = true;
	      }
	    }
	 
	    if(found === false){
	      if(num>sync2visible[sync2visible.length-1]){
	        sync2.trigger("owl.goTo", num - sync2visible.length+2)
	      }else{
	        if(num - 1 === -1){
	          num = 0;
	        }
	        sync2.trigger("owl.goTo", num);
	      }
	    } else if(num === sync2visible[sync2visible.length-1]){
	      sync2.trigger("owl.goTo", sync2visible[1])
	    } else if(num === sync2visible[0]){
	      sync2.trigger("owl.goTo", num-1)
	    }
	    
	  }
	function syncPosition(el){
		var current = this.currentItem;
		jQuery("#test_avatar")
			.find(".owl-item")
			.removeClass("synced")
			.eq(current)
			.addClass("synced")
		if(jQuery("#test_avatar").data("owlCarousel") !== undefined){
			center(current)
		}
	}
	/* ==================== OWL CAROUSEL SYNC ==================== */
	/* ==================== STICKY HEADER ==================== */
	$('#header').waypoint('sticky', {
	  wrapper: '<div class="sticky-wrapper" />',
	  stuckClass: 'stuck-sticky'
	});
	/* ==================== STICKY HEADER ==================== */
	
});

jQuery(function($){
    var sections = {},
    	header_height = $("#header").height(),
        i        = -1;
    
    // Grab positions of our sections 
    $('.template-wrap').each(function(){
        sections[this.id] = $(this).offset().top;
    });

    $(document).scroll(function(){
        var $this = $(this),
            pos   = $this.scrollTop();
        //console.log(sections);
        if(window.document.body.scrollTop== 0){
            $('#mainnav li a').removeClass('active').css('border-bottom-color', 'none');
                $('#mainnav li a').removeAttr( "style" );
                $('#mainnav li a[href="'+window.location.origin + window.location.pathname+'#home"]')
		                .addClass('active').css('border-bottom-color', '#f71e1e');
        }
		else
            {
        for(i in sections){
            var bgcolor = $('#'+i).find('span.line-title').css('backgroundColor');  

			$('#'+i).waypoint(function() {
                $('#mainnav li a').removeClass('active').css('border-bottom-color', 'none');
                $('#mainnav li a').removeAttr( "style" );
                $('#mainnav li a[href="'+window.location.origin + window.location.pathname+'#'+i+'"]')
		                .addClass('active').css('border-bottom-color', '#f71e1e');
		               // .css('border-bottom-color', bgcolor);	
			}, { offset: '25%' });
        }
    }
    });
});

function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
function hexc(colorval) {
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    delete(parts[0]);
    for (var i = 1; i <= 3; ++i) {
        parts[i] = parseInt(parts[i]).toString(16);
        if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    return '#' + parts.join('');
}
