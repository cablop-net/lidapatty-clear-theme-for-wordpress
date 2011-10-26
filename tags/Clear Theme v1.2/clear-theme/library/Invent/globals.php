<?php
// some global functions
function remove_invalid_tags($str, $tags) {
	foreach ($tags as $tag) {
		$str = preg_replace('#^<\/' . $tag . '>|<' . $tag . '>$#', '', trim($str));
	}

	return $str;
}

function invent_set_jpeg_quality($val) {
	return 100;
}

add_filter('jpeg_quality', 'invent_set_jpeg_quality', 100);

@ini_set("pcre.backtrack_limit", 10000000);

load_theme_textdomain('invent', TEMPLATEPATH . '/library/languages');
/*
  $locale = get_locale();
  $locale_file = TEMPLATEPATH . "/languages/$locale.php";
  if ( is_readable( $locale_file ) )
  require_once( $locale_file );
 */

add_theme_support('automatic-feed-links');

$content_width = 940;
$GLOBALS['content_width'] = 940;
add_option('invent-favicon', '');

add_option('invent-copyrightText', 'Copyright &copy; 2010. All rights reserved');

add_option('invent-general-h1', '30');
add_option('invent-general-h2', '26');
add_option('invent-general-h3', '22');
add_option('invent-general-h4', '18');
add_option('invent-general-h5', '16');
add_option('invent-general-h6', '14');
add_option('invent-general-h1-color', '#444444');
add_option('invent-general-h2-color', '#444444');
add_option('invent-general-h3-color', '#444444');
add_option('invent-general-h4-color', '#444444');
add_option('invent-general-h5-color', '#444444');
add_option('invent-general-h6-color', '#444444');
add_option('invent-general-nav-font-size', 12);
add_option('invent-general-enable-slider', '1');
add_option('invent-general-wrapper-style', 'wide');

add_option('invent-gallery-allCategoryTitle', 'All');

add_option('invent-slider-effects', 'fade');
add_option('invent-slider-titles', Array());
add_option('invent-slider-arrows', 'slider-arrows2');
add_option('invent-slider-slices', '1');
add_option('invent-slider-time', '0.2');
add_option('invent-slider-pause-time', '6.5');
add_option('invent-slider-caption-color', '#444444');
add_option('invent-slider-control-navigation', '1');
add_option('invent-slider-direction-navigation', '1');

add_option('invent-slider-piecemaker-effects', 'easeInOutQuart');
add_option('invent-slider-piecemaker-slices', '13');
add_option('invent-slider-piecemaker-pause-time', '5');
add_option('invent-slider-piecemaker-fov', '90');
add_option('invent-slider-piecemaker-depth-offset', '300');
add_option('invent-slider-piecemaker-cube-distance', '20');
add_option('invent-slider-piecemaker-delay', '0.1');

add_option('invent-footer-background-color', '#2c2c2c');

add_option('invent-blog-sidebar-position', '2');
add_option('invent-blog-show-metadata', '1');

add_option('invent-markers-title', '');
add_option('invent-markers-lat', '');
add_option('invent-markers-lng', '');
add_option('invent-markers-description', '');
add_option('invent-map-zoom', 5);

add_option('invent-socials', Array());
add_option('invent-socials-onoff', Array());
add_option('invent-socials-position', 'footer');

add_image_size('invent-small', 210, 110, true); // 1-4
add_image_size('invent-medium', 290, 150, true);// 1-3
add_image_size('invent-big', 450, 235, true);   // 1-2
add_image_size('invent-large', 610, 315, true); // 2-3
add_image_size('invent-huge', 690, 360, true);  // 3-4
add_image_size('invent-full', 930, 480, true);  // 1-1

add_image_size('invent-widget-small', 60, 36, true);
add_image_size('invent-post-thumbnail', 690, 2000, false);
add_image_size('invent-post-wide-thumbnail', 930, 2000, false);


/**
 * Retrieve an attachment page link using an image or icon, if possible.
 *
 * @uses apply_filters() Calls 'wp_get_attachment_link' filter on HTML content with same parameters as function.
 *
 * @param int $id Optional. Post ID.
 * @param string $size Optional, default is 'thumbnail'. Size of image, either array or string.
 * @param bool $permalink Optional, default is false. Whether to add permalink to image.
 * @param bool $icon Optional, default is false. Whether to include icon.
 * @param string $text Optional, default is false. If string, then will be link text.
 * @return string HTML content.
 */
function invent_get_attachment_link($id = 0, $size = 'thumbnail', $permalink = false, $icon = false, $text = false, $group = 'default', $link=true) {
	$id = intval($id);
	$_post = & get_post($id);

	if (('attachment' != $_post->post_type) || !$url = wp_get_attachment_url($_post->ID))
		return __('Missing Attachment', 'invent');

	if ($permalink)
		$url = get_attachment_link($_post->ID);

	$post_title = esc_attr($_post->post_title);

	if ($text) {
		$link_text = esc_attr($text);
	} elseif (( is_int($size) && $size != 0 ) or ( is_string($size) && $size != 'none' ) or $size != false) {
		$link_text = wp_get_attachment_image($id, $size, $icon);
	} else {
		$link_text = '';
	}

	if (trim($link_text) == '')
		$link_text = $_post->post_title;

	if($link)
		return apply_filters('wp_get_attachment_link', '<a href="' . $url . '" title="' . $post_title . '" rel="gallery-box-' . $group . '"><span class="image-hover"></span><span class="image-hover-icon"></span>' . $link_text . '</a>', $id, $size, $permalink, $icon, $text);
	else
		return apply_filters('wp_get_attachment_link', $link_text, $id, $size, $permalink, $icon, $text);
}


if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menu('primary', __('Primary Navigation', 'invent'));
}

add_theme_support('post-thumbnails');
set_post_thumbnail_size(690, 290, true);





function invent_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'invent_formatter', 99);
add_filter('widget_text', 'invent_formatter', 99);

function invent_get_the_post_thumbnail($postId = 0, $wide = false) {
	if ($postId == 0)
		$postId = get_the_ID();

	$thumbnailId = get_post_thumbnail_id($postId);

	if ($wide)
		$src = wp_get_attachment_image_src($thumbnailId, 'invent-post-wide-thumbnail');
	else
		$src = wp_get_attachment_image_src($thumbnailId, 'invent-post-thumbnail');

	if (!empty($src[0]))
		return '<div class="image-decorations"><img width="' . $src[1] . '" height="' . $src[2] . '" src="' . $src[0] . '" class="attachment-post-thumbnail wp-post-image post-image" alt="" /></div>';
	else
		return '';
}

/*
 * Repair HTML code to make sure it validates XHTML 1.0 Strict/HTML5
 *
 */
function invent_comment_id_fields($result, $id=0, $replytoid=0) {
	$result  = "\t\t\t".'<input type="hidden" name="comment_post_ID" value="'.$id.'" id="comment_post_ID" />'."\n";
	$result .= "\t\t\t\t\t\t\t\t\t\t".'<input type="hidden" name="comment_parent" id="comment_parent" value="'.$replytoid.'" />'."\n";

	return $result;
}

add_filter('comment_id_fields', 'invent_comment_id_fields', 100, 3);


function invent_get_comment_reply_link($args = array(), $comment = null, $post = null) {
	global $user_ID;

	$defaults = array('add_below' => 'comment', 'respond_id' => 'respond', 'reply_text' => __('Reply'),
		'login_text' => __('Log in to Reply'), 'depth' => 0, 'before' => '', 'after' => '');

	$args = wp_parse_args($args, $defaults);

	if ( 0 == $args['depth'] || $args['max_depth'] <= $args['depth'] )
		return;

	extract($args, EXTR_SKIP);

	$comment = get_comment($comment);
	if ( empty($post) )
		$post = $comment->comment_post_ID;
	$post = get_post($post);

	if ( !comments_open($post->ID) )
		return false;

	$link = '';

	if ( get_option('comment_registration') && !$user_ID )
		$link = '<a rel="nofollow" class="comment-reply-login" href="' . esc_url( wp_login_url( get_permalink() ) ) . '">' . $login_text . '</a>';
	else
		$link = '<a class="comment-reply-link" href="' . esc_url( add_query_arg( 'replytocom', $comment->comment_ID ) ) . '#' . $respond_id . '" onclick="return addComment.moveForm(\''.($add_below-$comment->comment_ID).'\', \''.$comment->comment_ID.'\', \''.$respond_id.'\', \''.$post->ID.'\')">'.$reply_text.'</a>';
	return $link; //apply_filters('comment_reply_link', $before . $link . $after, $args, $comment, $post);
}



/**
 * new gallery managment
 * @since	2.0
 */
/*
function custom_types_init(){

	   $args = array(
		'labels'	=> array(
			'name' => __('Gallery items', 'invent'),
			'singular_label' => __('Gallery item', 'invent'),
			'add_new_item' => __('Add new gallery item','invent')

		),
		'public' => true,
		'show_ui' => true, // UI in admin panel
		'_builtin' => false, // It's a custom post type, not built in!
		'_edit_link' => 'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array("slug" => "gallery"), // Permalinks format
		'supports' => array('title')

    );

    register_post_type( 'invent_gallery_item' , $args );


register_taxonomy(
	'invent_gallery',
	'invent_gallery_item',
	array('hierarchical' => true,
		'labels' => array(
			'name' => __('Galleries'),
			'singular_label' => __('Gallery'),
			'add_new_item' => __('Add gallery','invent'),
			'all_items' => __('All Galleries','invent')
		),
		'query_var' => 'invent_gallery'
	)
);

register_taxonomy(
	'invent_gallery_item_tag',
	'invent_gallery_item',
	array('hierarchical' => false,
		'admin_ui' => false,
		'query_var' => 'invent_gallery',
		'labels' => array(
			'name' => 'Tags'
		)
	)
);


}

add_action('init', 'custom_types_init');
*/