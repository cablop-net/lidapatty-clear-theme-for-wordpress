<?php
/**
 * Twitter widget class
 *
 * @version 1.1.1
 */
class Invent_Widget_Twitter extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_twitter', 'description' => __( 'The most recent tweets' ) );
		parent::__construct('twitter', __('Twitter'), $widget_ops);
		$this->alt_option_name = 'widget_twitter';
	}

	function widget( $args, $instance ) {

 		extract($args, EXTR_SKIP);
 		$output = '';
 		$title = apply_filters('widget_title', empty($instance['title']) ? __('Twitter') : $instance['title']);
 		$user = empty($instance['user']) ? '' : $instance['user'];

		if ( ! $number = absint( $instance['number'] ) )
 			$number = 2;

		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

		$output .= '<form class="twitter-data" action="">';
		$output .= '<div><input type="hidden" name="user" value="'.$user.'"/></div>';
		$output .= '<div><input type="hidden" name="number" value="'.$number.'" /></div>';
		$output .= '</form>';
		$output .= $after_widget;

		wp_enqueue_script( 'twitter_widget', get_template_directory_uri().'/js/twitter.js', array(), '1.0' );
		echo $output;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		$instance['user'] = strip_tags($new_instance['user']);

		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 3;
		$user = isset($instance['user']) ? esc_attr($instance['user']) : '';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','invent'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:','invent'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('User:','invent'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" /></p>
<?php
	}
}

/**
 * Recent Comments widget class
 *
 * @version 3.1.1
 */
class Invent_Widget_Recent_Comments extends WP_Widget {

	function Invent_Widget_Recent_Comments() {
		$widget_ops = array('classname' => 'widget_recent_comments', 'description' => __( 'The most recent comments' ) );
		$this->WP_Widget('recent-comments', __('Recent Comments'), $widget_ops);
		$this->alt_option_name = 'widget_recent_comments';

		add_action( 'comment_post', array(&$this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array(&$this, 'flush_widget_cache') );
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_comments', 'widget');
	}

	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = wp_cache_get('widget_recent_comments', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

 		extract($args, EXTR_SKIP);
 		$output = '';
 		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Comments') : $instance['title']);

		if ( ! $number = absint( $instance['number'] ) )
 			$number = 5;

		$comments = get_comments( array( 'number' => $number, 'status' => 'approve' ) );
		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

		$output .= '<ul id="recentcomments">';
		if ( $comments ) {
			foreach ( (array) $comments as $comment) {
				$output .=  '<li class="recentcomments">' . /* translators: comments widget: 1: comment author, 2: post link */ sprintf(_x('%1$s on %2$s', 'widgets'), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_comment_author(), get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
			}
 		}
		$output .= '</ul>';
		$output .= $after_widget;

		echo $output;
		$cache[$args['widget_id']] = $output;
		wp_cache_set('widget_recent_comments', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_comments']) )
			delete_option('widget_recent_comments');

		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','invent'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:','invent'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}

class Invent_Widget_Flickr extends WP_Widget {

	function Invent_Widget_Flickr() {
		$widget_ops = array('classname' => 'widget_flickr', 'description' => __( 'The most recent comments' ) );
		$this->WP_Widget('flickr', __('Flickr images'), $widget_ops);
		$this->alt_option_name = 'widget_flickr';
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_flickr', 'widget');
	}

	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = wp_cache_get('widget_flickr', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		extract($args, EXTR_SKIP);
		$output = '';
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Flickr') : $instance['title']);

		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

		if(!empty($instance['rss'])) {

			if ( ! $number = absint( $instance['number'] ) )
				$number = 5;

			include_once(ABSPATH . WPINC . '/class-simplepie.php');
			$feed = new SimplePie();
			$feed->set_feed_url($instance['rss']);
			$feed->set_item_limit($number);
			$feed->enable_cache(false);
			$feed->enable_order_by_date(false);
			$feed->init();

			$items = $feed->get_items();

			if( is_array( $items ) ) {
				$itemList = '';
//				$items = array_slice( $rss->items, 0, $number );
				$i = 0;
				foreach($items as $item) {
					if($i==$instance['number']) break;
					$i++;

					preg_match_all("/<IMG.+?SRC=[\"']([^\"']+)/si",$item->get_content(),$sub,PREG_SET_ORDER);
					$photo_url = str_replace( "_m.jpg", "_t.jpg", $sub[0][1] );
					$itemList .= '<li><a class="flickr_img" href="'.$item->get_link().'">
					<img alt="'.esc_html( $item->get_title(), true ).'" title="'.esc_html( $item->get_title(), true ).'" src="'.$photo_url.'" /></a></li>';
				}
			}

			if(!empty($itemList))
				$output .= '<ul>'.$itemList.'</ul>';
			else
				$output .= __('Flickr gallery is empty', 'invent');
		}
		else
			$output .= __('RSS URL not defined', 'invent');


		$output .= $after_widget;

		echo $output;
		$cache[$args['widget_id']] = $output;
		wp_cache_set('widget_flickr', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['rss'] = strip_tags($new_instance['rss']);
		$instance['number'] = absint( $new_instance['number'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_flickr']) )
			delete_option('widget_flickr');

		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$rss = isset($instance['rss']) ? esc_attr($instance['rss']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','invent'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS Url:','invent'); ?>*</label>
		<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of photos to show:', 'invent'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		<p>* Your RSS feed can be found on your Flickr homepage. Scroll down to the bottom of the page until you see the <em>Feed</em> link and copy that into the box above.</p>
<?php
	}
}


/*
Plugin Name: Random Image Block
Plugin URI: http://mattrude.com/projects/random-image-block/
Description: Display a random image from your native WordPress photo galley or in-beaded images.
Version: 0.9.2
Author: Matt Rude
Author URI: http://mattrude.com/
License: GNU GPL
*/

class random_image_widget extends WP_Widget {
  function random_image_widget() {
    $currentLocale = get_locale();
    if(!empty($currentLocale)) {
      $moFile = dirname(__FILE__) . "/languages/random-image-block." .  $currentLocale . ".mo";
      if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('random-image-block', $moFile);
    }

    $random_image_widget_name = __('Random Post Widget', 'random-image-block');
    $random_image_widget_description = __('Displays a random post image.', 'random-image-block');
    $widget_ops = array('classname' => 'random_image_widget', 'description' => $random_image_widget_description );
    $this->WP_Widget('random_image_widget', $random_image_widget_name, $widget_ops);
  }

  function widget($args, $instance) {
    extract($args);
    $riw_widget_title = empty($instance['widget_title']) ? '&nbsp;' : apply_filters('widget_title', $instance['widget_title']);
    $riw_center = empty($instance['center']) ? 'off' : apply_filters('center', $instance['center']);
    $riw_cat_id = empty($instance['gallery_category']) ? '&nbsp;' : apply_filters('gallery_category', $instance['gallery_category']);
    $riw_link_album = empty($instance['link_album']) ? 'off' : apply_filters('link_album', $instance['link_album']);
    $riw_display_album = empty($instance['display_album']) ? 'on' : apply_filters('display_album', $instance['display_album']);
    $riw_display_title = empty($instance['display_title']) ? 'off' : apply_filters('display_title', $instance['display_title']);
    $riw_display_caption = empty($instance['display_caption']) ? 'on' : apply_filters('display_caption', $instance['display_caption']);
    $riw_display_description = empty($instance['display_description']) ? 'off' : apply_filters('display_description', $instance['display_description']);
    global $wpdb;

    if ($riw_widget_title == "&nbsp;") {
      $riw_widget_title = __('Random Post','random-image-block');
    }

    if ($riw_center == "on") {
      $riw_center_output = "align=center";
    } else {
      $riw_center_output = "";
    }

    $args = array(
       'post_type' => 'attachment',
       'post_mime_type' => 'image',
       'numberposts' => -1,
       'post_status' => null,
       'orderby' => 'rand'
    );

    $attachments = get_posts($args);
    $noimages = count($attachments);
    if ($attachments) {
      foreach ($attachments as $attachment) {
        if ( $riw_cat_id !== "-1" ) {
          $albumid = $attachment->post_parent;
        } else {
          $albumid = $attachment->post_parent;
	  foreach((get_the_category($albumid)) as $category) {
            $riw_cat_id = $category->cat_ID;
          }

	}

        if (in_category($riw_cat_id, $albumid)) {
          $imgid = $attachment->ID;
          $meta = wp_get_attachment_metadata($imgid);

            $riw_image_link = $albumid;

          // construct the image
			echo "{$before_widget}{$before_title}$riw_widget_title{$after_title}";

            echo '<div class="random-image-loading">';
			echo '<a href="'.get_permalink( $riw_image_link ).'">';
			echo wp_get_attachment_image($imgid, 'invent-small');
			echo "</a></div>";
			echo '<p><small><a href="'.get_permalink( $albumid ).'">'.get_the_title($albumid).'</a></small></p>';

			echo $after_widget;
			break;
	}
      }
    }
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['widget_title'] = strip_tags($new_instance['widget_title']);
    $instance['gallery_category'] = strip_tags($new_instance['gallery_category']);
    return $instance;
  }

  function form($instance) {

    $riw_widget_title = strip_tags($instance['widget_title']);
    $riw_center = $instance['center'];
    $riw_show_advanced = empty($instance['show_advanced']) ? 'off' : apply_filters('show_advanced', $instance['show_advanced']);
    $riw_link_album = $instance['link_album'];
    $riw_cat_id = strip_tags($instance['gallery_category']);
    $riw_display_album = empty($instance['display_album']) ? 'on' : apply_filters('display_album', $instance['display_album']);
    $riw_display_title = $instance['display_title'];
    $riw_display_caption = empty($instance['display_caption']) ? 'on' : apply_filters('display_caption', $instance['display_caption']);
    $riw_display_description = $instance['display_description'];
    ?><p><label for="<?php echo $this->get_field_id('widget_title'); ?>"><?php _e('Widget Title', 'random-image-block')?>:<input class="widefat" id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" value="<?php echo esc_attr($riw_widget_title); ?>" /></label></p>

    <p><label for="<?php echo $this->get_field_id('gallery_category'); ?>"><?php _e('Select a Post Category to display images from, or All Categories to disable filtering', 'random-image-block')?>:<br />
    <?php wp_dropdown_categories( array( 'name' => $this->get_field_name("gallery_category"), 'hide_empty' => 0, 'hierarchical' => 1, 'selected' =>  $instance["gallery_category"], 'show_option_none' => __('All Categories') ) ); ?>
    </label></p>
    
    <?php
  }
}

class Invent_Widget_PopularPosts extends WP_Widget {

	function Invent_Widget_PopularPosts() {
		$widget_ops = array('classname' => 'widget_popular_posts', 'description' => __( 'The most popular posts' ) );
		$this->WP_Widget('popular_posts', __('Popular posts'), $widget_ops);
		$this->alt_option_name = 'widget_popular_posts';
	}

	
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
	$instance['number'] = absint( $new_instance['number'] );
    return $instance;
  }

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','invent'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:','invent'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}

	function widget($args, $instance) {
		global $wpdb;
 		extract($args, EXTR_SKIP);

		$output = '';
 		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Comments') : $instance['title']);

		if ( ! $number = absint( $instance['number'] ) )
 			$number = 5;

		$output .= $before_widget.$before_title.$title.$after_title;

		//retrieve from the database
		$posts = $wpdb->get_results("SELECT ID, post_title, comment_count FROM " . $wpdb->posts . " WHERE post_type = 'post' && post_status = 'publish' && comment_count > 0 ORDER BY comment_count DESC LIMIT " . $number);

		//display the posts
		if (!empty($posts)) {
			$output .= '<ul>';
			foreach ($posts as $links) {
				$imgId = get_post_meta($links->ID, '_thumbnail_id', true);
				$output .= "\t" . '<li><a href="' . get_permalink($links->ID) . '"><span class="post-thumb">'.wp_get_attachment_image($imgId, 'invent-widget-small').'</span><span class="invent-title">' . $links->post_title . '</span></a></li>' . "\n";
			}
			$output .= '</ul>';
		}
		else
			_e('No posts to display', 'simple_popular_posts');

		$output .= $after_widget;
		echo $output;
	}
}

	class Invent_Widgets{

		public function unregisterDefault(){
//			unregister_widget('WP_Widget_Pages');
//			unregister_widget('WP_Widget_Calendar');
//			unregister_widget('WP_Widget_Archives');
//			unregister_widget('WP_Widget_Links');
//			unregister_widget('WP_Widget_Meta');
//			unregister_widget('WP_Widget_Search');
//			unregister_widget('WP_Widget_Text');
//			unregister_widget('WP_Widget_Categories');
//			unregister_widget('WP_Widget_Recent_Posts');
//			unregister_widget('WP_Widget_RSS');
//			unregister_widget('WP_Widget_Tag_Cloud');

			global $wp_widget_factory;
			remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
			unregister_widget('WP_Widget_Recent_Comments');
		}

		public function repairCategoriesWidget($c){
			$c = preg_replace('#</a> (\(\d\))#', ' \\1</a>', $c);
			return $c;
		}

		public function registerWidgets(){
			register_widget('Invent_Widget_Recent_Comments');
			register_widget('Invent_Widget_Flickr');
			register_widget('Invent_Widget_PopularPosts');
			register_widget('random_image_widget');
			register_widget('Invent_Widget_Twitter');

			add_filter('wp_list_categories', Array($this, 'repairCategoriesWidget'));
		}

		function invent_widgets_init() {
			// Area 1, located at the top of the sidebar.
			register_sidebar(array(
				'name' => __('Sidebar widget area', 'invent'),
				'id' => 'sidebar-widget-area',
				'description' => __('Sidebar widget area', 'invent'),
				'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>',
			));

			// Area 2, located below, in the footer.
			register_sidebar(array(
				'name' => __('First footer widget area', 'invent'),
				'id' => 'footer-0-widget-area',
				'description' => __('Footer widget area', 'invent'),
				'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));

			register_sidebar(array(
				'name' => __('Second footer widget area', 'invent'),
				'id' => 'footer-1-widget-area',
				'description' => __('Footer widget area', 'invent'),
				'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));

			register_sidebar(array(
				'name' => __('Third footer widget area', 'invent'),
				'id' => 'footer-2-widget-area',
				'description' => __('Footer widget area', 'invent'),
				'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));

			register_sidebar(array(
				'name' => __('Fourth footer widget area', 'invent'),
				'id' => 'footer-3-widget-area',
				'description' => __('Footer widget area', 'invent'),
				'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			add_filter('widget_text', 'do_shortcode');
		}

		public function __construct(){
			// widget containers
			add_action('widgets_init', Array($this,'invent_widgets_init'));
		}
	}
