<div class="invent-wrapper">
	<form action="options.php" method="post" id="invent-slides-form">
	<?php settings_fields('invent-slider-nivo'); ?>
	<h2><?php _e('Nivo Slider settings','invent') ?></h2>
	<div class="invent-settings">
		<div class="invent-settings-row">

			<label><?php _e('Transition effects','invent') ?></label>
			<div>
				<?php $x = get_option('invent-slider-effects') ?>
				<?php $effects = Array(
					'sliceDown'=>'Slide Down',
					'sliceDownLeft' => 'Slide Down-Left',
					'sliceUp' => 'Slice Up',
					'sliceUpLeft' => 'Slice Up-Left',
					'sliceUpDown' => 'Slice Up-Down',
					'sliceUpDownLeft' => 'Slice Up-Down-Left',
					'fold' => 'Fold',
					'fade' => 'Fade',
					'random' =>'Random effect'
					);
				?>
				<select name="invent-slider-effects">
					<?php foreach($effects as $key => $effect) { ?>
					<option value="<?php echo $key?>" <?php if($x == $key) { ?> selected="selected"<?php }?>><?php echo $effect ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Slider height','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-sheight" class="invent-slider"></div>
					<div id="invent-slider-sheight-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-height" name="invent-slider-height" value="<?php echo format_to_edit(get_option('invent-slider-height')) ?>" />

			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Transition time','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-ttime" class="invent-slider"></div>
					<div id="invent-slider-ttime-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-time" name="invent-slider-time" value="<?php $x = format_to_edit(get_option('invent-slider-time')); echo ((strlen($x))) ? format_to_edit(get_option('invent-slider-time')) : 1.5 ?>" />
			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Pause time','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-ptime" class="invent-slider"></div>
					<div id="invent-slider-ptime-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-pause-time" name="invent-slider-pause-time" value="<?php echo format_to_edit(get_option('invent-slider-pause-time')) ?>" />
			</div>
		</div>

		<!--div class="invent-settings-row">
			<label>Caption opacity</label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-copacity" class="invent-slider"></div>
					<div id="invent-slider-copacity-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-caption-opacity" name="invent-slider-caption-opacity" value="<?php echo format_to_edit(get_option('invent-slider-caption-opacity')) ?>" />
			</div>
		</div-->

		<div class="invent-settings-row">
			<label><?php _e('Caption color','invent') ?></label>
			<div>
				<div class="invent-icon-container">
					<div id="invent-slider-caption-color-cpicker-preview" class="invent-cpicker-preview"></div>
				</div>
				<input type="hidden" id="invent-slider-caption-color" name="invent-slider-caption-color" value="<?php echo format_to_edit(get_option('invent-slider-caption-color')) ?>" />

				<br class="clear"/>

			</div>
		</div>

	<div class="invent-settings-row">
		<label><?php _e('Control navigation','invent') ?></label>
		<div>
			<div class="invent-checkbox"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="checkbox" name="invent-slider-control-navigation"<?php if(get_option('invent-slider-control-navigation')) { ?> checked="checked"<?php } ?> /></div>
		</div>
	</div>

	<div class="invent-settings-row">
		<label><?php _e('Direction navigation','invent') ?></label>
		<div>
			<div class="invent-checkbox"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="checkbox" name="invent-slider-direction-navigation"<?php if(get_option('invent-slider-direction-navigation')) { ?> checked="checked"<?php } ?> /></div>
		</div>
	</div>

	<div class="invent-settings-row">
		<label><?php _e('Navigation arrows','invent') ?></label>
		<div><input type="hidden" name="invent-slider-arrows" value="<?php echo format_to_edit(get_option('invent-slider-arrows')) ?>" />

						<table class="invent-fontstable">
							<?php
							$arrow = get_option('invent-slider-arrows');
							$arrows = Array(
								'slider-arrows',
								'slider-arrows2',
								'slider-arrows3',
								'slider-arrows4',
								'slider-arrows5',
								'slider-arrows6'
								);

							$i=1;
							foreach($arrows as $a) {
							if($i%4==1)
								echo '<tr>';

							echo '<td><div class="invent-80x80-container"><img src="'.get_template_directory_uri().'/images/arrows/'.$a.'.png" style="width:80px;" alt=""/><input type="radio" name="invent-slider-arrows" value="'.$a.'"'.($a==$arrow ? ' checked="checked"' : '').' /></div></td>';

							if($i%4==0)
								echo '</tr>';

								$i++;
							}
							?>
						</table>
					</div>
	</div>

		<div class="invent-settings-row">
			<label><?php _e('Number of slices','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-number-of-slices" class="invent-slider"></div>
					<div id="invent-slider-number-of-slices-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-slices" name="invent-slider-slices" value="<?php echo format_to_edit(get_option('invent-slider-slices')) ?>" />
			</div>
		</div>

		<p class="submit">
		<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> Save Changes</a>
		</p>
	</div>


	<?php include('sliderTemplate.php'); ?>
	
	</form>
	
</div>