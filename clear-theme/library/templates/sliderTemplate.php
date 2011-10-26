	<h2><?php _e('Slides','invent') ?></h2>
	<div class="invent-settings">
		<div class="invent-settings-row">
			<ul id="invent-slides">
				
				<?php if(!empty($slides)) foreach($slides as $key => $slideImage) { ?>

				<li>
					<div class="invent-slide-handle"><div class="icon"></div></div>
					<div class="invent-slide-image" id="invent-slide<?php echo $key ?>-preview">
						<a href="<?php echo $slideImage ?>" target="_blank">
							<img src="<?php echo Invent_Admin::getThumbnailPath($slideImage) ?>" alt="" width="125" height="100"/>
						</a>

						<div class="invent-slide-file">
							<input type="file" size="20" class="invent-upload" id="invent-slide<?php echo $key ?>" rel="125x100xcrop" />
							<a href="#"><?php _e('Change image','invent') ?></a>
						</div>
					</div>

					<div class="invent-slide-info">
						<label for="slideTitle<?php echo $key ?>"><?php _e('Title','invent') ?></label><input type="text" id="slideTitle<?php echo $key ?>" name="invent-slider-titles[]" value="<?php echo format_to_edit(isset($sliderTitles[$key]) ? $sliderTitles[$key] : '') ?>" />
						<label for="slideLink<?php echo $key ?>"><?php _e('Link','invent') ?></label><input type="text" id="slideLink<?php echo $key ?>" name="invent-slider-links[]" value="<?php echo format_to_edit(isset($sliderLinks[$key]) ? $sliderLinks[$key] : '') ?>" />

						<label for="invent-slidebgcolor<?php echo $key ?>-cpicker-preview" class="invent-slide-bglabel">
							<p><?php _e('Slide background color','invent') ?></p>
							<div class="invent-icon-container">
								<div id="invent-slidebgcolor<?php echo $key ?>-cpicker-preview" class="invent-cpicker-preview"></div>
							</div>
							<input class="invent-slidebg" type="hidden" id="invent-slidebgcolor<?php echo $key ?>" name="invent-slider-bgcolors[]" value="<?php echo format_to_edit(isset($sliderBgcolors[$key]) ? $sliderBgcolors[$key] : '') ?>" />
						</label>

					</div>


					<div class="invent-slide-remove">
						<div class="icon"></div> <?php _e('Remove image from slider','invent') ?>
					</div>
					<input type="hidden" name="invent-slider[]" id="invent-slide<?php echo $key ?>-hidden" value="<?php echo $slideImage ?>" />

				</li>
				<?php } ?>
			</ul>
		<input type="hidden" id="invent-all-slides" value="<?php echo ($key+1) ?>" />

		</div>
			<div class="submit">
				<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> <?php _e('Save Changes','invent') ?></a>

				<div id="invent-newslide-button-container">
					<a href="#" class="invent-button" id="invent-newslide-button"><span class="invent-button-left"></span><span class="invent-icon invent-icon-newslide"></span> <?php _e('Add new slide','invent') ?></a>
					<input type="file" class="invent-upload" id="invent-newslide-file" rel="125x100xcrop" />
				</div>

			</div>
	</div>