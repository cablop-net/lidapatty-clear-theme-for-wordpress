function portfolioAnimations(){
	
	var $ = jQuery;

	if ( !$.browser.msie || $.browser.version == '9.0'){
		$('.image-hover, .image-hover-icon').fadeTo(0,0);

		$('.image-hover-icon').hover(function(){
			$(this).prev().stop().fadeTo(600,0.5);
			$(this).stop().fadeTo(600,1);
		},function(){
			$(this).add($(this).prev()).stop().fadeTo(600, 0);
		});
	}
	else if($.browser.version != '6.0') { /* IE 7 and 8 */
		$('.image-hover').fadeTo(0,0);
		$('.image-hover-icon').css('display','none');
		$('.image-hover').hover(function(){
			$(this).stop().fadeTo(600,0.5);
			$(this).next().css('display','block');
		},function(){
			$(this).next().css('display','none');
		});

		$('.image-hover-icon').hover(function(){
			$(this).css('display','block');
		},function(){
			$(this).css('display','none');
			$(this).prev().stop().fadeTo(600, 0);
		});
	}

	$('a[rel^="gallery-box"]').fancybox({
		'padding'       : 5,
		'transitionIn'      : 'fade',
		'transitionOut'     : 'fade',
		'speedIn'       : 450,
		'centerOnScroll'    : false,
		'speedOut'      : 300,
		'cyclic'        : true,
		'autoScale'         : true,
		'overlayColor'      : '#0f0f0f',
		'overlayOpacity'    : 0.95,
		'titlePosition'     : 'outside',
		'onStart'			: function(){
			if ( !$.browser.msie || $.browser.version == '9.0'){
				$('.image-hover, .image-hover-icon').fadeTo(0,0);
			}
			else{
				$('.image-hover').fadeTo(0,0);
				$('.image-hover-icon').css('display','none');
			}
		},
		'titleFormat': function(title, currentArray, currentIndex, currentOpts) {
			return '<span style="position:absolute; width:80%;">'+(title.length ? '' + title : '')+'</span><span style="position:absolute;right:25px">'+(currentIndex + 1) + ' / ' + currentArray.length +  '</span>';
		}
	});

	$('li[class*="segment-"] a').css('color', '#989898');
	$('li[class*="selected-"] a').css('color', '#4f4f4f');
	
}

jQuery(function($) {

	if ( !$.browser.msie || $.browser.version != '6.0'){
		$('#social li a,#scrolltop').tipTip({
			defaultPosition: 'top',
			edgeOffset: 5
		});
	}

		var cfg = cufonFont;
		cfg.hover = true;

		Cufon.replace('.entry-title a, .button-big-red,.button-big-blue,.button-big-green,.button-big-dark,.button-big-light2,.button-big-red2,.button-big-blue2,.button-big-green2,.button-big-dark2, .button-small-red,.button-small-blue,.button-small-green,.button-small-dark,.button-small-light2,.button-small-red2,.button-small-blue2,.button-small-green2,.button-small-dark2', cfg);

		cufonFont.hover = false;

		var headers = $('h1, h2, h3, h4, h5, h6').not('.portfolio-1-4 h3, .portfolio-1-3 h3, .portfolio-1-2 h3, .portfolio-1-1 h3');
		Cufon.replace(headers, cufonFont);

		Cufon.replace('#nav>.current_page_item>a', {fontFamily: cfg.fontFamily, hover: {color: '#fff'}});
		Cufon.replace('#nav a:not(.current_page_item)', {fontFamily: cfg.fontFamily, hover: {color: '#505050'}});



	if(inventSliderConfig != false && (!$.browser.msie || $.browser.version != '6.0')){
		// nivo slider
		if($('#slider-inner-wrapper').length)
			$('#slider-wrapper').css({backgroundColor: inventSliderConfig.bgcolors[0]});



		if(!$.browser.msie || parseInt($.browser.version)!='6.0') {
			$('#slider-wrapper .wrapper').nivoSlider({
					effect: inventSliderConfig.effect,
					slices:  inventSliderConfig.slices,
					animSpeed: inventSliderConfig.animSpeed, // transition speed
					pauseTime: inventSliderConfig.pauseTime,
					captionOpacity: inventSliderConfig.captionOpacity,
					directionNav: inventSliderConfig.directionNav,
					controlNav: inventSliderConfig.controlNav,
					beforeChange: function(){
					if(!$('#slider-wrapper').hasClass('narrow')){
							var slideId = $('#slider-wrapper .wrapper').data('nivo:vars').currentSlide;
							if (slideId<0) slideId += inventSliderConfig.bgcolors.length;
							slideId+=1
							if(slideId == inventSliderConfig.bgcolors.length) slideId=0;

					$('#slider-inner-wrapper').css({opacity:0, backgroundColor: inventSliderConfig.bgcolors[slideId]});

					}},
					afterChange: function(){
						if($('#slider-inner-wrapper').length)
							$('#slider-wrapper').css({backgroundColor: $('#slider-inner-wrapper').css('backgroundColor')});
					}
			});
		} else {
			$('#slider-wrapper .wrapper img:first-child').show();
		}
	}

	if(!$.browser.msie || parseInt($.browser.version)!='6.0') {

	/* adjust height for sandbox */
	$('.portfolio-1-4,.portfolio-1-3,.portfolio-1-2,.portfolio-1-1').each(function(i){
		var $$ = $(this);
		var n;
		if($$.hasClass('portfolio-1-4'))
			n = 4;
		else if($$.hasClass('portfolio-1-3'))
			n = 3;
		else if($$.hasClass('portfolio-1-2'))
			n = 2;
		else if($$.hasClass('portfolio-1-1'))
			n = 1;

		var sum = 0;
		var max = 0;
		$('li',this).each(function(i){
			if($(this).height()>max) max = $(this).height();
			if((i+1)%n==0) {
				sum+=max;
				max = 0;
				if(n==1) sum +=30; /* margin-bottom:30px; */
			}
		});
		sum+=max;

		$$.height(sum);


			if($.browser.msie &&( parseInt($.browser.version)=='7.0' || parseInt($.browser.version)=='8.0')) {

				var j = 0;
				var m = 0;
				$('li',this).each(function(){
					$(this).css('margin-left','20px');
					if($(this).parent().hasClass('portfolio-1-2')) m = 2;
					if($(this).parent().hasClass('portfolio-1-3')) m = 3;
					if($(this).parent().hasClass('portfolio-1-4')) m = 4;

					if(j%m==0)
					$(this).css('margin-left','0px');
					j++;

				});
			}
	});
	}
	
	/* sand box gallery */
	var read_button = function(class_names) {
		var r = {
			selected: false,
			type: 0
		};
		for (var i=0; i < class_names.length; i++) {
			if (class_names[i].indexOf('selected-') == 0) {
				r.selected = true;
			}
			if (class_names[i].indexOf('segment-') == 0) {
				r.segment = class_names[i].split('-')[1];
			}
		};
		return r;
	};


	var determine_kind = function($buttons) {
		var $selected = $buttons.parent().filter('[class*="selected-"]');
		return $selected.find('a').attr('rel');
	};

	var $preferences = {
		duration: 400,
		easing: 'easeInOutQuad',
		adjustHeight: 'dynamic',
		attribute: 'rel'
	};


	var counter=1;
	var $list = Array();
	var $data = Array();
	var $controls = Array();

	while($('#gallery-splitter-'+counter).length > 0){

		$list[counter] = $('#gallery-'+counter);
		$data[counter] = $list[counter].clone();

		$controls[counter] = $('#gallery-splitter-'+counter);

		$controls[counter].each(function(i) {

			var $control = $(this);
			var $buttons = $control.find('a');

			$buttons.bind('click', function(e) {

				var x = $(this).parent().parent().attr('id').substring(17); // 17 = strlen('gallery-splitter')

				var $button = $(this);
				var $button_container = $button.parent();
				var button_properties = read_button($button_container.attr('class').split(' '));
				var selected = button_properties.selected;
				var button_segment = button_properties.segment;

				if (!selected) {

					var $p =$buttons.parent();
					for(var i=0;i<$buttons.length; i++){
						$p.removeClass('selected-'+i);
					}
					
					$button_container.addClass('selected-' + button_segment);

					var sorting_kind = determine_kind($controls[x].eq(0).find('a'));

					if (sorting_kind == 'all') {
						var $filtered_data = $data[x].find('li');
					} else {
						var $filtered_data = $data[x].find('li.' + sorting_kind);
					}


					if($.browser.msie &&( parseInt($.browser.version)=='7.0' || parseInt($.browser.version)=='8.0')) {
						$filtered_data.css('margin-left','20px');

						var i = 0;
						var n = 0;
						$.each($filtered_data, function(){
							if($(this).parent().hasClass('portfolio-1-2')) n = 2;
							if($(this).parent().hasClass('portfolio-1-3')) n = 3;
							if($(this).parent().hasClass('portfolio-1-4')) n = 4;

							if(i%n==0)
							$(this).css('margin-left','0px');
							i++;

						});
					}
					
					$list[x].quicksand($filtered_data, $preferences,function(){portfolioAnimations()});
				}

				e.preventDefault();
				return false;
			});

		});

		counter++;
	}
	



	$('.nojs').removeClass('nojs');
	
		$('#social a').hover(function(){
			$(this).stop().animate({
				'margin-top':'-5px'
			}, 200);
		},function(){
			$(this).stop().animate({
				'margin-top':'0px'
			}, 200);
		});


		$('.widget_flickr a').hover(function(){
			$(this).stop().animate({
				'opacity':'1.0'
			}, 200);
		},function(){
			$(this).stop().animate({
				'opacity':'0.8'
			}, 200);
		});


	$('#content .widget-container>ul li a,#widgets-container .widget-container>ul li>a').not('.widget_flickr>ul li a, .widget_popular_posts>ul li a').hover(function(){
		$(this).parent().stop().animate({paddingLeft: '10px'})
	},function(){
		$(this).parent().stop().animate({paddingLeft: '0px'});
	});

/*	if ( !$.browser.msie || $.browser.version != '9.0'){*/
		$('#scrolltop').click(function(){
			$.scrollTo(0,500);
			return false;
		});
/*	}*/
	
	$('#nav').superfish({
		autoArrows: false
	});

/* preloading images */

		$('[class^="attachment"]').not('.widget_popular_posts img').each(function(){
			if(!$.browser.msie || parseInt($.browser.version)!='7.0' || !$(this).hasClass('attachment-post-thumbnail') ) {
				if($(this).hasClass('attachment-post-thumbnail'))
					$(this).parent().height($(this).height()+10);

				$(this).css('display','none');

				var p = $(this).parent();
				if(!p.hasClass('image_decorations'))
					p = p.parent();

				p.css({'height': $(this).height()+10+'px', 'width': $(this).width()+10+'px'});
			}
		});

		$('.hidden').removeClass('hidden');
		
		var t=$('[class^="attachment"]').length;
		var i=0;
		var init=setInterval(function(){
			var img = $('[class^="attachment"]').eq(i);

                        if($.browser.safari){
                            var tmp = new Image();
                            tmp.src = img.attr('src');
                            tmp.onload = function(){
                                    img.fadeIn(600); /*.parent().parent().removeClass('hidden');*/
                            }
                        }
                        else
                            img.fadeIn(600);
                        
			i++;

			if(i==t){
				clearInterval(init);
				delete init
			}
		},200);


	portfolioAnimations();

	
	/* CONTACT FORM */
$('#contact-form').submit(function(){

		var valid = true;

		if(!$('#contact-name').val()){
			$('#contact-name-error').fadeIn();
			valid = false;
		}
		else
			$('#contact-name-error').hide();


		if(!$('#contact-email').val())
		{
			$('#contact-email-error').fadeIn();
			valid = false;
		}
		else{
			$('#contact-email-error').hide();

			var email = $('#contact-email').val();
			if(!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(email))
			{
				$('#contact-email-error2').fadeIn();
				valid = false;
			}
			else
				$('#contact-email-error2').hide();
		}

		if(!$('#contact-message').val()) {
			$('#contact-message-error').fadeIn();
			valid = false;
		}
		else
			$('#contact-message-error').hide();

		if(valid){

			$.post(
				$('#contact-form').attr('action'), {
					action: 'invent-contact-ajax',
					name: $('#contact-name').val(),
					email: $('#contact-email').val(),
					message: $('#contact-message').val(),
					subject: $('#contact-subject').val(),
					nonce: $('#contact-nonce').val()
				},
				function(response) {
					var className = (response.type == 'error') ? 'box-red' : 'box-green';
					var title = (response.type == 'error') ? 'Something went wrong!' : 'Thank you!';
					var msg = $('<div></div>').addClass(className).append($('<h3></h3>').html(title)).append($('<p></p>').html(response.message)).hide().fadeIn(1500);
					$('#contact-form').html('').append(msg);
				},
				'text json'
			);
		}
		return false;
	});


	$('.code-container').hover(function(){
		$('.code-container').not(this).stop().css({'position':'relative', 'z-index':0, 'width': 'auto'});

		var w1 = $(this).width();
		$(this).css({'position':'absolute', 'z-index':5});
		var w2 = $(this).width()+5;

		if(w2>w1+5){
			$(this).width(w1);
			$(this).animate({'width': w2}, 300);
		}
		else
			$(this).css({'position':'relative', 'z-index':0});
	}, function(){
		$('.code-container').stop().css({'position':'relative', 'z-index':0, 'width': 'auto'});
	});


});