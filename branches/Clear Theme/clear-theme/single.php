<?php get_header(); ?>

			<div id="content" class="wrapper">

				<h1 class="entry-title"><?php the_title(); ?></h1>
				<hr id="blog-hr" />
<?php
// 1 = left
// 2 = right
// 3 = no
$sidebarPosition = (int) get_post_meta(get_the_ID(), '_invent_sidebar_position', true);
if($sidebarPosition==0) $sidebarPosition = (int) get_option('invent-blog-sidebar-position');
if($sidebarPosition==0) $sidebarPosition = 2;

if(isset($_GET['position'])){
	if($_GET['position']=='left')
		$sidebarPosition = 1;

	if($_GET['position']=='right')
		$sidebarPosition = 2;

	if($_GET['position']=='nosidebar')
		$sidebarPosition = 3;
}

if($sidebarPosition==0) $sidebarPosition = 2;
if($sidebarPosition == 1) { ?>
				<div class="column-1-4" id="sidebar">
<?php
	if (is_active_sidebar( 'sidebar-widget-area' ) )
		dynamic_sidebar('sidebar-widget-area');
?>
				</div>
<?php } ?>

				<?php if($sidebarPosition<3) { ?><div class="column-3-4<?php if($sidebarPosition==1) echo ' column-last'; ?>"><?php } ?>

				<!-- post content -->
			<?php if ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div><?php echo invent_get_the_post_thumbnail( get_the_ID(), $sidebarPosition==3 );?></div>

					<?php if(get_option('invent-blog-show-metadata')) { ?>
					<ul class="post-info">
						<li class="post-info-time"><?php echo get_post_time('F j, Y',false, null, true) ?></li>
						<li class="post-info-category"><?php echo get_the_category_list( ', ' ) ?></li>
						<li class="post-info-comments"><?php
							$number = get_comments_number();
							if ( $number > 1 )
								$output = str_replace('%', number_format_i18n($number), __('% Comments'));
							elseif ( $number == 0 )
								$output = __('No Comments', 'invent');
							else
								$output = __('1 Comment','invent');

							echo $output;
						?></li>
						<li class="post-info-tags"><?php echo get_the_tag_list('', ', ' ) ?></li>
					</ul>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->


					<?php $invent->wp_link_pages( array( 'before' =>'<ul class="paginator">', 'after' => '</ul>', 'item_before' => '<li>', 'item_after' => '</li>', 'item_active_before' => '<li class="active">') ); ?>

					<div class="clear"></div>
				</div>
				<!-- post content -->

				<div id="comments" class="invent-form">
					<?php comments_template( '', true ); ?>
				</div>

				<?php endif; ?>

				<?php if($sidebarPosition<3) { ?></div><?php } ?>

				<?php if($sidebarPosition == 2) { ?>
				<div class="column-1-4 column-last" id="sidebar">
					<?php if (is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
						<?php dynamic_sidebar('sidebar-widget-area'); ?>
					<?php } ?>
				</div>
				<?php } ?>

			</div>
<?php get_footer(); ?>
