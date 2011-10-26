<?php
/**
 * The Header for Invent theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordPress
 * @subpackage Invent
 * @since Invent 1.0
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );

	?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php if(get_option('invent-favicon')) { ?>
	<link rel="shortcut icon" type="image/icon" href="<?php echo get_option('invent-favicon') ?>"/>
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/site.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/nivo-slider.css" media="screen" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/styles/superfish.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/styles/fancybox.css" />

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

	<style type="text/css">
		h1{color: <?php echo get_option('invent-general-h1-color') ?> ; font-size: <?php echo get_option('invent-general-h1') ?>px}
		h2{color: <?php echo get_option('invent-general-h2-color') ?>; font-size: <?php echo get_option('invent-general-h2') ?>px}
		h3{color: <?php echo get_option('invent-general-h3-color') ?>; font-size: <?php echo get_option('invent-general-h3') ?>px}
		h4{color: <?php echo get_option('invent-general-h4-color') ?>; font-size: <?php echo get_option('invent-general-h4') ?>px}
		h5{color: <?php echo get_option('invent-general-h5-color') ?>; font-size: <?php echo get_option('invent-general-h5') ?>px}
		h6{color: <?php echo get_option('invent-general-h6-color') ?>; font-size: <?php echo get_option('invent-general-h6') ?>px}
		.nivo-caption{color: <?php echo get_option('invent-slider-caption-color') ?>;}
		.narrow .wrapper, #widgets-container,#scrolltop-right, #scrolltop-container{background-color: <?php echo get_option('invent-footer-background-color') ?>;}
	</style>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tiptip.minified.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollto.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/cufon.js"></script>

		<?php
			$font = get_option( 'invent-headingFont', 'andika-basic');
				$fontsConfig = Array(
					'andika-basic' =>'fontFamily: \'Andika\' ',
					'bebas-neue' =>'fontFamily: \'Bebas Neue\'',
					'comfortaa-thin' => 'fontFamily: \'Comfortaa\' , fontWeight:250',
					'comfortaa-regular' => 'fontFamily: \'Comfortaa\' , fontWeight:400',
					'diavlo-light' => 'fontFamily: \'Diavlo Light\'',
					'diavlo-book' => 'fontFamily: \'Diavlo Book\'',
					'droid-sans' => 'fontFamily: \'Droid Sans\'',
					'fertigo-pro' => 'fontFamily: \'Fertigo Pro\'',
					'inconsolata' => 'fontFamily: \'Inconsolata\'',
					'josefin-sans-std' => 'fontFamily: \'Josefin Sans Std\'',
					'lobster' => 'fontFamily: \'Lobster\'',
					'molengo' => 'fontFamily: \'Molengo\'',
					'museo-sans' => 'fontFamily: \'Museo Sans\'',
					'sansation-light' => 'fontFamily: \'Sansation\', fontWeight:300',
					'sansation-regular' => 'fontFamily: \'Sansation\', fontWeight:400',
					'vegur-light' => 'fontFamily: \'Vegur\'',
					'vollkorn' => 'fontFamily: \'Vollkorn Regular\'',
					'yanone-thin' => 'fontFamily: \'Yanone Kaffeesatz\', fontWeight:250',
					'yanone-regular' => 'fontFamily: \'Yanone Kaffeesatz\', fontWeight:400'
				);
		?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fonts/andika-basic.js"></script>
	<?php if($font!='andika-basic') { ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fonts/<?php echo $font ?>.js"></script>
	<?php } ?>
	<script type="text/javascript">
		var cufonFont = {<?php echo $fontsConfig[$font] ?>};
	</script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.8.11.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.quicksand.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-1.3.4.pack.js"></script>

	<?php if(is_front_page() && get_option('invent-slider-type')) { ?>

		<?php if(get_option('invent-slider-type')=='1') { ?>
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
		<?php } else { ?>
			<script type="text/javascript">
				var inventSliderConfig = false;
			</script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/swfobject.js"></script>
		<?php } ?>
	<?php } else { ?>
	<script type="text/javascript">
		var inventSliderConfig = false;
	</script>
	<?php } ?>
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
	$mapConfig['marker']['description'] = $descriptions[0]; ?>
	var inventMap = <?php echo json_encode($mapConfig) ?>;

		var THEME_DIR ='<?php echo get_template_directory_uri(); ?>/';
	</script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/map.js"></script>

	<?php

		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		wp_head();
	?>

</head>
<body <?php body_class(); ?>>

	<div class="wrapper">
		<h1 id="logo"><a href="<?php echo home_url( '/' ); ?>">
				<?php if(get_option('invent-logo')) { ?>
				<img src="<?php echo get_option('invent-logo') ?>" alt="Invent" />
				<?php } else { ?>
				<img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="Invent" />
				<?php } ?>
		</a></h1>

		<?php wp_nav_menu( array('container' => '', 'link_before' => '<span>', 'link_after' => '</span>', 'menu_id' => 'nav', 'menu_class' => 'sf-menu', 'theme_location' => 'primary', 'fallback_cb' => false ) ); ?>
	</div>

	<?php
		if(is_front_page() && get_option('invent-slider-type')) {

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

