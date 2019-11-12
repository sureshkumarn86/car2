/*------------------------------------------------------------------
[Table of contents]


--*/

(function($) {

	"use strict";

	var Core = {

		initialized: false,

		initialize: function() {

			if (this.initialized) return;
			this.initialized = true;

			this.build();

		},

		build: function() {

			//Placeholder for IE
			$('input, textarea').placeholder();
			
			// Dropdown menu
			this.dropdownhover();
			
			// Page preloader
			this.initPagePreloader();
			
			// Equal Height
			this.setEqualHeight();
			
			// Slider
			this.initSlider();
			
			//Setup WOW.js
			this.initScrollAnimations();

			// Owl Carousel
			this.initOwlCarousel();
			
			// bxSlider
			this.initBxSlider();
			
			// Tabs
			this.initTabs();
			
			// Collapse Blocks
			this.initCollapsible();
			
			// Counter
			this.initNumberCounter();
			
			// Go to top
			this.initGoToTop();
			
		
			
		},

		dropdownhover: function(options) {
			/** Extra script for smoother navigation effect **/
			if ($(window).width() > 798) {
				$('.navbar-main-slide').on('mouseenter', '.navbar-nav-menu > .dropdown', function() {
					"use strict";
					$(this).addClass('open');
				}).on('mouseleave', '.navbar-nav-menu > .dropdown', function() {
					"use strict";
					$(this).removeClass('open');
				});
			}
		},

		initPagePreloader: function(options) {
			var $preloader = $('#page-preloader'),
			$spinner = $preloader.find('.spinner-loader');
			$spinner.fadeOut();
			$preloader.delay(500).fadeOut('slow');
			window.scrollTo( 0, 0 );
		},

		setEqualHeight: function(){
			var equalHeight = $('body').data('equal-height');
			if(equalHeight && equalHeight.length){
				var columns = $(equalHeight);
				var tallestcolumn = 0;
				columns.each(
					function(){
						var currentHeight = $(this).height();
						if(currentHeight > tallestcolumn){
							tallestcolumn = currentHeight;
						}
					}
				);
				columns.height(tallestcolumn);
			}
		},

		initSlider: function(options){
			var slider = $('.slider').length;
			if(slider){
		        jQuery(".slider").slider({
		            min: 100,
		            max: 1000,
		            values: [0,1000],
		            range: true,
		            slide: function(event, ui){
		                $(".ui-slider-handle span.min").text(ui.values[0]);
		                $(".ui-slider-handle span.max").text(ui.values[1]);
		            },
		            stop:function(event, ui){
		                $("input.j-min").val(ui.values[0]);
		                $("input.j-max").val(ui.values[1]);
		            }
		        });
		        $(".ui-slider-handle:first-of-type").append("<span class='min'>100</span>");
		        $(".ui-slider-handle:last-of-type").append("<span class='max'>1000</span>");
			}
		},

		initScrollAnimations: function(options) {
			var scrollingAnimations = $('body').data("scrolling-animations");
			if(scrollingAnimations){
				new WOW().init();
			}
		},
		
		initOwlCarousel: function(options) {
			$(".enable-owl-carousel").each(function(i) {
				var $owl = $(this);
				
				var itemsData = $owl.data('items');
				var autoPlayData = $owl.data('auto-play');
				var navigationData = $owl.data('navigation');
				var stopOnHoverData = $owl.data('stop-on-hover');
				var itemsDesktopData = $owl.data('items-desktop');
				var itemsDesktopSmallData = $owl.data('items-desktop-small');
				var itemsTabletData = $owl.data('items-tablet');
				var itemsTabletSmallData = $owl.data('items-tablet-small');
				
				$owl.owlCarousel({
					items: itemsData,
					pagination: false,
					navigation: navigationData,
					autoPlay: autoPlayData,
					stopOnHover: stopOnHoverData,
					navigationText: ["",""],
					itemsCustom:[
						[0, 1],
						[500, itemsTabletSmallData],
						[710, itemsTabletData],
						[992, itemsDesktopSmallData],
						[1199, itemsDesktopData]
					],
				});
			});
		},
		
		initBxSlider: function(options) {
			$(".enable-bx-slider").each(function(i) {
				var $bx = $(this);
				var pagerCustomData = $bx.data('pager-custom');
				var modeData = $bx.data('mode');
				var pagerSlideData = $bx.data('pager-slide');
				var modePagerData = $bx.data('mode-pager');
				var pagerQtyData = $bx.data('pager-qty');
				
				
				var realSlider = $bx.bxSlider({
					pagerCustom: pagerCustomData,
					mode: modeData,
				});
				if(pagerSlideData){
					var realThumbSlider=$(pagerCustomData).bxSlider({
						mode: modePagerData,
						minSlides: pagerQtyData,
						maxSlides: pagerQtyData,
						moveSlides: 1,
						slideMargin: 20,
						pager:false,
						infiniteLoop:false,
						hideControlOnEnd:true,
						nextText:'<span class="fa fa-angle-down"></span>',
						prevText:'<span class="fa fa-angle-up"></span>'
					});
					linkRealSliders(realSlider,realThumbSlider,pagerCustomData);
					if($(pagerCustomData+" a").length <= pagerQtyData ){
						$(pagerCustomData+" .bx-next").hide();
					}
				}
			});
			function linkRealSliders(bigS,thumbS,sliderId){
				$(sliderId).on("click","a",function(event){
					event.preventDefault();
					var newIndex=$(this).data("slide-index");
					bigS.goToSlide(newIndex);
				});
			}
		},
		
		initTabs: function(options) {
			$(document).on('click', '.j-tab', function(e){
				var to = $($(this).attr('data-to'));
				if(to.length > 0){
					if(to.css('display') == 'none'){
						var tabs = to.parent().find('.j-tab');
						if(tabs.length > 0){
							tabs.each(function(i,e){
								if($(e).hasClass('m-active')){
									$(e).removeClass('s-lineDownCenter');
									$(e).removeClass('m-active');                        
								}
								var to2 = $($(e).attr('data-to'));
								if(to2.css('display') == 'block')
									to2.css('display','none');
							});
						}
						to.css('display','block');
						if(!(($(this).hasClass('owl-next')) || ($(this).hasClass('owl-prev'))))
							$(this).addClass('m-active s-lineDownCenter');
						else{
							$('.b-auto__main-toggle').each(function(i,e){
								if($(e).attr('data-to').replace('#','') == to.attr('id')){
									$(e).addClass('m-active s-lineDownCenter');
								}
							})
						}      
					}
				}
				e.preventDefault();
			});
		},
		
		initCollapsible: function(options) {
			var collapse = $('.j-more').length;
			if(collapse){
				$(document).on('click', '.j-more', function(e){
					var inside = $(this).parent().parent().find('.j-inside');
					var span = $(this).find('span.fa');
					if(inside.length > 0){
						span.toggleClass('fa-angle-left');
						span.toggleClass('fa-angle-down');
						$(this).parent().toggleClass('m-active');
						inside.toggleClass('m-active');
					}
					e.preventDefault();
				});
			}
		},
		
		initNumberCounter: function(options) {
			if ($('body').length) {
				var waypointScroll = $('.percent-blocks').data('waypoint-scroll');
				if(waypointScroll){
					$(window).on('scroll', function() {
						var winH = $(window).scrollTop();
						$('.percent-blocks').waypoint(function() {
							$('.chart').each(function() {
								CharsStart();
							});
						}, {
							offset: '80%'
						});
					});
				}
			}
			function CharsStart() {
				$('.chart').easyPieChart({
					barColor: false,
					trackColor: false,
					scaleColor: false,
					scaleLength: false,
					lineCap: false,
					lineWidth: false,
					size: false,
					animate: 3000,
					onStep: function(from, to, percent){
						$(this.el).find('.percent').text(Math.round(percent));
					}
				});
			}
		},

		initGoToTop: function(options) {
			// Show/Hide Button on Window Scroll event.
			$(window).on('scroll', function(){
				var fromTop = $(this).scrollTop();
				var display = 'none';
				if(fromTop > 650){
					display = 'block';
				}
				$('#to-top').css({'display': display});
			});
			$("#to-top").smoothScroll();
		},
		
		
	};
	$(window).load(function(){
		Core.initialize();
	});
	
	
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		var headerHeight = $('.b-nav').outerHeight();
		if (scrollTop > 200) {
			$('.b-nav').addClass('header-sticky');
		} else {
			$('.b-nav').removeClass('header-sticky');
		}
	});
	
	
	/*popup*/
	$(document).on('click','.showreg',function(e){		
		$('.sarav_login_form').hide();
		$('.sarav_register_form').show();
		$('.sarav_forgot_form').hide();		
	});
	$(document).on('click','.showlogin',function(e){		
		$('.sarav_login_form').show();
		$('.sarav_register_form').hide();
		$('.sarav_forgot_form').hide();		
	});
	$(document).on('click','.showreset',function(e){		
		$('.sarav_login_form').hide();
		$('.sarav_register_form').hide();
		$('.sarav_forgot_form').show();		
	});
	
	$('.menu-login').click(function(){	
		$('#signfrms').modal('show');
	});	
	
	/*login*/
	$(document).on('click','#login_here',function(e){
		var uname=$('#sarav_login #username').val();
		var pwd=$('#sarav_login #login_pwd').val();
		var valid=true;
		$(".logmsg").hide();
	
		
		var redirecturl=$('#sarav_login #redirecturl').val();
	
		if(uname==""){
			$("#sarav_login #username").addClass("error");
			valid=false;		
		}
		else{
			jQuery("#sarav_login #username").removeClass("error");
		}
		if(pwd==""){
			$("#sarav_login #login_pwd").addClass("error");
			valid=false;		
		}
		else{
			jQuery("#sarav_login #login_pwd").removeClass("error");
		}
		
		if(valid){
		
				jQuery.ajax({
				type: 'POST',
				url: adminajax,
				data: {
						'action': 'loginajax', //calls wp_ajax_nopriv_ajaxlogin
						'username': uname,                 
						'login_pwd': pwd 
					},
				success: function(response){
					var result = jQuery.parseJSON(response);
					jQuery.each(result, function(keys, values) {
						if(keys=="success"){
							setTimeout(function(){
								window.location.href=redirecturl;
							}, 3000);
						}
						jQuery(".logmsg").show();
						jQuery("#sarav_login .logmsg").html(values);
					});	
				}
			
			});
		}
	});
	
	
	/*Register*/
	$(document).on('click','#sarav_register #register_here',function(e){
		var reg_uname=$('#sarav_register #reg_name').val();
		var reg_email=$('#sarav_register #reg_email').val();
		var reg_pwd=$('#sarav_register #reg_pwd').val();
		var reg_cpwd=$('#sarav_register #reg_cpwd').val();
		var reg_valid=true;
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		var redirecturl=$('#sarav_register #redirecturl').val();
		jQuery(".regmsg").hide();
		
		if (reg_uname == null || reg_uname == "") {		
			jQuery('#sarav_register #reg_name').addClass('error');
			reg_valid=false;		
		}else{
			jQuery('#sarav_register #reg_name').removeClass('error');
		}
		if (reg_email == null || reg_email == "") {		
			jQuery('#sarav_register #reg_email').addClass('error');
			reg_valid=false;		
		}else if(reg_email != "") {
			jQuery('#sarav_register #reg_email').removeClass('error');
		}
		if (reg_pwd == null || reg_pwd == "") {		
			jQuery('#sarav_register #reg_pwd').addClass('error');
			reg_valid=false;		
		}else{
			jQuery('#sarav_register #reg_pwd').removeClass('error');
		}
		if (reg_cpwd == null || reg_cpwd == "") {		
			jQuery('#sarav_register #reg_cpwd').addClass('error');
			reg_valid=false;		
		}else{
			jQuery('#sarav_register #reg_cpwd').removeClass('error');
		}
		
		if(reg_valid){
			jQuery.ajax({
				type: 'POST',
				url: adminajax,
				data: {
						'action': 'regajax', //calls wp_ajax_nopriv_ajaxlogin
						'username': reg_uname,                 
						'regemail': reg_email,
						'regpwd': reg_pwd,
						'regcpwd': reg_cpwd,
					},
				success: function(response){
					var result = jQuery.parseJSON(response);
					jQuery.each(result, function(keys, values) {
							if(keys=="success"){
								setTimeout(function(){
									window.location.href=redirecturl;
								}, 3000);
								jQuery(".regmsg").show();
								jQuery("#sarav_register .regmsg").html(values);
							}else{
								jQuery("#sarav_register .regmsg").html(values);
								jQuery(".regmsg").show();
							}
							
					});
				}
			});
		}	
	});
	
	
	/*Forgot*/
	$(document).on('click','#sarav_forgot #forgot_pwd',function(e){
		var acemail=$('#sarav_forgot #email_address').val();
		var vaild_frm=true;
		if (acemail == null || acemail == "") {		
			jQuery('#sarav_forgot #email_address').addClass('error');
			vaild_frm=false;		
		}else{
			jQuery('#sarav_forgot #email_address').removeClass('error');
		}
		
		if(vaild_frm){
			jQuery.ajax({
				type: 'POST',
				url: adminajax,
				data: {
						'action': 'forgotpwd',
						'regac': acemail
					},
				success: function(response){
						//alert(response);						jQuery("#forgotmsg").html(response);
				}
			});
		}		
	});
	
	/*dashboard*/
	function resizedash() {
		var header_ht=$('.b-nav').height();		
		var $height = $(window).height() - header_ht;
		$('.dash_inner_wrapper').css('min-height',$height);
	}
	
	resizedash();

    $(window).resize(function() {
        resizedash();
    });
	
})(jQuery);