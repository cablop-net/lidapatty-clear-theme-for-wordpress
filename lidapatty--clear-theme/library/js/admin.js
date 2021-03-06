	function initSlider(sliderDiv, valueDiv, unit, min, max, step)
	{
		var $ = jQuery;
		$(sliderDiv).slider({
			step: step,
			range: 'min',
			min: min,
			max: max,
			slide: function(event, ui){
				$(this).siblings(sliderDiv+'-value').html(ui.value+''+unit);
				$(valueDiv).attr('value',ui.value);
			},
			change: function(event, ui){
				$(this).siblings(sliderDiv+'-value').html(ui.value+''+unit);
				$(valueDiv).attr('value',ui.value);
			}
		});
		
		$(sliderDiv).slider('value', $(valueDiv).val());
	}

	function initColorPicker(source, pickerButton, previewDiv) {
		var $ = jQuery;

		var color = $(source).val();
		if(typeof(color) != "string") {
			color ="#555";
		}

		if(color.length==4)
				color = '#'+color[1]+color[1]+color[2]+color[2]+color[3]+color[3];


			$(previewDiv).css('backgroundColor', color);


			$(pickerButton).ColorPicker({
				color: color,

				onChange: function (hsb, hex, rgb) {
					$(previewDiv).css('backgroundColor', '#'+hex);
					$(source).val('#'+hex);
				}
			});
	}
	

	function initSlideButtons($){
		$('.invent-slide-remove').click(function(){
			$(this).parent().fadeOut('slow', function(){
				$(this).remove();
			});
		})
	}

	function addNewSlide(url, thumb)
	{
		var $ = jQuery;

		var slideId = $('#invent-all-slides').attr('value')

		$('#invent-all-slides').attr('value',slideId+1);

		var li = $('<li></li>');

		/* 	<div class="invent-slide-handle"><div class="icon"></div></div>*/
		li.append($('<div></div>').addClass('invent-slide-handle').append($('<div></div>').addClass('icon')));

		var imageDiv = $('<div></div>').addClass('invent-slide-image').attr('id', 'invent-slide'+slideId+'-preview');
		imageDiv.append($('<a></a>').attr('href', url).append($('<img/>').attr('src',thumb).attr('width',125).attr('height',100)));
/*
					<div class="invent-slide-image" id="invent-slide<?php echo $key ?>-preview">
						<a href="<?php echo $slideImage ?>">
							<img src="<?php echo InventAdmin::getThumbnailPath($slideImage) ?>" alt="" width="125" height="100"/>
						</a>
*/

		var slideFile = $('<div></div>').addClass('invent-slide-file');

		/*	<input type="file" size="20" class="invent-upload" id="invent-slide<?php echo $key ?>" rel="125x100xcrop" /> */
		slideFile.append($('<input/>').attr('type','file').attr('size',20).addClass('invent-upload').attr('id','invent-slide'+slideId).attr('rel','125x100xcrop'));

		/*	<a href="#">Change image</a> */
		slideFile.append($('<a></a>').attr('href','#').html('Change image'));

		imageDiv.append(slideFile);
		li.append(imageDiv);

		var infoDiv = $('<div></div>').addClass('invent-slide-info');
		infoDiv.append($('<label></label>').attr('for','slideTitle'+slideId).html('Title'));
		infoDiv.append($('<input/>').attr('type','text').attr('id', 'slideTitle'+slideId).attr('name','invent-slider-titles[]'))

		infoDiv.append($('<label></label>').attr('for','slideLink'+slideId).html('Link'));
		infoDiv.append($('<input/>').attr('type','text').attr('id', 'slideLink'+slideId).attr('name','invent-slider-links[]'))

			var slideColor = $('<label></label>').attr('for','invent-slidebgcolor'+slideId+'-cpicker-preview').addClass('invent-slide-bglabel');
			slideColor.append($('<p></p>').html('Slide background color'));
				var icon = $('<div></div>').addClass('invent-icon-container').append($('<div></div>').attr('id','invent-slidebgcolor'+slideId+'-cpicker-preview').addClass('invent-cpicker-preview'));
			slideColor.append(icon);
			slideColor.append($('<input/>').addClass('invent-slidebg').attr('type','hidden').attr('id','invent-slidebgcolor'+slideId).attr('name','invent-slider-bgcolors[]').val('#ffffff'));

		infoDiv.append(slideColor);

		li.append(infoDiv);

		var removeDiv = $('<div></div>').addClass('invent-slide-remove');
		removeDiv.html('Remove image from slider').prepend($('<div></div>').addClass('icon'));
		li.append(removeDiv);

		li.append($('<input/>').attr('type','hidden').attr('name', 'invent-slider[]').attr('id','invent-slide'+slideId+'-hidden').attr('value',url));

		$('#invent-slides').append(li);
		initColorPicker('#invent-slidebgcolor'+slideId, '#invent-slidebgcolor'+slideId+'-cpicker-preview','#invent-slidebgcolor'+slideId+'-cpicker-preview');

	}

jQuery(document).ready(function($){

	Cufon.replace('.invent-settings-row>label, .invent-help h3, .invent-help h4');

	initSlideButtons($);

	$("#invent-slides").sortable({
		handle: '.invent-slide-handle'
	});

	$('#invent-social-items').sortable({
		handle: '.invent-handler'
	});
	
	$('.invent-submit').click(function(){
		$('.invent-input-text').removeAttr('disabled');

		$(this).parents('form').submit();
		return false;
	});

	/* bg colors for slides*/
	$('.invent-slidebg').each(function(){
		initColorPicker('#'+$(this).attr('id'),'#'+$(this).attr('id')+'-cpicker-preview','#'+$(this).attr('id')+'-cpicker-preview');
	});

	$('.invent-checkbox, .invent-radio, .invent-80x80-container').each(function(){
		if($('input', this).attr('checked'))
			$(this).addClass('selected');
	});

	$('#invent-social-items .invent-checkbox').each(function(){
		if(!$('input', this).attr('checked'))
			$('.invent-input-text', $(this).parent()).attr('disabled', true).addClass('disabled');
	});


	$('.invent-checkbox').click(function(){
		
		if($(this).hasClass('selected'))
		{
			if(!$.browser.msie || $.browser.version=='9.0')
				$('.invent-input-onoff', this).stop().animate({'background-position': '-40px 0'}, 300);
			$(this).removeClass('selected');
			$('input', this).attr('checked', false);
		}
		else
		{
			if(!$.browser.msie || $.browser.version=='9.0')
				$('.invent-input-onoff', this).stop().animate({'background-position': '0px 0px'}, 300);
			$(this).addClass('selected');
			$('input', this).attr('checked', true);
		}
	});

	/* social items */
	$('#invent-social-items .invent-checkbox').click(function(){
		if($(this).hasClass('selected'))
		{
			$('.invent-input-text', $(this).parent()).attr('disabled', false).removeClass('disabled');
		}
		else
		{
			$('.invent-input-text', $(this).parent()).attr('disabled', true).addClass('disabled');
		}
	});

	$('.invent-80x80-container').click(function(){
		if(!$(this).hasClass('selected'))
		{
			$(this).addClass('selected');

			var name = $('input', this).attr('name');
			var div = $('input[name='+name+']').not($('input',this)).parent();

			$(div).removeClass('selected');

			$('input', this).attr('checked', true);
		}
	});


	$('.invent-radio').click(function(){
		if(!$(this).hasClass('selected'))
		{
			var container = this;
			if(!$.browser.msie || $.browser.version=='9.0')
				$('.invent-input-onoff', this).stop().animate({'background-position': '0px 0px'}, 300);
			$(container).addClass('selected');

			var name = $('input', container).attr('name');
			var div = $('input[name='+name+']').not($('input',container)).parent();
			if(!$.browser.msie || $.browser.version=='9.0')
				$('.invent-input-onoff',div).stop().animate({'background-position': '-40px 0'}, 300);
				div.removeClass('selected');

			$('input', container).attr('checked', true);
		}
	});

	initSlider('#invent-slider-piecemaker-ttime', '#invent-slider-piecemaker-time', 's', 0.1, 5, 0.1);
	initSlider('#invent-slider-piecemaker-number-of-slices', '#invent-slider-piecemaker-slices', '', 2, 25, 1);
	initSlider('#invent-slider-piecemaker-ptime', '#invent-slider-piecemaker-pause-time', 's', 1, 10, 0.5);
	initSlider('#invent-slider-piecemaker-field-of-view', '#invent-slider-piecemaker-fov', '', 1, 180, 1);
	initSlider('#invent-slider-piecemaker-depthoffset', '#invent-slider-piecemaker-depth-offset', '', 0, 2000, 10);
	initSlider('#invent-slider-piecemaker-cubedistance', '#invent-slider-piecemaker-cube-distance', '', 0, 200, 1);
	initSlider('#invent-slider-piecemaker-delay-slider', '#invent-slider-piecemaker-delay', '', 0, 1, 0.1);

	initSlider('#invent-slider-ttime', '#invent-slider-time', 's', 0.1, 5, 0.1);
	initSlider('#invent-slider-number-of-slices', '#invent-slider-slices', '', 2, 25, 1);
	initSlider('#invent-slider-ptime', '#invent-slider-pause-time', 's', 1, 10, 0.5);
	initSlider('#invent-slider-copacity', '#invent-slider-caption-opacity', '%', 1, 100, 1);

	initSlider('#invent-g-h1', '#invent-general-h1', 'px', 12, 48, 1);
	initSlider('#invent-g-h2', '#invent-general-h2', 'px', 12, 48, 1);
	initSlider('#invent-g-h3', '#invent-general-h3', 'px', 12, 48, 1);
	initSlider('#invent-g-h4', '#invent-general-h4', 'px', 12, 48, 1);
	initSlider('#invent-g-h5', '#invent-general-h5', 'px', 12, 48, 1);
	initSlider('#invent-g-h6', '#invent-general-h6', 'px', 12, 48, 1);


	initColorPicker('#invent-slider-caption-color','#invent-slider-caption-color-cpicker-preview','#invent-slider-caption-color-cpicker-preview');
	initColorPicker('#invent-footer-background-color','#invent-footer-background-color-cpicker-preview','#invent-footer-background-color-cpicker-preview');


	initColorPicker('#invent-general-h1-color','#invent-h1-cpicker-preview','#invent-h1-cpicker-preview');
	initColorPicker('#invent-general-h2-color','#invent-h2-cpicker-preview','#invent-h2-cpicker-preview');
	initColorPicker('#invent-general-h3-color','#invent-h3-cpicker-preview','#invent-h3-cpicker-preview');
	initColorPicker('#invent-general-h4-color','#invent-h4-cpicker-preview','#invent-h4-cpicker-preview');
	initColorPicker('#invent-general-h5-color','#invent-h5-cpicker-preview','#invent-h5-cpicker-preview');
	initColorPicker('#invent-general-h6-color','#invent-h6-cpicker-preview','#invent-h6-cpicker-preview');

	if(typeof(contactMap) == 'object')
		contactMap.init();

	$('#invent-import-dummy-data-button').click(function(){
		if($(this).hasClass('disabled')) return false;

		$(this).addClass('disabled').css('cursor', 'default');

		$('#invent-import-dummy-data-loading').fadeIn();


		$.ajax({
			type: 'POST',
			url: $('#invent-import-dummy-data-url').val(),
			data: {
				action: 'invent-import-data'
			},
			success: function(data) {
				$('#invent-import-dummy-data-loading').fadeOut(function(){

					if(data.indexOf('Remote server did not respond')!=-1)
						$('#invent-import-dummy-data-message').html('Remote server did not respond. Please try again later.').css('color','red').fadeIn();
					else
						$('#invent-import-dummy-data-message').fadeIn();
				});
			},
			error: function(xhrObject, textStatus) {

				if(xhrObject.status==500)
					var message = '500 Internal Server Error';
				else
					var message = 'Ops... Something went wrong(Error '+xhrObject.status+')';
				
				$('#invent-import-dummy-data-loading').fadeOut(function(){
					$('#invent-import-dummy-data-message').html(message).css('color','red').fadeIn();
				});
			},
			dataType: 'text json'
		});

	});
});


