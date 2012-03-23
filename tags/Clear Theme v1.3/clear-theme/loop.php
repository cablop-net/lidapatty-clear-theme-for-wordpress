<?php get_header(); ?>

	<?php
		$disableTitle = 0;
		$blogPageId = (int)get_option('page_for_posts');
		if($blogPageId) {
			$disableTitle = (int) get_post_meta($blogPageId, '_invent_disable_title', true);
		}
	?>

<!--<div id="content" class="wrapper" role="main">-->
<?php if($disableTitle==0) { ?>
	<h1 class="entry-title"><?php wp_title(''); ?></h1>
<?php } ?>
	<hr id="blog-hr" />
		<?php
		// 1 = left
		// 2 = right
		// 3 = no
		$sidebarPosition = (int) get_option('invent-blog-sidebar-position');

		if(isset($_GET['position'])){
			if($_GET['position']=='left')
				$sidebarPosition = 1;

			if($_GET['position']=='right')
				$sidebarPosition = 2;

			if($_GET['position']=='nosidebar')
				$sidebarPosition = 3;
		}

		if($sidebarPosition==0) $sidebarPosition = 2;
		?>
				<?php if($sidebarPosition == 1) { ?>
				<div class="column-1-4 clear" id="sidebar">
					<?php if (is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
						<?php dynamic_sidebar('sidebar-widget-area'); ?>
					<?php } ?>
				</div>
				<?php } ?>

				<?php if($sidebarPosition<3) { ?> <div class="column-3-4<?php if($sidebarPosition==1) echo ' column-last'; ?>"> <?php } ?>

<?php if ( $wp_query->max_num_pages > 1 ) { ?>
	<!--div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> '.__( 'Older posts', 'invent' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'invent' ).' <span class="meta-nav">&rarr;</span>' ); ?></div>
	</div--><!-- #nav-above -->
<?php } ?>


<?php if ( ! have_posts() ) { ?>
	<div id="post-0" class="post error404 not-found">
		<h3 class="entry-title"><?php _e( 'Not Found', 'invent' ); ?></h3>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'invent' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php } ?>



<?php $first = true; while ( have_posts() ) { the_post(); ?>

				<?php if($first) {  $first = false; } else { ?>
				<div class="clear"></div>
				<hr class="post-separator"/>
				<?php } ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'invent' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

					<?php echo invent_get_the_post_thumbnail(get_the_ID(), $sidebarPosition==3); ?>

					<?php if(get_option('invent-blog-show-metadata')) { ?>
					<ul class="post-info">
						<li class="post-info-time"><?php echo get_the_date() ?></li>
						<li class="post-info-category"><?php echo get_the_category_list( ', ' ) ?></li>
						<li class="post-info-comments"><?php
							$number = get_comments_number();
							if ( $number > 1 )
								$output = str_replace('%', number_format_i18n($number), __('% Comments'));
							elseif ( $number == 0 )
								$output = __('No Comments','invent');
							else
								$output = __('1 Comment','invent');

							echo $output;
						?></li>
						<li class="post-info-tags"><?php echo get_the_tag_list('', ', ' ) ?></li>
					</ul>
					<?php } ?>

					<div class="entry-content">
						<?php the_content( '' ); ?>

						
					</div>
						<p class="clear left post-read-more"> <a href="<?php the_permalink(); ?>" class="invent-button"><span><?php _e('Read more...', 'invent') ?></span></a></p>

				</div><!-- #post-## -->


<?php } ?>

				
<hr id="blog-footer" />

				<?php if (  $wp_query->max_num_pages > 1 ) { ?>

				<div id="nav-below">
					<div class="prev"><?php next_posts_link('<span><span class="arrow-left"></span> '. __( 'Older posts', 'invent' ).'</span>' ); ?></div>
					<div class="next"><?php previous_posts_link('<span>'. __( 'Newer posts', 'invent' ).'<span class="arrow-right"></span></span>' ); ?></div>
				</div><!-- #nav-below -->
				<?php } ?>


				<?php if($sidebarPosition<3) { ?> </div> <?php } ?>

				<?php if($sidebarPosition == 2) { ?>
				<div class="column-1-4 column-last" id="sidebar">
					<?php if (is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
						<?php dynamic_sidebar('sidebar-widget-area'); ?>
					<?php } ?>
				</div>
				<?php } ?>

	<div class="clear"></div>
</div>

<?php get_footer(); ?>
