
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
if($socialsOnOff) {
?>
				<p><?php _e('Visit also our social profiles:','invent') ?></p>
<?php } ?>
			</div>
			<a href="#" id="scrolltop" title="Scroll to top">Scroll to top</a>
		</div>

		<div class="wrapper">
			<div id="footer">
				<a href="<?php echo home_url( '/' ); ?>"><?php if(get_option('invent-logo')) { ?><img src="<?php echo get_option('invent-logo') ?>" alt="Invent" /><?php } else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Invent" /><?php } ?></a>
<?php $socialData = get_option('invent-socials'); ?>
				<ul id="social">
<?php foreach($socialData as $name => $value) {
						if($value && $socialsOnOff && $socialsOnOff[$name]){

							switch($name){
								case 'email':
									$url = 'mailto:'.$value;
									$title = 'E-mail';
									break;
								case 'rss':
									$url = home_url().'/rss/';
									$title = 'RSS';
									break;
								case 'skype':
									$url = 'callto://'.$value;
									$title = 'Skype';
									break;
								default:
									$url = 'http://'.$value;
									$title = ucfirst($name);
									break;
							/*	case 'twitter':
									$url = 'http://twitter.com/'.$value;
									break;
								case 'facebook':
									$url = 'http://www.facebook.com/'.$value;
									break;
								case 'flickr':
									$url = 'http://www.flickr.com/people/'.$value;
									break;
								case 'tumblr':
									$url = 'http://'.$value.'.tumblr.com';
									break;
								case 'wordpress':
									$url = 'http://'.$value.'.wordpress.com';
									break;
								case 'vimeo':
									$url = 'http://vimeo.com/'.$value;
									break;
								case 'linkedin':
									$url = 'http://linkedin.com/in/'.$value;
									break;
								case 'blogger':
									$url = 'http://'.$value.'.blogspot.com';
									break;
								case 'youtube':
									$url = 'http://youtube.com/user/'.$value;
									break;
								case 'stumbleupon';
									$url = 'http://stumbleupon.com/'.$value;
									break;
								case 'myspace':
									$url = 'http://myspace.com/'.$value;
									break;
							 */
								if($title == 'Youtube') $title = 'YouTube';
								elseif($title == 'Linkedin') $title = 'LinkedIn';
								elseif($title == 'Myspace') $title = 'MySpace';
								elseif($title == 'Stumbleupon') $title = 'StumbleUpon';
							} ?>
					<li><a href="<?php echo $url ?>" title="<?php echo $title ?>"><span><img src="<?php echo get_template_directory_uri(); ?>/images/social/<?php echo $name ?>.png" alt="Twitter" /></span></a></li>
<?php }} ?>
				</ul>

				<p><?php echo get_option('invent-copyrightText'); ?></p>
			</div>
		</div>

<?php
	if(get_option('invent-analytics'))
		echo get_option('invent-analytics');
 ?>
<?php
	wp_footer();
?>
</body>
</html>