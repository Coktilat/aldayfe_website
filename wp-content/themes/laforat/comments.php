<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
	
		<fieldset class="comments-title font-laforat-3">
			<legend><?php comments_number( __('Comment','laforat'), __('Comment <label>(1)</label>','laforat'), __('Comments <label>(%)</label>','laforat')); ?></legend>
		</fieldset>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation col-xs-12 col-sm-12 col-md-12 col-lg-12" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'laforat' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'laforat' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'laforat' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 60,
					'callback' => 'jws_theme_custom_comment',
					'reply_text' => '<i class="fa fa-mail-reply"></i>',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'laforat' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'laforat' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'laforat' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'laforat' ); ?></p>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		
		$fields =  array(
			'author' =>
				'<p class="comment-form-author"><label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" placeholder = "Name *" size="30" aria-required="true" /></p>',

			'email' =>
				'<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" placeholder = "Email *" size="30" aria-required="true" /></p>',

			'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) .'" placeholder = "Your Website" size="30" aria-required="true" /></p>',
				
			'comment_field' =>  '<p class="comment-form-comment-bottom"><textarea id="comment" name="comment" cols="60" rows="6" aria-required="true" placeholder="Comment">' . '</textarea></p>',
		);
		
		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'class_submit'      => 'submit',
			'name_submit'       => 'submit',
			'title_reply'       => __( '<span>Leave a reply</span><p class="request-comment">Your email address will not be published. Required fields are marked <span>*</span></p>', 'laforat' ),
			'title_reply_to'    => __( 'Leave a reply %s', 'laforat' ),
			'cancel_reply_link' => __( '', 'laforat' ),
			'label_submit'      => __( 'Comment', 'laforat' ),
			'format'            => 'xhtml',

			/*'comment_field' =>  '<p class="comment-form-comment"><label>' . __("Content", 'laforat') . ' <span>*</span></label><textarea id="comment" name="comment" cols="60" rows="6" aria-required="true">' . '</textarea></p>',
			*/
			'must_log_in' => '<p class="must-log-in">' .
			  sprintf(
				__( 'You must be <a href="%s">logged in</a> to post a comment.', 'laforat' ),
				wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			  ) . '</p>',

			'logged_in_as' => '<p class="logged-in-as">' .
			  sprintf(
			  __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'laforat' ),
				admin_url( 'profile.php' ),
				$user_identity,
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
			  ) . '</p>',

			'comment_notes_before' => '',

			'comment_notes_after' => '',

			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		  );

		comment_form($args);
	?>

</div><!-- #comments -->
