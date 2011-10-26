<?php
function invent_ajaxupload() {
	global $post;
?>
	<script type="text/javascript">

function init($){
		jQuery('.invent-upload').each(function(){

		var clickedObject = jQuery(this);
		var optionId = jQuery(this).attr('id');
		var thumbnailSize = (typeof(jQuery(this).attr('rel'))!="undefined") ? jQuery(this).attr('rel') : '50x50';

		new AjaxUpload(optionId, {
				action: '<?php echo admin_url("admin-ajax.php"); ?>',
				name: optionId, // File upload name
				data: { // Additional data to send
					action: 'invent_ajax_post_action',
					type: 'upload',
					optionId: optionId,
					size: thumbnailSize
				},
				autoSubmit: true, // Submit file after selection
				responseType: 'json',
				onChange: function(file, extension){
				},
				onSubmit: function(file, extension){

					if (! (extension && /^(jpg|png|jpeg|gif|ico)$/i.test(extension))){
                      // extension is not allowed
                      alert('Please, choose image file');
                      // cancel upload
                      return false;
              		}

				},
				onComplete: function(file, response) {

				if(typeof(response['error'])!='undefined') alert(response['error']);
				else
				{
					if(optionId == 'invent-newslide-file')
					{
						addNewSlide(response['url'], response['thumb']);
						init($);
						initSlideButtons($);
					}
					else
					{
						var img = jQuery('<img />').attr('alt','Preview').attr('src', response['thumb']);
						var link = jQuery('<a></a>').attr('href', response['url']).attr('target', '_blank').append(img);

						jQuery('#'+response['optionId']+'-preview').children('a').remove();
						jQuery('#'+response['optionId']+'-preview').prepend(link);
						jQuery('#'+response['optionId']+'-fileurl').text(response['url']);
						jQuery('#'+response['optionId']+'-hidden').val(response['url']);
					}
				}
				return 0;
				}
			});
	});
}

jQuery(document).ready(function($){
	init($);

});
	</script>
<?php
}
?>