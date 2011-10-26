<?php get_header(); ?>

<div id="content" class="wrapper">

	<?php
		$disableTitle = (int) get_post_meta(get_the_ID(), '_invent_disable_title', true);
	?>
	<?php if($disableTitle==0) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<hr id="blog-hr" />
	<?php } else { ?>
			<div class="clear"></div>
		<?php } ?>
			
<?php /* sidebar start */ ?>
<?php
// 1 = left
// 2 = right
// 3 = no
$sidebarPosition = (int) get_post_meta(get_the_ID(), '_invent_sidebar_position', true);
if($sidebarPosition==0) $sidebarPosition = 3;

if($sidebarPosition == 1) { ?>
		<div class="column-1-4" id="sidebar">
<?php
	if (is_active_sidebar( 'sidebar-widget-area' ) )
		dynamic_sidebar('sidebar-widget-area');
?>
				</div>
<?php } ?>
				<?php if($sidebarPosition<3) { ?><div class="column-3-4<?php if($sidebarPosition==1) echo ' column-last'; ?>"><?php } ?>
<?php /* sidebar end */ ?>



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	
						<?php the_content(); ?>
							

<?php endwhile; ?>



<?php /* sidebar start */ ?>
	<?php if($sidebarPosition<3) { ?></div><?php } ?>

	<?php if($sidebarPosition == 2) { ?>
	<div class="column-1-4 column-last" id="sidebar">
		<?php if (is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
			<?php dynamic_sidebar('sidebar-widget-area'); ?>
		<?php } ?>
	</div>
	<?php } ?>
<?php /* sidebar end */ ?>


	</div>

<?php get_footer(); ?>
