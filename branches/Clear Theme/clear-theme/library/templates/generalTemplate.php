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

		<div class="invent-settings-row">
			<label><strong><?php _e('Navigation color','invent') ?></strong></label>

			<?php $value = (int) get_option('invent-nav-type'); if(!$value) $value = 1; ?>

			<div>

				<table class="invent-fontstable">
				<tr>
					<?php $i=1; ?>
					<?php while(file_exists(TEMPLATEPATH.'/images/nav/'.$i.'.png')) { ?>
					<td>
						<div class="invent-80x80-container"><input id="invent-nav-type<?php echo $i ?>" name="invent-nav-type" type="radio" value="<?php echo $i ?>" <?php echo ($value == $i ? ' checked="checked"' : '') ?>/>
						<img src="<?php echo get_template_directory_uri() ?>/images/nav/<?php echo $i ?>p.jpg" alt="" /></div>
					</td>
					<?php
						if($i%4==0) echo '</tr><tr>';
						++$i;
					 }
					 ?>

				</tr>
				</table>

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

							<td colspan="2">
<?php $googleFonts = Array(
'Alconia',
'Allan:bold',
'Allerta',
'Allerta+Stencil',
'Amaranth',
'Annie+Use+Your+Telescope',
'Anonymous+Pro',
'Anton',
'Architects+Daughter',
'Arimo',
'Artifika',
'Arvo',
'Astloch',
'Bangers',
'Bentham',
'Bevan',
'Bigshot+One',
'Brawler',
'Buda:light',
'Cabin',
'Cabin+Sketch:bold',
'Calligraffitti',
'Candal',
'Cantarell',
'Cardo',
'Carter+One',
'Caudex',
'Cedarville+Cursive',
'Cherry+Cream+Soda',
'Chewy',
'Coda:800',
'Coda+Caption:800',
'Coming+Soon',
'Corben:bold',
'Cousine',
'Crafty+Girls',
'Crushed',
'Cuprum',
'Damion',
'Dancing+Script',
'Dawning+of+a+New+Day',
'Didact+Gothic',
'Droid+Sans',
'Droid+Sans+Mono',
'Droid+Serif',
'EB+Garamond',
'Expletus+Sans',
'Fontdiner+Swanky',
'Forum',
'Francois+One',
'Geo',
'Goblin+One',
'Goudy+Bookletter+1911',
'Gravitas+One',
'Gruppo',
'Hammersmith+One',
'Holtwood+One+SC',
'Homemade+Apple',
'IM+Fell+French+Canon',
'Inconsolata',
'Indie+Flower',
'Irish+Grover',
'Josefin+Sans',
'Josefin+Slab',
'Judson',
'Jura',
'Just+Another+Hand',
'Just+Me+Again+Down+Here',
'Kameron',
'Kenia',
'Kranky',
'Kreon',
'Kristi',
'Lato',
'League+Script',
'Lekton',
'Limelight',
'Lobster',
'Lobster+Two',
'Lora',
'Love+Ya+Like+A+Sister',
'Loved+by+the+King',
'Luckiest+Guy',
'Maiden+Orange',
'Mako',
'Maven+Pro',
'Meddon',
'MedievalSharp',
'Megrim',
'Merriweather',
'Metrophobic',
'Michroma',
'Miltonian',
'Miltonian+Tattoo',
'Molengo',
'Monofett',
'Mountains+of+Christmas',
'Muli',
'Neucha',
'Neuton',
'News+Cycle',
'Nobile',
'Nova+Square',
'Nova+Round',
'Nova+Script',
'Nova+Cut',
'Nova+Oval',
'Nova+Slim',
'Nova+Flat',
'Nova+Mono',
'OFL+Sorts+Mill+Goudy+TT',
'Old+Standard+TT',
'Open+Sans',
'Orbitron',
'Oswald',
'Over+the+Rainbow',
'PT+Sans',
'PT+Sans+Caption',
'PT+Sans+Narrow',
'PT+Serif',
'PT+Serif+Caption',
'Pacifico',
'Patrick+Hand',
'Paytone+One',
'Permanent+Marker',
'Philosopher',
'Play',
'Playfair+Display',
'Podkova',
'Puritan',
'Quattrocento',
'Quattrocento+Sans',
'Radley',
'Raleway:100',
'Redressed',
'Reenie+Beanie',
'Rock+Salt',
'Rokkitt',
'Ruslan+Display',
'Schoolbell',
'Shadows+Into+Light',
'Shanti',
'Sigmar+One',
'Six+Caps',
'Slackey',
'Smythe',
'Sniglet:800',
'Special+Elite',
'Stardos+Stencil',
'Sue+Ellen+Francisco',
'Sunshiney',
'Swanky+and+Moo+Moo',
'Syncopate',
'Tangerine',
'Tenor+Sans',
'Terminal+Dosis+Light',
'The+Girl+Next+Door',
'Tinos',
'Ubuntu',
'Ultra',
'UnifrakturCook:bold',
'UnifrakturMaguntia',
'Unkempt',
'VT323',
'Varela',
'Vibur',
'Vollkorn',
'Waiting+for+the+Sunrise',
'Wallpoet',
'Walter+Turncoat',
'Wire+One',
'Yanone+Kaffeesatz',
'Zeyada');
?>
<label for="invent-google-font" style="padding:5px 0 0 40px;"><?php _e('Google fonts', 'invent') ?></label>
<select id="invent-google-font" name="invent-heading-font">
	<option value="arial"><?php _e('None','invent'); ?></option>
<?php foreach($googleFonts as $font) {
	$fontFace = str_replace('+', ' ', $font);
	if(false!==($p = strpos($fontFace, ':')))
			$fontFace = substr($fontFace, 0, $p);

echo '<option value="'.$font.'"'.($font == get_option('invent-heading-font') ? ' selected="selected"' : '').'>'.$fontFace.'</option>';

}
?>
</select></td>
						</table>


					</div>
				</div>

<?php
	$navFont = get_option('invent-nav-font');
	$cufonFonts = Array(
		'andika-basic' => 'Andika Basic',
		'bebas-neue',
		'comfortaa-regular',
		'comfortaa-thin',
		'diavlo-book',
		'diavlo-light',
		'droid-sans',
		'fertigo-pro',
		'inconsolata',
		'josefin-sans-std',
		'lobster',
		'molengo',
		'museo-sans',
		'sansation-light' => 'Sansation Light',
		'sansation-regular' => 'Sansation Regular',
		'vegur-light' => 'Vegur Light',
		'vollkorn' => 'Vollkorn',
		'yanone-regular' => 'Yanone Kaffeesatz',
		'yanone-thin' => 'Yanone Regular'
	);
?>
			<div class="invent-settings-row">
				<label for="invent-nav-font"><?php echo __('Top menu font','invent'); ?></label>
				<div>
					<select id="invent-nav-font" name="invent-nav-font">
					<optgroup label="Cufon fonts">
						<option value="cufon-andika-basic"<?php if($navFont=='cufon-andika-basic') echo ' selected="selected"'; ?>>Andika</option>
						<option value="cufon-bebas-neue"<?php if($navFont=='cufon-bebas-neue') echo ' selected="selected"'; ?>>Bebas Neue</option>
						<option value="cufon-comfortaa-thin"<?php if($navFont=='cufon-comfortaa-thin') echo ' selected="selected"'; ?>>Comfortaa</option>
						<option value="cufon-comfortaa-regular"<?php if($navFont=='cufon-comfortaa-regular') echo ' selected="selected"'; ?>>Comfortaa</option>
						<option value="cufon-diavlo-light"<?php if($navFont=='cufon-diavlo-light') echo ' selected="selected"'; ?>>Diavlo Light</option>
						<option value="cufon-diavlo-book"<?php if($navFont=='cufon-diablo-book') echo ' selected="selected"'; ?>>Diavlo Book</option>
						<option value="cufon-droid-sans"<?php if($navFont=='cufon-droid-sans') echo ' selected="selected"'; ?>>Droid Sans</option>
						<option value="cufon-fertigo-pro"<?php if($navFont=='cufon-fertigo-pro') echo ' selected="selected"'; ?>>Fertigo Pro</option>
						<option value="cufon-inconsolata"<?php if($navFont=='cufon-inconsolata') echo ' selected="selected"'; ?>>Inconsolata</option>
						<option value="cufon-josefin-sans-std"<?php if($navFont=='cufon-josefin-sans-std') echo ' selected="selected"'; ?>>Josefin Sans Std</option>
						<option value="cufon-lobster"<?php if($navFont=='cufon-lobster') echo ' selected="selected"'; ?>>Lobster</option>
						<option value="cufon-molengo"<?php if($navFont=='cufon-molengo') echo ' selected="selected"'; ?>>Molengo</option>
						<option value="cufon-museo-sans"<?php if($navFont=='cufon-museo-sans') echo ' selected="selected"'; ?>>Museo Sans</option>
						<option value="cufon-sansation-light"<?php if($navFont=='cufon-sansation-light') echo ' selected="selected"'; ?>>Sansation</option>
						<option value="cufon-sansation-regular"<?php if($navFont=='cufon-sansation-regular') echo ' selected="selected"'; ?>>Sansation</option>
						<option value="cufon-vegur-light"<?php if($navFont=='cufon-vegur-light') echo ' selected="selected"'; ?>>Vegur</option>
						<option value="cufon-vollkorn"<?php if($navFont=='cufon-vollkorn') echo ' selected="selected"'; ?>>Vollkorn Regular</option>
						<option value="cufon-yanone-thin"<?php if($navFont=='cufon-yanone-thin') echo ' selected="selected"'; ?>>Yanone Kaffeesatz</option>
						<option value="cufon-yanone-regular"<?php if($navFont=='cufon-yanone-regular') echo ' selected="selected"'; ?>>Yanone Regular</option>
					</optgroup>
					<optgroup label="Google fonts">
					<?php foreach($googleFonts as $font) {
						$fontFace = str_replace('+', ' ', $font);
						if(false!==($p = strpos($fontFace, ':')))
								$fontFace = substr($fontFace, 0, $p);

					echo '<option value="'.$font.'"'.($font == $navFont ? ' selected="selected"' : '').'>'.$fontFace.'</option>';

					}
					?>
					</optgroup>
					</select>
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