
<div class="invent-wrapper">
	<h2><?php _e('Social media settings','invent') ?></h2>
	<form action="options.php" method="post">
	<div class="invent-settings" id="invent-social-items">

		<?php settings_fields('invent-social'); ?>

		<div class="invent-settings-row">
			<label><?php _e('Socials position','invent') ?></label>
			<div>
				<table class="invent-table">
					<tr>
						<td><?php _e('Header','invent') ?></td>
						<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" value="header" name="invent-socials-position" <?php echo (get_option('invent-socials-position')=='header' ? ' checked="checked"' : '') ?> /></div></td>
						<td><?php _e('Footer','invent') ?></td>
						<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" value="footer" name="invent-socials-position" <?php echo (get_option('invent-socials-position')=='footer' ? ' checked="checked"' : '') ?> /></div></td>
						<td><?php _e('Both','invent') ?></td>
						<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" value="both" name="invent-socials-position" <?php echo (get_option('invent-socials-position')=='both' ? ' checked="checked"' : '') ?> /></div></td>
					</tr>
				</table>
			</div>
		</div>
		

		<?php
		$socialData = get_option('invent-socials');
		$socialOnOff = get_option('invent-socials-onoff');
		$socialsNames = get_option('invent-socials-titles');
		$icons = get_option('invent-socials-icons');
		$socials = Array(
			'facebook' => 'Facebook',
			'flickr' => 'Flickr',
			'twitter' => 'Twitter',
			'linkedin' => 'LinkedIn',
			'vimeo' => 'Vimeo',
			'tumblr' => 'Tumblr',
			'email' => 'E-mail',
			'skype' => 'Skype',
			'myspace' => 'Myspace',
			'deviantart' => 'Deviantart',
			'blogger' => 'Blogger',
			'stumbleupon' => 'StumbleUpon',
			'youtube' => 'YouTube',
			'dribbble' => 'Dribbble',
			'behance' => 'Behance',
			'google' => 'Google+',
			'forrst' => 'Forrst',
			'envato' => 'Envato',
			'rss' => 'RSS');

		foreach($socials as $id => $value)
		{
			if(!isset($socialData[$id]))
				$socialData[$id] = '';
		}
		
		foreach($socialData as $id => $value) { ?>
		<?php
		$name = isset($socials[$id]) ? $socials[$id] : (isset($socialsNames[$id]) ? $socialsNames[$id] : '');
		?>
		<div class="invent-settings-row">
			<?php if(!isset($socials[$id])) { ?>

				<input type="hidden" name="invent-socials-icons[<?php echo $id ?>]" value="<?php echo isset($icons[$id]) ? $icons[$id] : '' ?>" />
				<input type="hidden" name="invent-socials-titles[<?php echo $id ?>]" value="<?php echo $name ?>" />


			<?php } ?>
			<label for="invent-<?php echo $id ?>" id="invent-<?php echo $id ?>-label"><?php echo $name ?></label>

			<div>
				<div class="invent-checkbox left"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="checkbox" name="invent-socials-onoff[<?php echo $id ?>]"<?php if(!empty($socialOnOff[$id])) { ?> checked="checked"<?php } ?> /></div>
				<?php if($id=='rss') echo '<br class="clear" /><input type="hidden" name="invent-socials[rss]" value="" />'; else { ?>
				<div class="invent-social-http"><?php if($id!='skype') { ?>http://<?php } ?>&nbsp;</div><input type="text" id="invent-<?php echo $id ?>" name="invent-socials[<?php echo $id ?>]" value="<?php echo $value ?>" class="invent-input-text"/>
				<?php }?>

				<div class="invent-handler"></div>

				<?php if(!isset($socials[$id])) { ?>
				<div class="invent-remove-button"><?php echo __('Remove this profile','invent') ?></div>
				<div class="invent-remove-button-clear"></div>
				<?php } ?>

			</div>
		</div>
		<?php } ?>

		<div id="invent-newsocial-spot"/></div>

	<div class="invent-settings-row">
		<label style="width:600px; height:40px;">Add new social profile</label>
		<div id="invent-newsocial-container">
			<label for="invent=newsocial-name">Social profile name</label>
			<div><input type="text" id="invent-newsocial-name"/></div>

			<label for="invent-newsocial-icon">Social profile icon(32 x 32px)</label>
			<div class="invent-image-upload">
					<input type="text" name="invent-newsocial-icon" id="invent-newsocial-icon" class="invent-image-upload-input invent-input-text" value=""/>
					<a href="#" class="invent-image-upload-button">Click here to upload a new image</a>
			</div>

			<div id="invent-newsocial-submit-container"><a href="#" id="invent-newsocial-submit">Create</a></div>
		</div>
	</div>
	<p class="submit">
	<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> <?php _e('Save Changes','invent') ?></a>
	</p>
	</div>
		
	</form>
</div>