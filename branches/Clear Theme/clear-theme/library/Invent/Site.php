<?php
class Invent_Site {

		function customBackground() {
//			$background = get_background_image();
//			$color = get_background_color();
//			if(!$background && !$color)
//				return;
//
//			$style = $color ? '#'.$color : '';
//
//			if($background) {
//				$image = 'url('.$background.');';
//
//				$repeat = get_theme_mod('background_repeat', 'repeat');
//				if(!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
//					$repeat = 'repeat';
////				$repeat = " background-repeat: $repeat;";
//
//				$position = get_theme_mod('background_position_x', 'left');
//				if(!in_array($position, array('center', 'right', 'left')))
//					$position = 'left';
//				$position = 'top '.$position;
//
////				$position = " background-position: top $position;";
//
//				$attachment = get_theme_mod('background_attachment', 'scroll');
//				if(!in_array($attachment, array('fixed', 'scroll')))
//					$attachment = 'scroll';
////				$attachment = " background-attachment: $attachment;";
//
//				$style .= ' '.$image.' '.$repeat.' '.$position.' '.$attachment;
//			}
//			$style = trim($style);
//			if($style)
//				echo '<style type="text/css">body{background: '.$style.' !important;}</style>';
		}

		public function imageHeader(){
		}

		public function editorStyle(){
		}

		public function comment($comment, $args, $depth) {
			$GLOBALS['comment'] = $comment;
			switch ($comment->comment_type) {
				case '' :
?>
						<li class="comment" id="li-comment-<?php comment_ID(); ?>"> <?php // comment_class();  ?>

							<?php echo get_avatar($comment, 110, get_template_directory_uri() . '/images/post/user.jpg'); ?>
							<div class="comment-text" id="comment-<?php comment_ID(); ?>">
								<!--a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"></a-->
								<h4>By <?php echo get_comment_author_link() ?>, <?php printf(__('%1$s at %2$s', 'invent'), get_comment_date(), get_comment_time()); ?></h4>

<?php if ($comment->comment_approved == '0') { ?>
								<p><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'invent'); ?></em></p>
<?php } ?>

								<?php comment_text(); ?> <?php edit_comment_link(__('(Edit)', 'invent'), ' '); ?>

								<div class="reply">
									<?php echo invent_get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
								</div>

							</div>
							<div class="clear"></div>
						</li>


<?php
					break;
				case 'pingback' :
				case 'trackback' :
?>
					<div class="post pingback">
						<p><?php _e('Pingback:', 'invent'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'invent'), ' '); ?></p>
					</div>
<?php
					break;
			}
		}

		public function __construct() {

			  //It will be available in next themes
			add_custom_background(Array($this, 'customBackground'), '', '');
			add_custom_image_header(Array($this, 'imageHeader'),Array($this, 'imageHeader'));
			add_editor_style(Array($this, 'editorStyle'));

			$shortcodes = new Invent_Shortcodes();

			/** DYNAMIC ICONS * */
			$shortcodes->icons(TEMPLATEPATH . '/images/icons/31x30');
			$shortcodes->icons(TEMPLATEPATH . '/images/icons/14x14_white');

//			remove_shortcode('gallery');
			add_shortcode('code', array($shortcodes, 'code'));
			add_shortcode('image', array($shortcodes, 'image'));
			add_shortcode('gallery', array($shortcodes, 'gallery'));
			add_shortcode('list', array($shortcodes, 'listElement'));
			add_shortcode('one_half', array($shortcodes, 'column_1_2'));
			add_shortcode('one_third', array($shortcodes, 'column_1_3'));
			add_shortcode('two_third', array($shortcodes, 'column_2_3'));
			add_shortcode('one_fourth', array($shortcodes, 'column_1_4'));
			add_shortcode('three_fourth', array($shortcodes, 'column_3_4'));

			add_shortcode('one_half_last', array($shortcodes, 'column_1_2_last'));
			add_shortcode('one_third_last', array($shortcodes, 'column_1_3_last'));
			add_shortcode('two_third_last', array($shortcodes, 'column_2_3_last'));
			add_shortcode('one_fourth_last', array($shortcodes, 'column_1_4_last'));
			add_shortcode('three_fourth_last', array($shortcodes, 'column_3_4_last'));

			add_shortcode('button', array($shortcodes, 'button'));
			add_shortcode('button_big', array($shortcodes, 'button_big'));
			add_shortcode('button_small', array($shortcodes, 'button_small'));
			add_shortcode('button_light', array($shortcodes, 'button_light'));

			add_shortcode('highlight_red', array($shortcodes, 'highlight_red'));
			add_shortcode('highlight_orange', array($shortcodes, 'highlight_orange'));
			add_shortcode('highlight_blue', array($shortcodes, 'highlight_blue'));
			add_shortcode('highlight_green', array($shortcodes, 'highlight_green'));
			add_shortcode('highlight_gray', array($shortcodes, 'highlight_gray'));
			add_shortcode('highlight_pink', array($shortcodes, 'highlight_pink'));
			add_shortcode('highlight_yellow', array($shortcodes, 'highlight_yellow'));

			add_shortcode('error_box', array($shortcodes, 'error_box'));
			add_shortcode('message_box', array($shortcodes, 'message_box'));
			add_shortcode('alert_box', array($shortcodes, 'alert_box'));
			add_shortcode('success_box', array($shortcodes, 'success_box'));

			add_shortcode('blockquote', array($shortcodes, 'blockquote'));

			add_shortcode('contact_map', array($shortcodes, 'contact_map'));
			add_shortcode('contact_form', array($shortcodes, 'contact_form'));

			add_shortcode('dailymotion', array($shortcodes, 'dailymotion'));
			add_shortcode('vimeo', array($shortcodes, 'vimeo'));
			add_shortcode('youtube', array($shortcodes, 'youtube'));
		}

		function wp_link_pages($args = '') {
			$defaults = array(
				'before' => '<p>', 'after' => '</p>',
				'link_before' => '', 'link_after' => '',
				'item_before' => '', 'item_after' => '', 'item_active_before' => '',
				'next_or_number' => 'number', 'nextpagelink' => __('Next page'),
				'previouspagelink' => __('Previous page'), 'pagelink' => '%',
				'echo' => 1
			);

			$r = wp_parse_args($args, $defaults);
			$r = apply_filters('wp_link_pages_args', $r);
			extract($r, EXTR_SKIP);

			global $page, $numpages, $multipage, $more, $pagenow;

			$output = '';
			if ($multipage) {
				if ('number' == $next_or_number) {
					$output .= $before;
					for ($i = 1; $i < ($numpages + 1); $i = $i + 1) {
						$j = str_replace('%', $i, $pagelink);
						$output .= ' ';
						if (($i != $page) || ((!$more) && ($page == 1))) {
							$output .= $item_before;
							$output .= _wp_link_page($i);
						}
						else
							$output .= $item_active_before;

						$output .= $link_before . $j . $link_after;
						if (($i != $page) || ((!$more) && ($page == 1)))
							$output .= '</a>';
						$output .= $item_after;
					}
					$output .= $after;
				} else {
					if ($more) {
						$output .= $before;
						$i = $page - 1;
						$output .=$item_before;
						if ($i && $more) {
							$output .= _wp_link_page($i);
							$output .= $link_before . $previouspagelink . $link_after . '</a>';
						}
						$i = $page + 1;
						if ($i <= $numpages && $more) {
							$output .= _wp_link_page($i);
							$output .= $link_before . $nextpagelink . $link_after . '</a>';
						}
						$output .= $item_after;
						$output .= $after;
					}
				}
			}

			if ($echo)
				echo $output;

			return $output;
		}

	}