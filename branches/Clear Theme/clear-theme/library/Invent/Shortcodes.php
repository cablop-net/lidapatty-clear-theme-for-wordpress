<?php
class Invent_Shortcodes {

	public $createdIcons = array();
	private $includeMap = false;
	
	public function __construct(){
			/** DYNAMIC ICONS * */
			$this->icons(TEMPLATEPATH . '/images/icons/31x30');
			$this->icons(TEMPLATEPATH . '/images/icons/14x14_white');

//			remove_shortcode('gallery');
			add_shortcode('code', array($this, 'code'));
			add_shortcode('image', array($this, 'image'));
			add_shortcode('gallery', array($this, 'gallery'));
			add_shortcode('list', array($this, 'listElement'));
			add_shortcode('one_half', array($this, 'column_1_2'));
			add_shortcode('one_third', array($this, 'column_1_3'));
			add_shortcode('two_third', array($this, 'column_2_3'));
			add_shortcode('one_fourth', array($this, 'column_1_4'));
			add_shortcode('three_fourth', array($this, 'column_3_4'));

			add_shortcode('one_half_last', array($this, 'column_1_2_last'));
			add_shortcode('one_third_last', array($this, 'column_1_3_last'));
			add_shortcode('two_third_last', array($this, 'column_2_3_last'));
			add_shortcode('one_fourth_last', array($this, 'column_1_4_last'));
			add_shortcode('three_fourth_last', array($this, 'column_3_4_last'));

			add_shortcode('button', array($this, 'button'));
			add_shortcode('button_big', array($this, 'button_big'));
			add_shortcode('button_small', array($this, 'button_small'));
			add_shortcode('button_light', array($this, 'button_light'));

			add_shortcode('highlight_red', array($this, 'highlight_red'));
			add_shortcode('highlight_orange', array($this, 'highlight_orange'));
			add_shortcode('highlight_blue', array($this, 'highlight_blue'));
			add_shortcode('highlight_green', array($this, 'highlight_green'));
			add_shortcode('highlight_gray', array($this, 'highlight_gray'));
			add_shortcode('highlight_pink', array($this, 'highlight_pink'));
			add_shortcode('highlight_yellow', array($this, 'highlight_yellow'));

			add_shortcode('error_box', array($this, 'error_box'));
			add_shortcode('message_box', array($this, 'message_box'));
			add_shortcode('alert_box', array($this, 'alert_box'));
			add_shortcode('success_box', array($this, 'success_box'));

			add_shortcode('blockquote', array($this, 'blockquote'));

			add_shortcode('contact_map', array($this, 'contact_map'));
			add_shortcode('contact_form', array($this, 'contact_form'));

			add_shortcode('dailymotion', array($this, 'dailymotion'));
			add_shortcode('vimeo', array($this, 'vimeo'));
			add_shortcode('youtube', array($this, 'youtube'));

			add_shortcode('accordions', array($this, 'accordions'));
			add_shortcode('accordion', array($this, 'accordion'));
			add_shortcode('tabs', array($this, 'tabs'));
			add_shortcode('tab', array($this, 'tab'));

//			add_shortcode('carousel', array($this, 'carousel'));
//			add_shortcode('carousel_item', array($this, 'carousel_item'));

			add_shortcode('spacer10', array($this, 'spacer10'));
			add_shortcode('spacer20', array($this, 'spacer20'));
			add_shortcode('spacer30', array($this, 'spacer30'));

			add_action('init', array($this, 'register_map'));
			add_action('wp_footer', array($this, 'print_map'));
	}

	public function __call($name, $args) {
		// icon_
		$data = explode('|', $name);
		$data[0] = substr($data[0], 5);
		return '<img src="' . get_template_directory_uri() . '/' . $data[1] . $data[0] . '.png" class="icon" alt="' . $data[0] . '" />';
	}

	public function icons($iconDir) {

		if (file_exists($iconDir)) {
			$icons = scandir($iconDir);

			if (is_array($icons)) {
				array_shift($icons); // "." file
				array_shift($icons); // ".." file

				foreach ($icons as $icon) {
					if (is_dir($iconDir . '/' . $icon))
						$this->icons($iconDir . '/' . $icon);
					else {
						// dropping extension
						$icon = substr($icon, 0, strrpos($icon, '.'));

						if(!in_array($icon, $this->createdIcons)) {
							// creating shortcode
							add_shortcode('icon_' . $icon, Array($this, 'icon_' . $icon . '|' . substr($iconDir, strlen(TEMPLATEPATH) + 1) . '/'));
							$this->createdIcons[] = $icon;
						}
					}
				}

			}
		}
	}

	public function listElement($attr, $content='') {

		if (!empty($attr['type']))
			$content = str_replace('<ul', '<ul class="' . $attr['type'] . ' invent-list"', do_shortcode($content));
		return $content;
	}

	public function code($attr, $content='') {

		$lines = explode("\n", $content);

		if (trim($lines[0]) == '') {
			array_shift($lines);
		}
		$n = count($lines);

		if (trim($lines[$n - 1]) == '') {
			array_pop($lines);
			--$n;
		}

		$return = '<div class="code-container"><div class="code-lines">';
		for ($i = 1; $i <= $n; ++$i) {
			$return .='<span>' . ($i < 10 ? '0' : '') . $i . '</span>';
		}

		$return .= '</div><p><code>';
		for ($i = 0; $i < $n; ++$i) {
			$return.='<span>' . trim($lines[$i]) . '</span>';
		}

		$return .= '</code></p></div>';

		return $return;
	}

	public function highlight_yellow($attr, $content='') {
		return '<span class="highlight-yellow">' . do_shortcode($content) . '</span>';
	}

	public function highlight_blue($attr, $content='') {
		return '<span class="highlight-blue">' . do_shortcode($content) . '</span>';
	}

	public function highlight_orange($attr, $content='') {
		return '<span class="highlight-orange">' . do_shortcode($content) . '</span>';
	}

	public function highlight_red($attr, $content='') {
		return '<span class="highlight-red">' . do_shortcode($content) . '</span>';
	}

	public function highlight_green($attr, $content='') {
		return '<span class="highlight-green">' . do_shortcode($content) . '</span>';
	}

	public function highlight_gray($attr, $content='') {
		return '<span class="highlight-gray">' . do_shortcode($content) . '</span>';
	}

	public function highlight_pink($attr, $content='') {
		return '<span class="highlight-pink">' . do_shortcode($content) . '</span>';
	}

	/** COLUMNS * */
	public function column_1_2($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-1-2">' . wpautop(do_shortcode($content)) . '</div>';
	}

	public function column_1_3($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-1-3">' . wpautop(do_shortcode($content)) . '</div>';
	}

	public function column_2_3($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-2-3">' . wpautop(do_shortcode($content)) . '</div>';
	}

	public function column_1_4($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-1-4">' . wpautop(do_shortcode($content)) . '</div>';
	}

	public function column_3_4($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-3-4">' . wpautop(do_shortcode($content)) . '</div>';
	}

	public function column_1_2_last($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-1-2 column-last">' . wpautop(do_shortcode($content)) . '</div><div class="emptyclear"></div>';
	}

	public function column_1_3_last($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-1-3 column-last">' . wpautop(do_shortcode($content)) . '</div><div class="emptyclear"></div>';
	}

	public function column_2_3_last($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-2-3 column-last">' . wpautop(do_shortcode($content)) . '</div><div class="emptyclear"></div>';
	}

	public function column_1_4_last($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-1-4 column-last">' . wpautop(do_shortcode($content)) . '</div><div class="emptyclear"></div>';
	}

	public function column_3_4_last($attr, $content='') {
		$content = remove_invalid_tags($content, array('p'));
		return '<div class="column-3-4 column-last">' . wpautop(do_shortcode($content)) . '</div><div class="emptyclear"></div>';
	}

	/** BUTTONS * */
	public function button($attr, $content='') {

		if (empty($attr['align']) || ($attr['align'] != 'right' && $attr['align'] != 'left'))
			$attr['align'] = 'left';

		if (empty($attr['url']))
			return '<div class="' . $attr['align'] . ' mb15"><span class="invent-button"><span>' . do_shortcode($content) . '</span></span></div><div class="clear"></div>';
		else
			return '<div class="' . $attr['align'] . ' mb15"><a href="' . $attr['url'] . '" class="invent-button"><span>' . do_shortcode($content) . '</span></a></div><div class="clear"></div>';
	}

	public function button_big($attr, $content='') {

		$allowedColors = Array('light', 'blue', 'green', 'red', 'dark', 'light2', 'blue2', 'green2', 'red2', 'dark2');
		if (empty($attr['color']) || !in_array($attr['color'], $allowedColors))
			$attr['color'] = 'light';
		if (empty($attr['url']))
			return '<div class="button-big-' . $attr['color'] . '"><h3><span>' . do_shortcode($content) . '</span></h3></div>';
		else
			return '<div class="button-big-' . $attr['color'] . '"><h3><a href="' . $attr['url'] . '"><span>' . do_shortcode($content) . '</span></a></h3></div>';
	}

	public function button_small($attr, $content='') {
		$allowedColors = Array('light', 'blue', 'green', 'red', 'dark', 'light2', 'blue2', 'green2', 'red2', 'dark2');
		if (empty($attr['color']) || !in_array($attr['color'], $allowedColors))
			$attr['color'] = 'light';
		if (empty($attr['url']))
			return '<div class="button-small-' . $attr['color'] . '"><h6><span>' . do_shortcode($content) . '</span></h6></div>';
		else
			return '<div class="button-small-' . $attr['color'] . '"><h6><a href="' . $attr['url'] . '"><span>' . do_shortcode($content) . '</span></a></h6></div>';
	}

	public function error_box($attr, $content='') {
		if (!empty($attr['title']))
			return '<div class="box-red"><h3>' . $attr['title'] . '</h3><p>' . do_shortcode($content) . '</p></div>';
		else
			return '<div class="box-red">' . do_shortcode($content) . '</div>';
	}

	public function alert_box($attr, $content='') {
		if (!empty($attr['title']))
			return '<div class="box-orange"><h3>' . $attr['title'] . '</h3><p>' . do_shortcode($content) . '</p></div>';
		else
			return '<div class="box-orange">' . do_shortcode($content) . '</div>';
	}

	public function message_box($attr, $content='') {
		if (!empty($attr['title']))
			return '<div class="box-blue"><h3>' . $attr['title'] . '</h3><p>' . do_shortcode($content) . '</p></div>';
		else
			return '<div class="box-blue">' . do_shortcode($content) . '</div>';
	}

	public function success_box($attr, $content='') {
		if (!empty($attr['title']))
			return '<div class="box-green"><h3>' . $attr['title'] . '</h3><p>' . do_shortcode($content) . '</p></div>';
		else
			return '<div class="box-green">' . do_shortcode($content) . '</div>';
	}

	public function blockquote($attr, $content='') {
		if (!empty($attr['author']))
			return '<blockquote><p>' . do_shortcode($content) . '</p><p class="strong">' . $attr['author'] . '</p></blockquote>';
		else
			return '<blockquote class="no-author"><p>' . do_shortcode($content) . '</p></blockquote>';
	}


	public function youtube($attr) {

		$attr = shortcode_atts(array(
			'width' => 700,
			'height' => 400,
			'video_id' => ''
		), $attr);

		return '<div class="invent-video-container"><object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$attr['video_id'].'&hd=1" style="width:'.$attr['width'].'px;height:'.$attr['height'].'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$attr['video_id'].'&hd=1" /></object></div>';
	}


	function vimeo($attr) {

		$attr = shortcode_atts(array(
			'width' => 700,
			'height' => 400,
			'video_id' => ''
		), $attr);

		return '<div class="invent-video-container"><object width="'.$attr['width'].'" height="'.$attr['height'].'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$attr['video_id'].'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$attr['video_id'].'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$attr['width'].'" height="'.$attr['height'].'" wmode="transparent"></embed></object></div>';
	}


	function dailymotion($attr) {

		$attr = shortcode_atts(array(
			'width' => 700,
			'height' => 400,
			'video_id' => ''
		), $attr);

		return '<div class="invent-video-container"><iframe frameborder="0" width="'.$attr['width'].'" height="'.$attr['height'].'" src="http://www.dailymotion.com/embed/video/'.$attr['video_id'].'?width=560&theme=default&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=1&additionalInfos=0&autoPlay=0&hideInfos=0"></iframe></div>';
	}


	function accordions($attr, $content='') {
		$attr = shortcode_atts(array(
			'style' => 'style1'
		), $attr);

		return '<div class="acc-'.$attr['style'].' invent-accordion">'.do_shortcode($content).'</div>';
	}

	function accordion($attr, $content='') {

		$attr = shortcode_atts(array(
			'title' => '',
			'active' => false
		), $attr);

		return'
		<h3>'.$attr['title'].'</h3>
		<div class="acc-content'.($attr['active'] ? ' active' : '').'">
			<div>
			'.do_shortcode($content).'
			</div>
		</div>';
	}

	function tabs($attr, $content='') {
		$attr = shortcode_atts(array(
			'style' => 'style1'
		), $attr);
		$attr['style'] = 'style1';

		$r = '<div class="tab-'.$attr['style'].' invent-tabs">';
		$content = do_shortcode($content);

		$matches = array();
		preg_match_all("#\[invent\_tab\_title\_(\d+)\](.*?)\[/invent\_tab\_title\_\\1\]#", $content, $matches, PREG_SET_ORDER);
		$content = preg_replace("#\[invent\_tab\_title\_(\d+)\](.*?)\[/invent\_tab\_title\_\\1\]#", '', $content);
		if(!empty($matches)) {

			$r .= '<ul>';
			foreach($matches as $item) {
				$r .= '<li><h5><a href="#invent-tab-'.$item[1].'">'.$item[2].'</a></h5></li>';
			}

			$r .= '</ul>';
		}
		else
			return '';

		return $r.'<div class="invent-panes">'.$content.'</div></div>';
	}

	function tab($attr, $content='') {
		static $tabId = 0;
		$tabId++;

		$attr = shortcode_atts(array(
			'title' => '',
			'active' => false
		), $attr);

		return '[invent_tab_title_'.$tabId.']'.$attr['title'].'[/invent_tab_title_'.$tabId.']<div class="tab-content" id="invent-tab-'.$tabId.'">'.do_shortcode($content).'</div>';
	}
	
	public function gallery($attr) {
		global $post, $wp_locale;

		static $instance = 0;
		$instance++;

		$output = '';
		// Allow plugins/themes to override the default gallery template.
//			$output = apply_filters('post_gallery', '', $attr);
//			if($output != '')
//				return $output;
		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if (isset($attr['orderby'])) {
			$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
			if (!$attr['orderby'])
				unset($attr['orderby']);
		}

		$attr = shortcode_atts(array(
					'order' => 'ASC',
					'orderby' => 'menu_order ID',
					'id' => $post->ID,
					'itemtag' => 'div',
					'icontag' => 'div',
					'captiontag' => 'p',
					'columns' => 3,
					'size' => 'thumbnail',
					'include' => '',
					'exclude' => '',
					'title' => '',
					'link' => 'yes'
				), $attr);

		extract($attr);
		$id = intval($id);
		if ('RAND' == $order)
			$orderby = 'none';

		if (!empty($include)) {
			$include = preg_replace('/[^0-9,]+/', '', $include);
			$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

			$attachments = array();
			foreach ($_attachments as $key => $val) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif (!empty($exclude)) {
			$exclude = preg_replace('/[^0-9,]+/', '', $exclude);
			$attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
		} else {
			$attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
		}

		if (empty($attachments))
			return '';

		if (is_feed ()) {
			$output = "\n";
			foreach ($attachments as $att_id => $attachment)
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}

		$itemtag = 'li'; // tag_escape($itemtag);
		$captiontag = tag_escape($captiontag);

		switch ($columns) {
			case 1:
				$size = 'invent-huge';
				break;
			case 2:
				$size = 'invent-big';
				break;
			case 3:
				$size = 'invent-medium';
				break;
			default:
				$size = 'invent-small';
				$columns = 4;
		}

		switch ($size) {
			case 'thumbnail':
			case 'small':
				$size = 'invent-small';
				$columns = '4';
				break;
			case 'medium':
				$size = 'invent-medium';
				$columns = '3';
				break;
			case 'big':
				$size = 'invent-big';
				$columns = '2';
				break;
			case 'huge':
				$size = 'invent-huge';
				$columns = '1';
				break;
		}

		$float = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";

		$output .= apply_filters('gallery_style', '<ul id="' . $selector . '" class="portfolio-1-' . $columns . ' hidden">');

		$splitter = '<ul id="gallery-splitter-' . $instance . '" class="gallery-splitter">';
		$splitter .= '<li class="segment-0 selected-1"><a href="#" rel="all">'.get_option('invent-gallery-allCategoryTitle').'</a></li>';
		$addSplitter = false;
		$categories = Array();
		$imagesCount = count($attachments);
		$i = 0;
		foreach ($attachments as $id => $attachment) {
			$i++;
			// $link = isset($attr['link']) && 'file' == $attr['link'] ? invent_get_attachment_link($id, $size, false, false, false, 'default-'.$instance) : invent_get_attachment_link($id, $size, true, false, false, 'default-'.$instance);
			$link = invent_get_attachment_link($id, $size, false, false, false, 'default-' . $instance, $attr['link']!='no');

			$c = explode(',', $attachment->post_excerpt);
			foreach ($c as $category) {
				if ($category && !in_array($category, $categories)) {
					$categories[] = $category;
					$splitter .= '<li class="segment-' . count($categories) . '"><a href="#" rel="gallerygroup-' . str_replace(' ', '-', $category) . '">' . $category . '</a></li>';
					$addSplitter = true;
				}
			}

			$classes = explode(',', str_replace(' ', '-', $attachment->post_excerpt));
			foreach ($classes as $key => $value)
				$classes[$key] = 'gallerygroup-' . $value;

			$output .= '<' . $itemtag . ' rel="id-' . $attachment->ID . '" ' . (($attachment->post_excerpt) ? 'class="' . implode(' ', $classes) . '"' : '') . '>' . "\n";
			$output .= '<div class="image-decorations">' . $link . "</div>\n";

			if (empty($attr['title']) || $attr['title'] != 'none') {

				$content = do_shortcode($attachment->post_content);

				if($i==$imagesCount) // last element should make some margin even description is empty
					$output .= '<div class="image-description' . (empty($content) ? ' no-description' : '') . '"><h3>' . $attachment->post_title . '</h3><p>' . (!empty($content) ? $content  : '') . '</p></div>' . "\n";
				else
					$output .= '<div class="image-description' . (empty($content) ? ' no-description' : '') . '"><h3>' . $attachment->post_title . '</h3>' . (!empty($content) ? '<p>' . $content . '</p>' : '') . '</div>' . "\n";
			}

			$output .= "</{$itemtag}>\n\n";
		}


		$output .= '

				</ul>'."\n";

		$splitter .='</ul><div class="clear"></div>';


		return ($addSplitter) ? $splitter . $output : $output;
	}

	public function image($attr) {
		global $post;

		if (!isset($attr['align']))
			$attr['align'] = 'no-align';
			//|| $attr['align'] != 'right')
			//$attr['align'] = 'left';

		if(empty($attr['size'])) $attr['size'] = 'small';

		switch($attr['size'])
		{
			case 'one_fourth':
			case 'small': // 1-4
				$imageSize = 'invent-small';
				break;
			case 'one_third':
			case 'medium': // 1-3
				$imageSize = 'invent-medium';
				break;
			case 'large':
			case 'two_third':
				$imageSize = 'invent-large';
				break;
			case 'one_half':
			case 'big': // 1-2
				$imageSize = 'invent-big';
				break;
			case 'three_fourth':
			case 'huge': // 3-4
				$imageSize = 'invent-huge';
				break;
			case 'full': // 1-1
				$imageSize = 'invent-full';
				break;
			default:
				$imageSize = 'invent-small';
		}
		global $wpdb;
		$imageId=$wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid = %s", $attr['src']));

		// dummy data hack
		if(!$imageId && strpos($attr['src'], 'http://invent-themes.com/demo/clear-theme/')!==false) {
			$attr['src']= substr($attr['src'], 42);
			$imageId=$wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid LIKE %s", '%'.$attr['src']));
		}

		if(isset($imageId))
			return '<span class="image-decorations image-' . $attr['align'] . '">' . invent_get_attachment_link($imageId, $imageSize, false, false, false, 'image-' . $imageId, true, isset($attr['url']) ? $attr['url'] : null) . '</span>';
		else
			return '<span class="image-decorations image-' . $attr['align'] . '"> <img src="'.$attr['src'].'" alt="" /> </span>';
	}

	public function register_map(){
		wp_print_scripts('google-maps');
		wp_print_scripts('google-map');
	}

	public function print_map(){
		if($this->includeMap){
			wp_print_scripts('google-maps');
			wp_print_scripts('invent-map');
		}
	}

	public function contact_map($attr) {
		$lat = get_option('invent-markers-lat');
		$lng = get_option('invent-markers-lng');
		$this->includeMap = true;

		$lat = (float) $lat[0];
		$lng = (float) $lng[0];
		if ($lat != 0 && $lng != 0) {
			wp_register_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=false',  array(), null, true);
			wp_register_script( 'invent-map', get_template_directory_uri().'/js/map.js', array( 'jquery', 'google-maps' ), null, true );

			return '<div id="map-canvas"></div>';
		}
		else
			return '';
	}

	public function contact_form($attr) {
		include(TEMPLATEPATH.'/library/contactPage.php');
		return $contactForm;
	}

}