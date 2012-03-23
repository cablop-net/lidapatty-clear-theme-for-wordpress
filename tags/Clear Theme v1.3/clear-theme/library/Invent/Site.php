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

			// javascript and css files
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery-1.6.2.min.js', array(), '1.6.2');
			wp_enqueue_script ('jquery' );

			wp_enqueue_script( 'jquery-invent-scripts', get_template_directory_uri().'/js/jquery.external.js', array( 'jquery' ), '1.0' );
//			wp_enqueue_script( 'jquery-easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array( 'jquery' ), '1.3' );
//			wp_enqueue_script( 'jquery-tiptip', get_template_directory_uri().'/js/jquery.tiptip.minified.js', array( 'jquery' ), '1.3' );
//			wp_enqueue_script( 'jquery-scrollto', get_template_directory_uri().'/js/jquery.scrollto.min.js', array( 'jquery' ), '1.4.2' );
//			wp_enqueue_script( 'cufon', get_template_directory_uri().'/js/cufon.js', array(), '1.09i' );


			//It will be available in next themes
			add_custom_background(Array($this, 'customBackground'), '', '');
			add_custom_image_header(Array($this, 'imageHeader'),Array($this, 'imageHeader'));
			add_editor_style(Array($this, 'editorStyle'));

			$shortcodes = new Invent_Shortcodes();
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