
		<div id="widgets-container" class="nojs<?php if(get_option('invent-general-wrapper-style') == 'narrow') { ?> narrow<?php } ?>">
			<div class="wrapper">

				<div class="column-1-4">
<?php if (is_active_sidebar( 'footer-0-widget-area' ) ) { ?>
						<?php dynamic_sidebar('footer-0-widget-area'); ?>
<?php } ?>
				</div>

				<div class="column-1-4">
<?php if (is_active_sidebar( 'footer-1-widget-area' ) ) { ?>
						<?php dynamic_sidebar('footer-1-widget-area'); ?>
<?php } ?>
				</div>

				<div class="column-1-4">
<?php if (is_active_sidebar( 'footer-2-widget-area' ) ) { ?>
						<?php dynamic_sidebar('footer-2-widget-area'); ?>
<?php } ?>
				</div>

				<div class="column-1-4">
<?php if (is_active_sidebar( 'footer-3-widget-area' ) ) { ?>
						<?php dynamic_sidebar('footer-3-widget-area'); ?>
<?php } ?>
				</div>

				<div class="clear"></div>
			</div>
		</div>

		<div id="scrolltop-container"<?php if(get_option('invent-general-wrapper-style') == 'narrow') { ?> class="narrow"<?php } ?>>
			<div id="scrolltop-left"></div>
			<div id="scrolltop-right">		
<?php
$socialsOnOff = get_option('invent-socials-onoff');
if($socialsOnOff && (get_option('invent-socials-position')=='footer' || get_option('invent-socials-position')=='both')) {
?>
				<p><?php _e('Visit also our social profiles:','invent') ?></p>
<?php } ?>
			</div>
			<a href="#" id="scrolltop" title="Scroll to top">Scroll to top</a>
		</div>

		<div class="wrapper">
			<div id="footer">
				<a href="<?php echo home_url( '/' ); ?>"><?php if(get_option('invent-logo')) { ?><img src="<?php echo get_option('invent-logo') ?>" alt="Invent" /><?php } else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Invent" /><?php } ?></a>
				<?php if( get_option('invent-socials-position')=='footer' || get_option('invent-socials-position')=='both' ) { ?>
					<?php get_template_part('socials'); ?>
				<?php } ?>
				<p><?php echo get_option('invent-copyrightText'); ?></p>
			</div>
		</div>
<?php
	wp_footer();
?>
</body>
</html>