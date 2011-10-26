<div class="invent-wrapper">
	<h2><?php _e('General settings','invent') ?></h2>
	<form action="options.php" method="post">
		<div class="invent-settings">
<?php
	settings_fields('invent-general');
?>
			<div class="invent-settings-row">
				<label><?php _e('H1 Font','invent') ?></label>
				<div>
					<div class="invent-slider-container left">
						<div id="invent-g-h1" class="invent-slider"></div>
						<div id="invent-g-h1-value" class="invent-slider-value"></div>
					</div>
					<input type="hidden" id="invent-general-h1" name="invent-general-h1" value="<?php echo format_to_edit(get_option('invent-general-h1')) ?>" />
					<div class="invent-icon-container"><div id="invent-h1-cpicker-preview" class="invent-cpicker-preview"></div></div>
					<input type="hidden" id="invent-general-h1-color" name="invent-general-h1-color" value="<?php echo format_to_edit(get_option('invent-general-h1-color')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('H2 Font','invent') ?></label>
				<div>
					<div class="invent-slider-container left">
						<div id="invent-g-h2" class="invent-slider"></div>
						<div id="invent-g-h2-value" class="invent-slider-value"></div>
					</div>
					<input type="hidden" id="invent-general-h2" name="invent-general-h2" value="<?php echo format_to_edit(get_option('invent-general-h2')) ?>" />
					<div class="invent-icon-container"><div id="invent-h2-cpicker-preview" class="invent-cpicker-preview"></div></div>
					<input type="hidden" id="invent-general-h2-color" name="invent-general-h2-color" value="<?php echo format_to_edit(get_option('invent-general-h2-color')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('H3 Font','invent') ?></label>
				<div>
					<div class="invent-slider-container left">
						<div id="invent-g-h3" class="invent-slider"></div>
						<div id="invent-g-h3-value" class="invent-slider-value"></div>
					</div>
					<input type="hidden" id="invent-general-h3" name="invent-general-h3" value="<?php echo format_to_edit(get_option('invent-general-h3')) ?>" />
					<div class="invent-icon-container"><div id="invent-h3-cpicker-preview" class="invent-cpicker-preview"></div></div>
					<input type="hidden" id="invent-general-h3-color" name="invent-general-h3-color" value="<?php echo format_to_edit(get_option('invent-general-h3-color')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('H4 Font','invent') ?></label>
				<div>
					<div class="invent-slider-container left">
						<div id="invent-g-h4" class="invent-slider"></div>
						<div id="invent-g-h4-value" class="invent-slider-value"></div>
					</div>
					<input type="hidden" id="invent-general-h4" name="invent-general-h4" value="<?php echo format_to_edit(get_option('invent-general-h4')) ?>" />
					<div class="invent-icon-container"><div id="invent-h4-cpicker-preview" class="invent-cpicker-preview"></div></div>
					<input type="hidden" id="invent-general-h4-color" name="invent-general-h4-color" value="<?php echo format_to_edit(get_option('invent-general-h4-color')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('H5 Font','invent') ?></label>
				<div>
					<div class="invent-slider-container left">
						<div id="invent-g-h5" class="invent-slider"></div>
						<div id="invent-g-h5-value" class="invent-slider-value"></div>
					</div>
					<input type="hidden" id="invent-general-h5" name="invent-general-h5" value="<?php echo format_to_edit(get_option('invent-general-h5')) ?>" />
					<div class="invent-icon-container"><div id="invent-h5-cpicker-preview" class="invent-cpicker-preview"></div></div>
					<input type="hidden" id="invent-general-h5-color" name="invent-general-h5-color" value="<?php echo format_to_edit(get_option('invent-general-h5-color')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('H6 Font','invent') ?></label>
				<div>
					<div class="invent-slider-container left">
						<div id="invent-g-h6" class="invent-slider"></div>
						<div id="invent-g-h6-value" class="invent-slider-value"></div>
					</div>
					<input type="hidden" id="invent-general-h6" name="invent-general-h6" value="<?php echo format_to_edit(get_option('invent-general-h6')) ?>" />
					<div class="invent-icon-container"><div id="invent-h6-cpicker-preview" class="invent-cpicker-preview"></div></div>
					<input type="hidden" id="invent-general-h6-color" name="invent-general-h6-color" value="<?php echo format_to_edit(get_option('invent-general-h6-color')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('Top menu font size','invent') ?></label>
				<div>
					<div class="invent-slider-container left">
						<div id="invent-g-nav-font-size" class="invent-slider"></div>
						<div id="invent-g-nav-font-size-value" class="invent-slider-value"></div>
					</div>
					<input type="hidden" id="invent-general-nav-font-size" name="invent-general-nav-font-size" value="<?php echo format_to_edit(get_option('invent-general-nav-font-size')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('Slider on home page','invent') ?></label>
				<div>
					<table class="invent-table">
						<tr>
							<td><?php _e('None','invent') ?></td>
							<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" value="0" name="invent-slider-type" <?php echo (get_option('invent-slider-type')=='0' ? ' checked="checked"' : '') ?> /></div></td>
							<td><?php _e('Nivo','invent') ?></td>
							<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" value="1" name="invent-slider-type" <?php echo (get_option('invent-slider-type')=='1' ? ' checked="checked"' : '') ?> /></div></td>
							<td><?php _e('Piecemaker 2', 'invent') ?></td>
							<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" value="2" name="invent-slider-type" <?php echo (get_option('invent-slider-type')=='2' ? ' checked="checked"' : '') ?> /></div></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('Website style','invent') ?></label>
				<div>
					<table class="invent-table">
						<tr>
							<td><?php _e('Wide','invent') ?></td>
							<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" name="invent-general-wrapper-style" value="wide"<?php echo (get_option('invent-general-wrapper-style')=='wide' ? ' checked="checked"' : '') ?> /></div></td>
							<td><?php _e('Narrow','invent') ?></td>
							<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" name="invent-general-wrapper-style" value="narrow"<?php echo (get_option('invent-general-wrapper-style')=='narrow' ? ' checked="checked"' : '') ?> /></div></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="invent-settings-row">
				<label><?php _e('Footer background color','invent') ?></label>
				<div>
					<div class="invent-icon-container">
						<div id="invent-footer-background-color-cpicker-preview" class="invent-cpicker-preview"></div>
					</div>
					<input type="hidden" id="invent-footer-background-color" name="invent-footer-background-color" value="<?php echo format_to_edit(get_option('invent-footer-background-color')) ?>" />
					<br class="clear"/>
				</div>
			</div>
			<div class="invent-settings-row">
				<label for="invent-copyrightText"><?php _e('Copyright text','invent') ?></label>
				<div><input type="text" id="invent-copyrightText" name="invent-copyrightText" value="<?php echo format_to_edit( get_option( 'invent-copyrightText')) ?>" class="invent-input-text"/></div>
			</div>
			<div class="invent-settings-row">
				<label for="invent-gallery-allCategoryTitle"><?php _e('Gallery "All" category title','invent') ?></label>
				<div><input type="text" id="invent-gallery-allCategoryTitle" name="invent-gallery-allCategoryTitle" value="<?php echo format_to_edit( get_option( 'invent-gallery-allCategoryTitle')) ?>" class="invent-input-text"/></div>
			</div>
			<div class="invent-settings-row">
				<label for="invent-analytics"><?php _e('Google analytics','invent') ?></label>
				<div><textarea id="invent-analytics" name="invent-analytics" rows="5" cols="30" class="invent-textarea"><?php echo format_to_edit( get_option( 'invent-analytics'),true) ?></textarea></div>
			</div>
			<p class="submit">
				<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> <?php _e('Save Changes','invent') ?></a>
			</p>
		</div>
	</form>
</div>