
<div class="invent-wrapper">
	<h2><?php _e('Contact settings','invent') ?></h2>
	<form action="options.php" method="post">
		<div class="invent-settings">
			<?php settings_fields('invent-contact'); ?>


			<div class="invent-settings-row">
					<label for="invent-contact-email"><?php _e('E-mail address','invent') ?></label>
					<div><input type="text" id="invent-contact-email" name="invent-contact-email" value="<?php echo format_to_edit( get_option( 'invent-contact-email')) ?>" class="invent-input-text"/></div>
			</div>

			<!--div class="invent-settings-row">
				<label for="invent-contact-page">Select contact page</label>
				<div><select id="invent-contact-page" name="invent-contact-page">
						<?php
							$actualPage = (int) format_to_edit( get_option( 'invent-contact-page'));
							$pages = get_pages();
							foreach($pages as $page)
							{
								echo '<option value="'.$page->ID.'"'.($page->ID==$actualPage ? ' selected="selected"' : '').'>'.$page->post_title.'</option>';
							}
						?>
						</select>
				</div>
			</div-->

			<div class="invent-settings-row">
					<label for="invent-contact-successMessage"><?php _e('Success message','invent') ?></label>
					<div><textarea id="invent-contact-successMessage" name="invent-contact-successMessage" class="invent-textarea"><?php echo format_to_edit( get_option( 'invent-contact-successMessage')) ?></textarea></div>
			</div>

			<div class="invent-settings-row">
					<label for="invent-contact-errorMessage"><?php _e('Error message', 'invent') ?></label>
					<div><textarea id="invent-contact-errorMessage" name="invent-contact-errorMessage" class="invent-textarea"><?php echo format_to_edit( get_option( 'invent-contact-errorMessage')) ?></textarea></div>
			</div>

			<div id="map-container" class="invent-settings-row">
				<div id="map-canvas"></div>

				<div id="map-no-markers">
					<h3><?php _e('Marker','invent') ?></h3>
					<p><?php _e('Click on the map to create a new marker','invent') ?></p>
				</div>
<?php
	$titles = get_option('invent-markers-title');
	$lat = get_option('invent-markers-lat');
	$lng = get_option('invent-markers-lng');
	$descriptions = get_option('invent-markers-description');
?>
				<div id="map-markers">
					<h3><?php _e('Marker','invnet') ?></h3>
					<input type="hidden" name="invent-map-zoom" id="invent-map-zoom" value="<?php echo get_option('invent-map-zoom') ?>"/>
					<fieldset>
						<label><?php _e('Title','invent') ?></label>
						<input type="text" name="invent-markers-title[]" id="invent-marker-0-title" value="<?php echo format_to_edit( $titles[0] ) ?>"/>
						<label><?php _e('Latitude','invent') ?></label>
						<input type="text" name="invent-markers-lat[]" id="invent-marker-0-lat" value="<?php echo format_to_edit( $lat[0] ) ?>"/>
						<label><?php _e('Longitude','invent') ?></label>
						<input type="text" name="invent-markers-lng[]" id="invent-marker-0-lng" value="<?php echo format_to_edit( $lng[0] ) ?>"/>
						<label><?php _e('Description','invent') ?></label>
						<div><textarea id="invent-marker-0-description" name="invent-markers-description[]" class="invent-textarea"><?php echo format_to_edit( $descriptions[0] ) ?></textarea></div>
					</fieldset>
				</div>
				<div class="clear"></div>
			</div>

			<p class="submit">
				<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> <?php _e('Save Changes','invent') ?></a>
			</p>
		</div>
	</form>
</div>