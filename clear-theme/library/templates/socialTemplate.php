
<div class="invent-wrapper">
	<h2><?php _e('Social media settings','invent') ?></h2>
	<form action="options.php" method="post">
	<div class="invent-settings" id="invent-social-items">

		<?php settings_fields('invent-social'); ?>

		<?php
		$socialData = get_option('invent-socials');
		$socialOnOff = get_option('invent-socials-onoff');
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
			'rss' => 'RSS');

		foreach($socials as $id => $value)
		{
			if(!isset($socialData[$id]))
				$socialData[$id] = '';
		}
		
		foreach($socialData as $id => $value) { ?>
		<?php $name = $socials[$id]; ?>
		<div class="invent-settings-row">
			<label for="invent-<?php echo $id ?>" id="invent-<?php echo $id ?>-label"><?php echo $name ?></label>

			<div>
				<div class="invent-checkbox left"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="checkbox" name="invent-socials-onoff[<?php echo $id ?>]"<?php if(!empty($socialOnOff[$id])) { ?> checked="checked"<?php } ?> /></div>
				<?php if($id=='rss') echo '<br class="clear" /><input type="hidden" name="invent-socials[rss]" value="" />'; else { ?>
				<div class="invent-social-http" style=""><?php if($id!='skype') { ?>http://<?php } ?>&nbsp;</div><input type="text" id="invent-<?php echo $id ?>" name="invent-socials[<?php echo $id ?>]" value="<?php echo $value ?>" class="invent-input-text"/>
				<?php }?>

				<div class="invent-handler"></div>
			</div>
		</div>
		<?php } ?>


	<p class="submit">
	<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> <?php _e('Save Changes','invent') ?></a>
	</p>
	</div>
		
	</form>
</div>