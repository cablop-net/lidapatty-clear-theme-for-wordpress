<?php if ( post_password_required() ) { ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'invent' ); ?></p>
			<!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
}
?>

<?php if ( have_comments() ) { ?>
					<h3 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'invent' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'invent' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'invent' ) ); ?></div>
			</div> <!-- .navigation -->
<?php } // check for comment navigation ?>

					<ol class="comment-list">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use twentyten_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define twentyten_comment() and that will be used instead.
					 * See twentyten_comment() in twentyten/functions.php for more.
					 */
					global $invent;
					include_once(TEMPLATEPATH.'/library/Invent/Walker/Comment.php');
					$inventWalkerComment = new Invent_Walker_Comment;
					wp_list_comments( array('walker' => $inventWalkerComment, 'callback' => Array($invent, 'comment') ) );
				?>
					</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'invent' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'invent' ) ); ?></div>
					</div><!-- .navigation -->
<?php } ?>

<?php } else { // or, if we don't have comments:

		if ( ! comments_open() ) {
?>
			<p class="nocomments"><?php _e( 'Comments are closed.', 'invent' ); ?></p>
<?php	} // end ! comments_open() ?>

<?php } // end have_comments() ?>

<?php
	$commenter = wp_get_current_commenter();

	$fields =  array(
		'author' => "\t\t\t\t\t\t\t\t\t".'<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) .( $req ? '<span class="required"> *</span>' : '' ). '</label> ' .
					"\n\t\t\t\t\t\t\t\t\t".'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
		'email'  => "\t\t\t\t\t\t\t\t\t".'<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label> '.
					"\n\t\t\t\t\t\t\t\t\t".'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></p>',
		'url'    => "\t\t\t\t\t\t\t\t\t".'<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
					"\n\t\t\t\t\t\t\t\t\t".'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	comment_form(Array(
		'comment_notes_after' => '',
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => "\n\t\t\t\t\t\t\t\t\t".'<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8"></textarea></p>'."\n"
	));
?>
<!-- #comments -->
