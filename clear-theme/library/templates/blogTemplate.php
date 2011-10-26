
<div class="invent-wrapper">
	<h2><?php _e('Blog settings','invent') ?></h2>
	<form action="options.php" method="post">
	<div class="invent-settings">
		<?php settings_fields('invent-blog'); ?>
		
		<div class="invent-settings-row">
			<label><strong><?php _e('Sidebar position','invent') ?></strong></label>
			
			<?php $value= (int) get_option( 'invent-blog-sidebar-position'); ?>

			<div>

				<table class="invent-fontstable">
				<tr>
					<td>
						<div class="invent-80x80-container"><input id="invent-blog-sidebar-position1" name="invent-blog-sidebar-position" type="radio" value="1" <?php echo ($value == 1 ? ' checked="checked"' : '') ?>/>
						<img src="<?php echo get_template_directory_uri() ?>/library/images/admin/sidebar/left.png" alt="Left" /></div>
					</td>
					<td>
						<div class="invent-80x80-container"><input id="invent-blog-sidebar-position2" name="invent-blog-sidebar-position" type="radio" value="2" <?php echo($value == 2 ? ' checked="checked"' : '') ?>/>
					   <img src="<?php echo get_template_directory_uri() ?>/library/images/admin/sidebar/right.png" alt="Right" /></div>
					</td>
					<td>
						<div class="invent-80x80-container"><input id="invent-blog-sidebar-position3" name="invent-blog-sidebar-position" type="radio" value="3" <?php echo($value == 3 ? ' checked="checked"' : '') ?>/>
						<img src="<?php echo get_template_directory_uri() ?>/library/images/admin/sidebar/no.png" alt="No sidebar" /></div>
					</td>
				</tr>
				</table>

			</div>
		</div>

		<p class="submit">
		<a href="#" class="invent-button invent-submit right"><span class="invent-button-left"></span><span class="invent-icon invent-icon-save"></span> Save Changes</a>
		</p>

	</div>
	</form>
</div>