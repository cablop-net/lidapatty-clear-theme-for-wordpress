<?php
class Invent_Admin {

	public function checkPrivileges() {
		if(!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
	}

	public static function getThumbnailPath($file) {

		$info = pathinfo($file);
		return $info['dirname'].DIRECTORY_SEPARATOR.$info['filename'].'-invent-th.'.$info['extension'].'.png';
	}

	public function displayPostCustomFields() {
		global $post;
		wp_nonce_field('invent-custom-fields', 'invent-custom-fields_wpnonce', false, true);

		$value = get_post_meta($post->ID, '_invent_sidebar_position', true);

		echo '<p class="extra_0">Sidebar position:</p>
			<table class="invent-fontstable"><tr><td>
			<!--label for="_invent_sidebar_position1">Left</label-->
			<div class="invent-80x80-container"><input id="_invent_sidebar_position1" name="_invent_sidebar_position" type="radio" value="1" '.($value == 1 ? ' checked="checked"' : '').'/>
			<img src="'.get_template_directory_uri().'/library/images/admin/sidebar/left.png" alt="left" /></div>
			</td><td>
			<!--label for="_invent_sidebar_position2">Right</label-->
			<div class="invent-80x80-container"><input id="_invent_sidebar_position2" name="_invent_sidebar_position" type="radio" value="2" '.($value == 2 ? ' checked="checked"' : '').'/>
<img src="'.get_template_directory_uri().'/library/images/admin/sidebar/right.png" alt="left" /></div>
</td><td>
			<!--label for="_invent_sidebar_position3">No-sidebar</label-->
			<div class="invent-80x80-container"><input id="_invent_sidebar_position3" name="_invent_sidebar_position" type="radio" value="3" '.($value == 3 ? ' checked="checked"' : '').'/>
<img src="'.get_template_directory_uri().'/library/images/admin/sidebar/no.png" alt="left" /></div>
</td></tr>
			</table>';
	}

	public function displayPageCustomFields() {
		global $post;
		wp_nonce_field('invent-custom-fields', 'invent-custom-fields_wpnonce', false, true);

		$value = get_post_meta($post->ID, '_invent_disable_title', true);
		echo '<div class="invent-settings-row">
			<label>Hide page title</label>
			<div>
					<div class="invent-checkbox"><div class="invent-input-onoff"></div><div class="invent-input-border"></div><input type="checkbox" name="_invent_disable_title" '.($value==1 ? ' checked="checked"' : '').' /></div>
			</div>
		</div> ';
	}

	// saving post or page settings
	function savePostCustomFields($post_id, $post) {
		if(!isset($_POST['invent-custom-fields_wpnonce']) || !wp_verify_nonce($_POST['invent-custom-fields_wpnonce'], 'invent-custom-fields'))
			return false;

		if(!current_user_can('edit_post', $post_id))
			return false;

		$post_id = $post->post_parent;

		// @todo: rewrite that code to more flexible form
		// @todo: use wp_is_post_revision() to get the ID of the real post.
		if(isset($_POST['_invent_sidebar_position']) && trim($_POST['_invent_sidebar_position'])) {
			$_POST['_invent_sidebar_position'] = (int) $_POST['_invent_sidebar_position']; // it's 1=left,2=right or 3=no sidebar
			$oldValue = get_post_meta($post_id, '_invent_sidebar_position', true);

			if(!$oldValue) {
				add_post_meta($post_id, '_invent_sidebar_position', $_POST['_invent_sidebar_position']);
			}
			else
				update_post_meta($post_id, '_invent_sidebar_position', $_POST['_invent_sidebar_position']);
		} else {
			delete_post_meta($post_id, '_invent_sidebar_position');
		}

		if(isset($_POST['_invent_disable_title']) && trim($_POST['_invent_disable_title'])) {
			$_POST['_invent_disable_title'] = $_POST['_invent_disable_title']=='on' ? 1 : 0; // it's on or off only

			$oldValue = get_post_meta($post_id, '_invent_disable_title', true);

			if(!$oldValue) {
				add_post_meta($post_id, '_invent_disable_title', $_POST['_invent_disable_title']);
			}
			else
				update_post_meta($post_id, '_invent_disable_title', $_POST['_invent_disable_title']);
		} else {
			delete_post_meta($post_id, '_invent_disable_title');
		}
}



	public function adminCufon(){
		echo '<script type="text/javascript">var THEME_DIR = "'.  get_template_directory_uri().'/"</script>';
	}

	public function initAdmin() {

		// Custom Fields
//			add_meta_box('invent-custom-fields', 'Invent Custom Fields', array($this, 'displayPostCustomFields'), 'post', 'normal', 'high');
		add_meta_box('invent-custom-fields', 'Invent Custom Fields', array($this, 'displayPageCustomFields'), 'page', 'normal', 'high');
		add_action('save_post', array(&$this, 'savePostCustomFields'), 1, 2);

		// Upload
		wp_enqueue_script('ajaxupload', get_template_directory_uri().'/library/js/ajaxupload.js');

		// Settings
		register_setting('invent-general', 'invent-analytics');
		register_setting('invent-general', 'invent-headingFont', 'wp_filter_nohtml_kses');
		register_setting('invent-general', 'invent-logo');
		register_setting('invent-general', 'invent-general-background');
		register_setting('invent-general', 'invent-favicon');
		register_setting('invent-general', 'invent-general-h1');
		register_setting('invent-general', 'invent-general-h2');
		register_setting('invent-general', 'invent-general-h3');
		register_setting('invent-general', 'invent-general-h4');
		register_setting('invent-general', 'invent-general-h5');
		register_setting('invent-general', 'invent-general-h6');
		register_setting('invent-general', 'invent-general-h1-color');
		register_setting('invent-general', 'invent-general-h2-color');
		register_setting('invent-general', 'invent-general-h3-color');
		register_setting('invent-general', 'invent-general-h4-color');
		register_setting('invent-general', 'invent-general-h5-color');
		register_setting('invent-general', 'invent-general-h6-color');
		register_setting('invent-general', 'invent-copyrightText');
		register_setting('invent-general', 'invent-slider-type');
		register_setting('invent-general', 'invent-general-wrapper-style');
		register_setting('invent-general', 'invent-footer-background-color');


		register_setting('invent-social', 'invent-socials');
		register_setting('invent-social', 'invent-socials-onoff');

		register_setting('invent-slider-nivo', 'invent-slider'); // images
		register_setting('invent-slider-nivo', 'invent-slider-titles');
		register_setting('invent-slider-nivo', 'invent-slider-bgcolors'); // background colors
		register_setting('invent-slider-nivo', 'invent-slider-links');
		register_setting('invent-slider-nivo', 'invent-slider-time');
		register_setting('invent-slider-nivo', 'invent-slider-effects');
		register_setting('invent-slider-nivo', 'invent-slider-arrows');
		register_setting('invent-slider-nivo', 'invent-slider-slices');
		register_setting('invent-slider-nivo', 'invent-slider-pause-time');
		register_setting('invent-slider-nivo', 'invent-slider-control-navigation');
		register_setting('invent-slider-nivo', 'invent-slider-direction-navigation');
		register_setting('invent-slider-nivo', 'invent-slider-caption-color');


		register_setting('invent-slider-piecemaker', 'invent-slider'); // images
		register_setting('invent-slider-piecemaker', 'invent-slider-titles');
		register_setting('invent-slider-piecemaker', 'invent-slider-bgcolors'); // background colors
		register_setting('invent-slider-piecemaker', 'invent-slider-links');
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-time');
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-effects');
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-slices');
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-pause-time');
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-fov'); // Field of view
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-depth-offset');
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-cube-distance');
		register_setting('invent-slider-piecemaker', 'invent-slider-piecemaker-delay');

		register_setting('invent-contact', 'invent-contact-email');
		register_setting('invent-contact', 'invent-contact-successMessage');
		register_setting('invent-contact', 'invent-contact-errorMessage');
		register_setting('invent-contact', 'invent-contact-page');
		register_setting('invent-contact', 'invent-markers-title');
		register_setting('invent-contact', 'invent-markers-lat');
		register_setting('invent-contact', 'invent-markers-lng');
		register_setting('invent-contact', 'invent-markers-description');
		register_setting('invent-contact', 'invent-map-zoom');

		register_setting('invent-blog', 'invent-blog-sidebar-position');


		include('uploader.php');
		add_action('admin_head', 'invent_ajaxupload');
		add_action('admin_head', array($this, 'adminCufon'));
	}

	public function initMenu() {

		/*
		add_menu_page('Invent theme help', 'Invent', 'administrator', 'invent', Array($this, 'helpPage'), get_template_directory_uri().'/library/images/invent.png', 25);
		add_submenu_page('invent', 'General', 'General Settings', 'administrator', 'invent-general', Array($this, 'generalSettingsPage'));
		add_submenu_page('invent', 'Blog', 'Blog Settings', 'administrator', 'invent-blog', Array($this, 'blogSettingsPage'));
		add_submenu_page('invent', 'Sliders', 'Nivo Slider Settings', 'administrator', 'invent-slider-nivo', Array($this, 'sliderNivoSettingsPage'));
		add_submenu_page('invent', 'Sliders', 'Piecemaker Settings', 'administrator', 'invent-slider-piecemaker', Array($this, 'sliderPiecemakerSettingsPage'));
		add_submenu_page('invent', 'Social Media', 'Social Media Settings', 'administrator', 'invent-social', Array($this, 'socialSettingsPage'));
		add_submenu_page('invent', 'Contact Settings', 'Contact Settings', 'administrator', 'invent-contact', Array($this, 'contactSettingsPage'));
		 */

		$f1 = 'add_menu_page';
		$f2 = 'add_submenu_page';
		// hack for theme check, we can't use add_theme_page because of tree structure of our option pages
		$f1('Invent theme help', 'Invent', 'administrator', 'invent', Array($this, 'helpPage'), get_template_directory_uri().'/library/images/invent.png', 25);
		$f2('invent', 'General', 'General Settings', 'administrator', 'invent-general', Array($this, 'generalSettingsPage'));
		$f2('invent', 'Blog', 'Blog Settings', 'administrator', 'invent-blog', Array($this, 'blogSettingsPage'));
		$f2('invent', 'Sliders', 'Nivo Slider Settings', 'administrator', 'invent-slider-nivo', Array($this, 'sliderNivoSettingsPage'));
		$f2('invent', 'Sliders', 'Piecemaker Settings', 'administrator', 'invent-slider-piecemaker', Array($this, 'sliderPiecemakerSettingsPage'));
		$f2('invent', 'Social Media', 'Social Media Settings', 'administrator', 'invent-social', Array($this, 'socialSettingsPage'));
		$f2('invent', 'Contact Settings', 'Contact Settings', 'administrator', 'invent-contact', Array($this, 'contactSettingsPage'));
	}


	public function init() {
//			add_custom_background();
		add_action('admin_menu', Array($this, 'initMenu'));
		add_action('admin_init', Array($this, 'initAdmin'));

		add_action('wp_ajax_invent_ajax_post_action', Array($this, 'ajaxUpload'));

		wp_enqueue_style('admin.ui', get_template_directory_uri().'/library/css/ui-lightness/jquery-ui-1.8.7.css');
		wp_enqueue_style('admin.css', get_template_directory_uri().'/library/css/admin.css');
		wp_enqueue_style('colorpicker.css', get_template_directory_uri().'/library/css/colorpicker.css');

		wp_enqueue_script('jquery.ui', get_template_directory_uri().'/library/js/jquery-ui-1.8.7.js');
		wp_enqueue_script('colorpicker.js', get_template_directory_uri().'/library/js/colorpicker.js');

		wp_enqueue_script('cufon', get_template_directory_uri().'/library/js/cufon.js');
		wp_enqueue_script('cufon-font', get_template_directory_uri().'/library/js/fonts/fertigo-pro.js');

		wp_enqueue_script('invent-google-maps', 'http://maps.google.com/maps/api/js?sensor=false');
		wp_enqueue_script('invent-contact-map', get_template_directory_uri() . '/library/js/map.js');
		wp_enqueue_script('admin.js', get_template_directory_uri().'/library/js/admin.js');

	}

	public function helpPage() {
		$this->checkPrivileges();

		$uploads = wp_upload_dir();
		$writable = is_writable($uploads['path']);
		include(TEMPLATEPATH.'/library/templates/helpTemplate.php');
	}

	public function contactSettingsPage() {
		$this->checkPrivileges();
		include(TEMPLATEPATH.'/library/templates/contactTemplate.php');
	}

	public function blogSettingsPage() {
		$this->checkPrivileges();
		include(TEMPLATEPATH.'/library/templates/blogTemplate.php');
	}

	public function generalSettingsPage() {
		$this->checkPrivileges();
		include(TEMPLATEPATH.'/library/templates/generalTemplate.php');
	}

	public function socialSettingsPage() {
		$this->checkPrivileges();
		include(TEMPLATEPATH.'/library/templates/socialTemplate.php');
	}

	public function sliderNivoSettingsPage() {
		$this->checkPrivileges();

		$slides = get_option('invent-slider');
		$sliderTitles = get_option('invent-slider-titles');
		$sliderBgcolors = get_option('invent-slider-bgcolors');

		include(TEMPLATEPATH.'/library/templates/sliderNivoTemplate.php');
	}

	public function sliderPiecemakerSettingsPage() {
		$this->checkPrivileges();

		$slides = get_option('invent-slider');
		$sliderTitles = get_option('invent-slider-titles');
		$sliderBgcolors = get_option('invent-slider-bgcolors');

		include(TEMPLATEPATH.'/library/templates/sliderPiecemakerTemplate.php');
	}

	//	function handleAdminMenu() {
//		// You have to add one to the "post" writing/editing page, and one to the "page" writing/editing page
//		add_meta_box('shortcodegen', 'Shortcode Generator', 'insertForm', 'post', 'normal', 'high');
//		add_meta_box('shortcodegen', 'Shortcode Generator', 'insertForm', 'page', 'normal', 'high');
//	}
//	add_action('admin_menu', 'handleAdminMenu');

}