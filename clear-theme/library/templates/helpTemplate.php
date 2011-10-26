
<div class="invent-wrapper">
	<h2><?php _e('Clear Theme','invent') ?></h2>
		
		<div class="invent-settings-row invent-help">

			<h3><?php _e('Thank you for purchasing our theme!','invent') ?></h3>

			<h4><?php _e('If you have any questions or problems, please read the documentation to find a solution or contact us, so that we could help you.','invent') ?></h4>


			<div class="invent-panel-box first">
				<img src="<?php echo get_template_directory_uri() ?>/library/images/icons/help.png" alt="<?php _e('Documentation','invent') ?>" />
				<h4><?php _e('Documentation','invent') ?></h4>
				<div class="invent-description">
					<p><a href="http://invent-themes.com/docs/clear-theme-en/"><?php _e('View documentation','invent') ?></a></p>
					<p><?php _e('Everything you should know about your theme...','invent') ?></p>
				</div>
			</div>

			<div class="invent-panel-box">
				<img src="<?php echo get_template_directory_uri() ?>/library/images/icons/envelope.png" alt="<?php _e('Contact us','invent') ?>" />
				<h4><?php _e('Contact us!','invent') ?></h4>
				<div class="invent-description">
					<p><a href="mailto:support@invent-themes.com"><?php _e('support@invent-themes.com','invent') ?></a></p>
					<p><?php _e('Just write an e-mail and we will contact you immediately!','invent') ?></p>
				</div>
			</div>

			<div class="invent-panel-box">
				<img src="<?php echo get_template_directory_uri() ?>/library/images/icons/screen.png" alt="<?php _e('Visit our site','invent') ?>" />
				<h4><?php _e('Visit our site','invent') ?></h4>
				<div class="invent-description">
					<p><?php _e('<a href="http://invent-themes.com">Invent-themes.com</a>','invent') ?></p>
					<p><?php _e('Visit invent-themes.com and check out our other works.','invent') ?></p>
				</div>
			</div>
			
			<div class="invent-panel-box invent-panel-box-wide">
				<h4><?php _e('Import dummy data', 'invent') ?></h4>
				<p><?php _e('So as to present all priceless possibilities of the Clear Theme we have prepared a demonstration content. These are articles, posts, static pages etc. which will help you to understand the main idea of how do our shortcodes work.','invent') ?></p>
				<p><strong><?php _e('ATTENTION:  The installation of the demonstration content on the website which has already articles, posts, etc. is not recommended. It can damage the website.','invent') ?></strong></p>
					<?php if($writable) { ?>
					<p>
					<input type="hidden" id="invent-import-dummy-data-url" value="<?php echo admin_url("admin-ajax.php"); ?>" />
					<a href="#" class="invent-button invent-submit" style="margin:0 5px 20px 5px;" id="invent-import-dummy-data-button"><span class="invent-button-left"></span> <?php _e('Import dummy data','invent') ?></a>
					<span id="invent-import-dummy-data-message">Dummy data have been imported</span>
					<span id="invent-import-dummy-data-loading"><img src="<?php echo get_template_directory_uri() ?>/library/images/loading.gif" alt="Loading" />Please wait. Downloading images. It can take a few minutes... [<span id="dummy-data-percent">0</span>%]</span>
					</p>
					<?php } else { ?>
					<p style="color:red">
					Upload dir is NOT writable! Change permissions to import Dummy Data. Read more about changing permissions <a href="http://codex.wordpress.org/Changing_File_Permissions#Using_an_FTP_Client">here</a>.
					</p>
					<?php } ?>
			</div>

		</div>
</div>