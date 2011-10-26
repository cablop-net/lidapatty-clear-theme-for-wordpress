<div class="invent-wrapper">
	<h2><?php _e('General settings','invent') ?></h2>
	<form action="options.php" method="post">
		<div class="invent-settings">
			<?php settings_fields('invent-general'); ?>

			<div class="invent-settings-row">
					<label><?php _e('H1 Font','invent') ?></label>
					<div>
						<div class="invent-slider-container left">
							<div id="invent-g-h1" class="invent-slider"></div>
							<div id="invent-g-h1-value" class="invent-slider-value"></div>
						</div>
						<input type="hidden" id="invent-general-h1" name="invent-general-h1" value="<?php echo format_to_edit(get_option('invent-general-h1')) ?>" />

<!--						<a href="#" class="color-picker-icon" id="invent-h1-cpicker"></a>-->
						<div class="invent-icon-container"><div id="invent-h1-cpicker-preview" class="invent-cpicker-preview"></div></div>
						<input type="hidden" id="invent-general-h1-color" name="invent-general-h1-color" value="<?php echo format_to_edit(get_option('invent-general-h1-color')) ?>" />

<!--						<a href="#" class="invent-help-icon"></a>-->
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

<!--						<a href="#" class="color-picker-icon" id="invent-h2-cpicker"></a>-->
						<div class="invent-icon-container"><div id="invent-h2-cpicker-preview" class="invent-cpicker-preview"></div></div>
						<input type="hidden" id="invent-general-h2-color" name="invent-general-h2-color" value="<?php echo format_to_edit(get_option('invent-general-h2-color')) ?>" />

<!--						<a href="#" class="invent-help-icon"></a>-->
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

<!--						<a href="#" class="color-picker-icon" id="invent-h3-cpicker"></a>-->
						<div class="invent-icon-container"><div id="invent-h3-cpicker-preview" class="invent-cpicker-preview"></div></div>
						<input type="hidden" id="invent-general-h3-color" name="invent-general-h3-color" value="<?php echo format_to_edit(get_option('invent-general-h3-color')) ?>" />

<!--						<a href="#" class="invent-help-icon"></a>-->
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

<!--						<a href="#" class="color-picker-icon" id="invent-h4-cpicker"></a>-->
						<div class="invent-icon-container"><div id="invent-h4-cpicker-preview" class="invent-cpicker-preview"></div></div>
						<input type="hidden" id="invent-general-h4-color" name="invent-general-h4-color" value="<?php echo format_to_edit(get_option('invent-general-h4-color')) ?>" />

<!--						<a href="#" class="invent-help-icon"></a>-->
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

<!--						<a href="#" class="color-picker-icon" id="invent-h5-cpicker"></a>-->
						<div class="invent-icon-container"><div id="invent-h5-cpicker-preview" class="invent-cpicker-preview"></div></div>
						<input type="hidden" id="invent-general-h5-color" name="invent-general-h5-color" value="<?php echo format_to_edit(get_option('invent-general-h5-color')) ?>" />

<!--						<a href="#" class="invent-help-icon"></a>-->
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

<!--						<a href="#" class="color-picker-icon" id="invent-h6-cpicker"></a>-->
						<div class="invent-icon-container"><div id="invent-h6-cpicker-preview" class="invent-cpicker-preview"></div></div>
						<input type="hidden" id="invent-general-h6-color" name="invent-general-h6-color" value="<?php echo format_to_edit(get_option('invent-general-h6-color')) ?>" />

<!--						<a href="#" class="invent-help-icon"></a>-->
						<br class="clear"/>

					</div>
				</div>


			<!--div class="invent-settings-row">
					<label>Background</label>
					<div>
						<table class="invent-fontstable">
							<?php
							/*
							$background = get_option('invent-general-background');
							$backgrounds = Array(
								'bg1',
								'bg2'
								);

							$i=1;
							foreach($backgrounds as $b) {
							if($i%4==1)
								echo '<tr>';

							echo '<td><div class="invent-80x80-container"><img src="'.get_template_directory_uri().'/images/backgrounds/'.$b.'.jpg" alt=""/><input type="radio" name="invent-general-background" value="'.$b.'"'.($b==$background ? ' checked="checked"' : '').' /></div></td>';

							if($i%4==0)
								echo '</tr>';

								$i++;
							}
							 */
							?>
						</table>
					</div>
				</div-->

			<div class="invent-settings-row">
				<label for="invent-headingFont"><?php _e('Heading font','invent') ?></label>
					<div>
						<table class="invent-fontstable" id="invent-fontstable">
							<?php
							$font = get_option( 'invent-headingFont');
							$fonts = Array(
'andika-basic', 'bebas-neue','comfortaa-regular','comfortaa-thin','diavlo-book','diavlo-light',
'droid-sans','fertigo-pro','inconsolata','josefin-sans-std',
'lobster','molengo','museo-sans','sansation-light','sansation-regular',
'vegur-light','vollkorn','yanone-regular','yanone-thin');

							$i=1;
							foreach($fonts as $f) {
							if($i%2)
								echo '<tr>';

							echo '<td><img src="'.get_template_directory_uri().'/library/images/admin/fonts/'.$f.'.png" alt="" style="margin-top:2px;"/></td>';
							echo '<td><div class="invent-radio"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="radio" name="invent-headingFont" value="'.$f.'"'.($f==$font ? ' checked="checked"' : '').' /></div></td>';

							if(!$i%2)
								echo '</tr>';

								$i++;
							}
							?>
						</table>
					</div>
				</div>

			<div class="invent-settings-row">
					<label for="invent-favicon"><?php _e('Favicon','invent') ?></label>
					<div>
						<div id="invent-favicon-preview">
							<?php if(get_option('invent-favicon')) { ?>
							<a href="<?php echo get_option('invent-favicon') ?>">
								<?php
										$favicon = get_option('invent-favicon');
										if(substr($favicon,-3) != 'ico')
											$favicon = Invent_Admin::getThumbnailPath($favicon)
								?>
								<img src="<?php echo $favicon ?>" width="16" height="16" alt="<?php _e('Preview', 'invent') ?>" style="float:left; "/>
							</a>
							<?php } ?>
						</div>
						<!--div id="invent-favicon-fileurl" class="invent-upload-url">
								<?php echo format_to_edit(get_option( 'invent-favicon')) ?>
						</div-->
						<input type="file" class="invent-upload" id="invent-favicon" rel="16x16xcrop" />
						<input type="hidden" name="invent-favicon" id="invent-favicon-hidden" value="<?php echo get_option('invent-favicon') ?>" />
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
					<label for="invent-logo"><?php _e('Logo','invent') ?></label>
					<div>
						<div id="invent-logo-preview" class="invent-upload-preview">
							<?php if(get_option('invent-logo')) { ?>
							<div class="invent-80x80-container-nojs left">
								<a href="<?php echo get_option('invent-logo') ?>">
									<img src="<?php echo Invent_Admin::getThumbnailPath(get_option('invent-logo')) ?>" width="80" height="80" alt="<?php _e('Preview','invent') ?>" />
								</a>
							</div>
							<?php } ?>
						</div>
						<input type="file" class="invent-upload" id="invent-logo" rel="80x80xcrop"/>
						<input type="hidden" name="invent-logo" id="invent-logo-hidden" value="<?php echo get_option('invent-logo') ?>"  />
						<br class="clear" />
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
					<label for="invent-analytics"><?php _e('Google analytics','invent') ?></label>
					<div><textarea id="invent-analytics" name="invent-analytics" rows="5" cols="30" class="invent-textarea"><?php echo format_to_edit( get_option( 'invent-analytics'),true) ?></textarea></div>
			</div>

			<p class="submit">
			<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> <?php _e('Save Changes','invent') ?></a>
			</p>
		</div>
	</form>
</div>