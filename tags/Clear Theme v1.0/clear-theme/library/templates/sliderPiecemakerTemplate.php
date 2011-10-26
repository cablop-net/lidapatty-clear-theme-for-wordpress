<div class="invent-wrapper" id="invent-slider-piecemaker-settings">
	<form action="options.php" method="post" id="invent-slides-form">
	<?php settings_fields('invent-slider-piecemaker'); ?>
	<h2><?php _e('Piecemaker Slider settings','invent') ?></h2>
	<div class="invent-settings">
		<div class="invent-settings-row">

			<label><?php _e('Easing type','invent') ?></label>
			<div>
				<?php $x = get_option('invent-slider-piecemaker-effects') ?>
				<?php $effects = Array(
					'easeInOutSine'=>'easeInOutSine',
					'easeInQuad' => 'easeInQuad',
					'easeInOutCubic' => 'easeInOutCubic',
					'easeInOutQuart' => 'easeInOutQuart',
					'easeInOutQuint' => 'easeInOutQuint',
					'easeInOutExpo' => 'easeInOutExpo',
					'easeInOutCirc' => 'easeInOutCirc',
					'easeInOutElastic' => 'easeInOutElastic',
					'easeInOutBack' =>'easeInOutBack',
					'easeInOutBounce' =>'easeInOutBounce'
					);
				?>
				<select name="invent-slider-piecemaker-effects">
					<?php foreach($effects as $key => $effect) { ?>
					<option value="<?php echo $key?>" <?php if($x == $key) { ?> selected="selected"<?php }?>><?php echo $effect ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Transition time','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-piecemaker-ttime" class="invent-slider"></div>
					<div id="invent-slider-piecemaker-ttime-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-piecemaker-time" name="invent-slider-piecemaker-time" value="<?php $x = format_to_edit(get_option('invent-slider-piecemaker-time')); echo ((strlen($x))) ? format_to_edit(get_option('invent-slider-piecemaker-time')) : 1.5 ?>" />
			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Pause time','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-piecemaker-ptime" class="invent-slider"></div>
					<div id="invent-slider-piecemaker-ptime-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-piecemaker-pause-time" name="invent-slider-piecemaker-pause-time" value="<?php echo format_to_edit(get_option('invent-slider-piecemaker-pause-time')) ?>" />
			</div>
		</div>

	<!--div class="invent-settings-row">
		<label>Control navigation</label>
		<div>
			<div class="invent-checkbox"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="checkbox" name="invent-slider-control-navigation"<?php if(get_option('invent-slider-control-navigation')) { ?> checked="checked"<?php } ?> /></div>

		</div>
	</div>

	<div class="invent-settings-row">
		<label>Direction navigation</label>
		<div>
			<div class="invent-checkbox"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="checkbox" name="invent-slider-direction-navigation"<?php if(get_option('invent-slider-direction-navigation')) { ?> checked="checked"<?php } ?> /></div>

		</div>
	</div-->

	

		<div class="invent-settings-row">
			<label><?php _e('Number of slices','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-piecemaker-number-of-slices" class="invent-slider"></div>
					<div id="invent-slider-piecemaker-number-of-slices-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-piecemaker-slices" name="invent-slider-piecemaker-slices" value="<?php echo format_to_edit(get_option('invent-slider-piecemaker-slices')) ?>" />
			</div>
		</div>



		<div class="invent-settings-row">
			<label><?php _e('Field of view','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-piecemaker-field-of-view" class="invent-slider"></div>
					<div id="invent-slider-piecemaker-field-of-view-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-piecemaker-fov" name="invent-slider-piecemaker-fov" value="<?php echo format_to_edit(get_option('invent-slider-piecemaker-fov')) ?>" />
			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Depth offset','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-piecemaker-depthoffset" class="invent-slider"></div>
					<div id="invent-slider-piecemaker-depthoffset-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-piecemaker-depth-offset" name="invent-slider-piecemaker-depth-offset" value="<?php echo format_to_edit(get_option('invent-slider-piecemaker-depth-offset')) ?>" />
			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Cube distance','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-piecemaker-cubedistance" class="invent-slider"></div>
					<div id="invent-slider-piecemaker-cubedistance-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-piecemaker-cube-distance" name="invent-slider-piecemaker-cube-distance" value="<?php echo format_to_edit(get_option('invent-slider-piecemaker-cube-distance')) ?>" />
			</div>
		</div>

		<div class="invent-settings-row">
			<label><?php _e('Delay','invent') ?></label>
			<div>
				<div class="invent-slider-container">
					<div id="invent-slider-piecemaker-delay-slider" class="invent-slider"></div>
					<div id="invent-slider-piecemaker-delay-slider-value" class="invent-slider-value"></div>
				</div>
				<input type="hidden" id="invent-slider-piecemaker-delay" name="invent-slider-piecemaker-delay" value="<?php echo format_to_edit(get_option('invent-slider-piecemaker-delay')) ?>" />
			</div>
		</div>
	
		<p class="submit">
		<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> <?php _e('Save Changes','invent') ?></a>
		</p>
	</div>

<?php
$piecemaker = true;
include('sliderTemplate.php');
?>
	
	</form>
	
</div>
