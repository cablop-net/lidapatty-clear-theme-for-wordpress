<?php
class Invent_Ajax{

	public function checkPrivileges() {
		if(!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
	}
	
	public function ajaxContact() {

		$data = array(
			'type' => 'error',
			'message' => get_option('invent-contact-errorMessage')
		);

		if(!empty($_POST) && wp_verify_nonce($_POST['nonce'], 'invent-contact-nonce'))
		{
			$error = false;

			if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
				$name = stripslashes(strip_tags($_POST['name']));
			} else {
				$error = true;
			}

			if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
				$email = stripslashes(strip_tags($_POST['email']));
			} else {
				$error = true;
			}

			if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
				$message = stripslashes(strip_tags($_POST['message']));
			} else {
				$error = true;
			}

			if ((isset($_POST['subject']))) {
				$subject = stripslashes(strip_tags($_POST['subject']));
			}

			$adminEmail = get_option('invent-contact-email');
			if(!$adminEmail)
				$error = true;

			if(!$error) {
				$messageContainer = "
					font-size:13px;
					line-height:26px;
					float:left;
					width:829px;
					padding:5px 5px 0 5px;
					background:#e0e0e0;
					border:1px solid #d1d1d1;
					";

				$leftContainer = "
					color:#565656;
					float:left;
					padding:5px;
					margin:0 5px 5px 0;
					width:200px;
					background:#fff;
					border:1px solid #d1d1d1;
					";

				$rightContainer = "
					color:#565656;
					float:left;
					padding:5px;
					margin:0 0 5px 0;
					width:600px;
					background:#fff;
					border:1px solid #d1d1d1;
					";

				$body = '	<html>
								<body>
									<div style="'.$messageContainer.'">
										<div style="'.$leftContainer.'">Name</div>
										<div style="'.$rightContainer.'">'.$name.'</div>

										<div style="'.$leftContainer.'">E-mail</div>
										<div style="'.$rightContainer.'">'.$email.'</div>';
				if(!empty($subject)) {
				$body.= '				<div style="'.$leftContainer.'">Subject</div>
										<div style="'.$rightContainer.'">'.$subject.'</div>';
				}

				$body.= '				<div style="'.$leftContainer.'">Message</div>
										<div style="'.$rightContainer.'">'.$message.'</div>
									</div>
								</body>
							</html>';

				
				if (!class_exists("PHPMailer")) {
					require_once(ABSPATH."wp-includes/class-phpmailer.php");
				}

				$mail = new PHPMailer();

				$mail->From = $email;
				$mail->FromName = $name;
				$mail->AddAddress($adminEmail);

				$mail->WordWrap = 50;
				$mail->IsHTML(true);

				$mail->Subject = "Contact Form";
				$mail->Body = $body;
				$mail->AltBody = $message;

				if (!$mail->Send()) {
					$error = true;
				}

			}

			if(!$error) {
				$data = Array(
					'type' => 'good',
					'message' => get_option('invent-contact-successMessage')
				);
			}

		}
		header("Content-Type: application/json");
		echo json_encode($data);
		die;
	}

	public function importDummyData() {
		$this->checkPrivileges();
		header("Content-Type: application/json");
		@ini_set('memory_limit', '256M'); // to avoid 505 Error during dummy data importing
		
		// RESET
		update_option('invent-favicon', '');

		update_option('invent-copyrightText', 'Copyright &copy; 2010. All rights reserved');

		update_option('invent-headingFont', 'andika-basic');
		update_option('invent-general-h1', '30');
		update_option('invent-general-h2', '26');
		update_option('invent-general-h3', '22');
		update_option('invent-general-h4', '18');
		update_option('invent-general-h5', '16');
		update_option('invent-general-h6', '14');
		update_option('invent-general-h1-color', '#444444');
		update_option('invent-general-h2-color', '#444444');
		update_option('invent-general-h3-color', '#444444');
		update_option('invent-general-h4-color', '#444444');
		update_option('invent-general-h5-color', '#444444');
		update_option('invent-general-h6-color', '#444444');
		update_option('invent-general-enable-slider', '1');
		update_option('invent-general-wrapper-style', 'wide');

		update_option('invent-blog-sidebar-position', '2');

		update_option('invent-slider-type', '1');
		update_option('invent-slider-effects', 'fade');
		update_option('invent-slider-titles', Array());
		update_option('invent-slider-arrows', 'slider-arrows2');
		update_option('invent-slider-slices', '1');
		update_option('invent-slider-time', '0.2');
		update_option('invent-slider-pause-time', '6.5');
		update_option('invent-slider-caption-color', '#444444');
		update_option('invent-slider-control-navigation', '1');
		update_option('invent-slider-direction-navigation', '1');

		update_option('invent-slider-piecemaker-effects', 'easeInOutQuart');
		update_option('invent-slider-piecemaker-slices', '13');
		update_option('invent-slider-piecemaker-pause-time', '5');
		update_option('invent-slider-piecemaker-fov', '90');
		update_option('invent-slider-piecemaker-depth-offset', '300');
		update_option('invent-slider-piecemaker-cube-distance', '20');
		update_option('invent-slider-piecemaker-delay', '0.1');

		update_option('invent-footer-background-color', '#2c2c2c');

		update_option('invent-markers-title', Array('Invent Themes'));
		update_option('invent-markers-lat', Array('43.89960699587761'));
		update_option('invent-markers-lng', Array('-100.685546875'));
		update_option('invent-markers-description', Array('We create smart wordpress
templates.

Lorem ipsum dolor sit amet,
consectetur adipiscing elit.'));
		update_option('invent-map-zoom', 5);

		update_option('invent-socials', Array());
		update_option('invent-socials-onoff', Array());

		include(TEMPLATEPATH.'/library/plugins/wordpress-importer/wordpress-importer.php');

		$wp_import = new WP_Import();
		$_POST['fetch_attachments'] = true;
		$wp_import->fetch_attachments = true;
		ob_start();
		$wp_import->import(TEMPLATEPATH.'/library/data/data.xml');
		ob_end_clean();

		$slides = Array('http://invent-themes.com/demo/clear-theme/wp-content/uploads/2011/03/119.jpg',
						'http://invent-themes.com/demo/clear-theme/wp-content/uploads/2011/03/126.jpg',
						'http://invent-themes.com/demo/clear-theme/wp-content/uploads/2011/03/077.jpg',
						'http://invent-themes.com/demo/clear-theme/wp-content/uploads/2011/03/106.jpg'
					   );

		$inventSlidesBgColors = Array('#cde0e4', '#f1faf9', '#010101', '#6f767e');
		$inventSlides = Array();
		$siteurl = get_option('siteurl');


		include_once(TEMPLATEPATH.'/library/imageCreator.php');
		foreach($slides as $url) {
			$tmp = $wp_import->fetch_remote_file($url, Array('upload_date' => '2011/05', 'guid' => $url));

			if(is_array($tmp)){
				$inventSlides[] = $siteurl.'/'.substr($tmp['file'],strlen(ABSPATH));
				$image = new imageCreator($tmp['file']);
				$image->createPNG(Invent_Admin::getThumbnailPath($tmp['file']), 125, 100, true);
			}
			else
				print_r($tmp->get_error_messages ());
		}

		update_option('invent-slider-bgcolors', $inventSlidesBgColors);
		update_option('invent-slider', $inventSlides);

		// setting homepage and blog page
		$pages = get_pages();

		foreach($pages as $page)
		{
			if( $page->guid == 'http://invent-themes.com/demo/clear/?page_id=103' ) {
				update_option('page_for_posts',$page->ID);
			}
			elseif( $page->guid == 'http://invent-themes.com/demo/clear/?page_id=4' ) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $page->ID);
			}
		}

		// make primary menu active
		$menuId = 0;
		$navMenus = wp_get_nav_menus( array('orderby' => 'name') );
		foreach($navMenus as $menu){
			if($menu->name == 'Navigation'){
				$menuId = (int) $menu->term_id;
				break;
			}
		}
		set_theme_mod( 'nav_menu_locations', array_map( 'absint', Array('primary' => $menuId) ) );

		// add widgets

		$sidebars_widgets = array(
			'wp_inactive_widgets' => array(),
			'sidebar-widget-area' =>
			array(
				0 => 'flickr-5',
				1 => 'recent-posts-4',
				2 => 'categories-4',
				3 => 'archives-3',
				4 => 'recent-comments-4'
			),
			'footer-0-widget-area' =>
			array(
				0 => 'popular_posts-4'
			),
			'footer-1-widget-area' =>
			array(
				0 => 'categories-3'
			),
			'footer-2-widget-area' =>
			array(
				0 => 'twitter-1'
			),
			'footer-3-widget-area' =>
			array(
				0 => 'text-1'
			),
			'array_version' => 3,
		);

		update_option('sidebars_widgets',$sidebars_widgets);

		$widgets = array(
			'widget_archives' => array(
				3 => Array (
						'title' => 'Archives',
						'count' => 0,
						'dropdown' => 0
				),
				'_multiwidget' => 1
			),
			'widget_categories' => array(
				3 => array (
					'title' => 'Categories',
					'count' => 0,
					'hierarchical' => 0,
					'dropdown' => 0,
				),
				4 => array (
					'title' => 'Categories',
					'count' => 1,
					'hierarchical' => 0,
					'dropdown' => 0
				),
				'_multiwidget' => 1
			),
			'widget_recent-comments' => array(
				3 => Array (
					'title' => 'Recent Comments',
					'number' => 5
				),
				'_multiwidget' => 1
			),
			'widget_recent-posts' => array(
				3 => Array (
					'title' => 'Recent Posts',
					'number' => 5
				),
				4 => Array (
					'title' => 'Recent posts',
					'number' => 5
				),
				'_multiwidget' => 1
			),
			'widget_search' => array(
				2 => Array (
					'title' => ''
				),
				'_multiwidget' => 1
			),
			'widget_tag_cloud' => array(
				2 => Array ( ),
				3 => Array (
					'title' => 'Tags',
					'taxonomy' => 'post_tag'
				),
				'_multiwidget' => 1
			),
			'widget_text' => array(
				1 => Array (
					'title' => 'Contact us!',
					'text' => '<p>Lorem ipsum dolor sit amet, odio conseotetur adipiscing elit.</p>
<ul>
<li>[icon_user_white] <strong>Lorem ipsum, State, Country</strong></li>
<li>[icon_speech_white] <strong>Tel. +48 123 456 789</strong></li>
<li>[icon_mail_white] <strong>E-mail:</strong> <em>office@domain.com</em></li>
<li>[icon_skype_white] <strong>Your-Skype-Name</strong></li>
</ul>',
					'filter' => ''
				),
				'_multiwidget' => 1
			),
			'widget_twitter' => array(
				'number' => 1,
				'1' => Array (
					'title' => 'Twitter',
					'username' => 'damianwatracz',
					'num' => 2,
					'update' => 1,
					'hyperlinks' => 1,
					'twitter_users' => ''
				)
			),
			'widget_flickr' => array (
				5 => array (
					'title' => 'Flickr Photos',
					'rss' => 'http://api.flickr.com/services/feeds/photos_public.gne?id=63205904@N03&lang=en-us&format=rss_200',
					'number' => 9
				),
				'_multiwidget' => 1
			),
			'widget_popular_posts' => array (
				4 => array(
					'title' => 'Popular posts',
					'number' => 3
				),
				'_multiwidget' => 1
			)

		);

		foreach($widgets as $name => $value)
		update_option($name, $value);

		echo json_encode($file);
		die;
	}

	public function __construct(){
		add_action('wp_ajax_nopriv_invent-contact-ajax', Array($this, 'ajaxContact'));
		add_action('wp_ajax_invent-contact-ajax', Array($this, 'ajaxContact'));

		add_action('wp_ajax_invent-import-data', Array($this, 'importDummyData'));
	}

}