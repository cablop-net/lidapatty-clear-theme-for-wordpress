<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

	<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ( $site_description  &&  (is_home() || is_front_page()) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );

?>
	</title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php if(get_option('invent-favicon')) { ?>
	<link rel="shortcut icon" type="image/icon" href="<?php echo get_option('invent-favicon') ?>"/>
	<?php } ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/site_old.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/nivo-slider.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/superfish.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/fancybox.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/invent-ui.css" media="all" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="styles/ie9.css"/>
<![endif]-->
<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" media="all"  href="<?php echo get_template_directory_uri(); ?>/styles/ie8.css"/>
	<style type="text/css">
	 #widgets-container .wrapper{
		background:<?php echo get_option('invent-footer-background-color') ?>;
	}
	</style>
<![endif]-->
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" media="all"  href="<?php echo get_template_directory_uri(); ?>/styles/ie7.css"/>
<![endif]-->
<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" media="all"  href="<?php echo get_template_directory_uri(); ?>/styles/ie6.css"/>
<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/Comfortaa_Bold/Comfortaa_Bold.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/Comfortaa_Regular/Comfortaa_Regular.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/Comfortaa_Thin/Comfortaa_Thin.css" media="screen" />
	<style type="text/css">
	
		h1 {color: <?php echo get_option('invent-general-h1-color') ?> ; font-size: <?php echo get_option('invent-general-h1') ?>px}
		
		h2 {color: <?php echo get_option('invent-general-h2-color') ?>; font-size: <?php echo get_option('invent-general-h2') ?>px}
		
		h3 {color: <?php echo get_option('invent-general-h3-color') ?>; font-size: <?php echo get_option('invent-general-h3') ?>px}
		
		h4 {color: <?php echo get_option('invent-general-h4-color') ?>; font-size: <?php echo get_option('invent-general-h4') ?>px}
		
		h5 {color: <?php echo get_option('invent-general-h5-color') ?>; font-size: <?php echo get_option('invent-general-h5') ?>px}
		
		h6 {color: <?php echo get_option('invent-general-h6-color') ?>; font-size: <?php echo get_option('invent-general-h6') ?>px}
		
		.nivo-caption {color: <?php echo get_option('invent-slider-caption-color') ?>;}
		
		.narrow .wrapper, #widgets-container,#scrolltop-right, #scrolltop-container {background-color: <?php echo get_option('invent-footer-background-color') ?>;}

		#nav > li > a, #pages_menu > li > a {
			font-size: <?php echo get_option('invent-general-nav-font-size'); ?>px;
			font-family: 'Comfortaa Regular', arial, sans, serif;
		}
		
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/site.css" media="screen" />

<?php
	wp_head();
?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.8.13.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.quicksand.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-1.3.4.pack.js"></script>

<?php
	if((is_front_page() || 1 == (int) get_post_meta(get_the_ID(), '_invent_show_slider', true)) && get_option('invent-slider-type')) {
		if(get_option('invent-slider-type')=='1') {
?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.nivo.slider.js"></script>
	<script type="text/javascript">
		var inventSliderConfig = {
			effect: '<?php echo get_option('invent-slider-effects') ?>',
			slices:  '<?php echo get_option('invent-slider-slices') ?>',
			animSpeed: '<?php echo get_option('invent-slider-time')*1000 ?>', // transition speed
			pauseTime: '<?php echo get_option('invent-slider-pause-time')*1000 ?>',
			<?php /* captionOpacity: '<?php echo get_option('invent-slider-caption-opacity')/100 ?>', */ ?>
			directionNav: '<?php echo get_option('invent-slider-direction-navigation') ?>',
			controlNav: '<?php echo get_option('invent-slider-control-navigation') ?>',
			bgcolors: <?php echo json_encode(get_option('invent-slider-bgcolors')); ?>
		};
	</script>
<?php
		} else {
?>
	<script type="text/javascript">
		var inventSliderConfig = false;
	</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/swfobject.js"></script>
<?php
		};
	} else {
?>
	<script type="text/javascript">
		var inventSliderConfig = false;
	</script>
<?php
	}
?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/core.js"></script>

	<script type="text/javascript">
<?php
	$titles = get_option('invent-markers-title');
	$descriptions = get_option('invent-markers-description');
	$lat = get_option('invent-markers-lat');
	$lng = get_option('invent-markers-lng');
	$mapConfig = Array();
	$mapConfig['zoom'] = (int) get_option('invent-map-zoom');
	if($mapConfig['zoom']==0) $mapConfig['zoom'] = 5;
	$mapConfig['marker']['lat'] = (float)$lat[0];
	$mapConfig['marker']['lng'] = (float)$lng[0];
	$mapConfig['marker']['title'] = $titles[0];
	$mapConfig['marker']['description'] = $descriptions[0];
?>
		var inventMap = <?php echo json_encode($mapConfig) ?>;
		var THEME_DIR ='<?php echo get_template_directory_uri(); ?>/';
	</script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/map.js"></script>

<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if(get_option('invent-analytics'))
		echo get_option('invent-analytics');
?>

</head>

<body <?php body_class(); ?>>
	<div id="div_header">
		<h1 id="logo">
<?php
	{
		$blog_language = get_bloginfo('language');
		$blog_language = substr($blog_language, 0, 2);
		$append_to_logo_filename = '';
		if ($blog_language == 'es') {
			$append_to_logo_filename = '-es';
		}
		else if ($blog_language == 'fr') {
			$append_to_logo_filename = '-fr';
		}
?>
			<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="520" height="120">
				<param name="movie" value="<?php echo get_template_directory_uri() ?>/images/logo<?php echo $append_to_logo_filename; ?>.swf" />
				<param name="quality" value="high" />
				<param name="wmode" value="transparent" />
				<param name="swfversion" value="6.0.65.0" />
				<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
				<param name="expressinstall" value="Scripts/expressInstall.swf" />
				<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri() ?>/images/logo<?php echo $append_to_logo_filename; ?>.swf" width="520" height="120">
					<!--<![endif]-->
					<param name="quality" value="high" />
					<param name="wmode" value="transparent" />
					<param name="swfversion" value="6.0.65.0" />
					<param name="expressinstall" value="Scripts/expressInstall.swf" />
					<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
					<a href="<?php echo home_url( '/' ); ?>">
						<img src="<?php echo get_template_directory_uri() ?>/images/logo<?php echo $append_to_logo_filename; ?>.png" width="520px" height="120px" alt="Lidapatty International Consulting S.A.S." />
					</a>
					<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
<?php
	};
?>
		</h1>
<?php
	wp_nav_menu(
			array(
				'container' => '',
				'menu_id' => 'nav_menu',
				'menu_class' => 'sf-menu',
				'theme_location' => 'primary',
				'fallback_cb' => false
			));
?>
		<div id="header_search">
			<?php get_search_form( $echo ); ?>
		</div>
		<?php get_template_part('socials'); ?>
		<ul class="sf-menu sf-js-enabled sf-shadow" id="pages_menu">
			<!--li class="<?php if (!is_paged() && is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/"><?php _e('HOME','monochrome'); ?></a></li-->
<?php
	wp_list_pages(
			array(
				'container' => '',
				'sort_column'  => 'menu_order',
				'title_li' => '',
				'link_before' => '<span>',
				'link_after' => '</span>'
			));
?>
		</ul>
		<br class="clear"/>
	</div>

	<?php
		if((is_front_page() || 1 == (int) get_post_meta(get_the_ID(), '_invent_show_slider', true)) && get_option('invent-slider-type')) {

			if(get_option('invent-slider-type')=='1') {
				$slides = get_option('invent-slider');
				$links = get_option('invent-slider-links');
				$titles = get_option('invent-slider-titles');
				if(!empty($slides) && is_array($slides)) {
	?>
						<div id="slider-wrapper">
							<?php if(get_option('invent-general-wrapper-style') != 'narrow') { ?>
							<div id="slider-inner-wrapper"></div>
							<?php } ?>
							<div class="wrapper<?php if(get_option('invent-slider-arrows')) echo ' '.get_option('invent-slider-arrows') ?>" id="slider">
									<?php
									$i = 0;
									foreach($slides as $slideImage) {
										if(!empty($links[$i])) echo '<a href="'.$links[$i].'">';
										echo '<img src="'.$slideImage.'" alt="" width="960" height="460" '.(!empty($titles[$i]) ? 'title="'.$titles[$i].'" ' : '' ).'/>';
										if(!empty($links[$i])) echo '</a>';
										$i++;
									}
									?>
							</div>
						</div>
		<?php	}} else { ?>
		<div class="wrapper" id="piecemaker-wrapper">
			<div id="piecemaker-space">
				<div id="piecemaker"></div>
			</div>
		</div>

	<script type="text/javascript">
      var flashvars = {};
		flashvars.cssSource = "<?php echo get_template_directory_uri(); ?>/library/piecemaker/piecemaker.css";
		flashvars.xmlSource = "<?php echo get_template_directory_uri(); ?>/library/piecemaker/piecemaker.php";
      var params = {};
      params.play = "true";
      params.menu = "false";
      params.scale = "showall";
      params.wmode = "transparent";
      params.allowfullscreen = "true";
      params.allowscriptaccess = "always";
      params.allownetworking = "all";
      swfobject.embedSWF('<?php echo get_template_directory_uri(); ?>/library/piecemaker/piecemaker.swf',
	  'piecemaker', '100%', '640', '10', null, flashvars, params, null);

    </script>
		<?php } ?>
	<?php } ?>

	<div id="wp-content-slideshow-wrapper">
		<?php include (ABSPATH . '/wp-content/plugins/wp-content-slideshow/content-slideshow.php');?>
	</div>