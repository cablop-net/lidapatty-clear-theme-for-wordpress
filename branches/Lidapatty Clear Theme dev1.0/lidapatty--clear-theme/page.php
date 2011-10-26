<?php get_header(); ?>

<div id="content" class="wrapper">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php
		$disableTitle = (int) get_post_meta(get_the_ID(), '_invent_disable_title', true);
	?>
	
	<?php if($disableTitle==0) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<hr id="blog-hr" />
	<?php } else { ?>
			<div class="clear"></div>
		<?php } ?>

						<?php the_content(); ?>
							

<?php endwhile; ?>

	</div>


<?php get_footer(); ?>

