<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="eltd-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="eltd-comment-holder-inner">
				<div class="eltd-comments-title">
					<h4><?php esc_html_e( 'Comments', 'albergo' ); ?></h4>
				</div>
				<div class="eltd-comments">
					<ul class="eltd-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'albergo_elated_comment' ), apply_filters( 'albergo_elated_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'albergo' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$eltd_commenter = wp_get_current_commenter();
		$eltd_req       = get_option( 'require_name_email' );
		$eltd_aria_req  = ( $eltd_req ? " aria-required='true'" : '' );
		
		$eltd_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'albergo' ),
			'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h3>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'albergo' ),
			'cancel_reply_link'    => esc_html__( 'cancel reply', 'albergo' ),
			'label_submit'         => esc_html__( 'Submit', 'albergo' ),
			'comment_field'        => apply_filters( 'albergo_elated_comment_form_textarea_field', '<textarea id="comment" placeholder="' . esc_html__( 'Your comment', 'albergo' ) . '" name="comment" cols="45" rows="6" aria-required="true"></textarea>' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'albergo_elated_comment_form_default_fields', array(
				'author' => '<div class="eltd-grid-row eltd-grid-small-gutter"><div class="eltd-grid-col-6"><input id="author" name="author" placeholder="' . esc_html__( 'Your Name', 'albergo' ) . '" type="text" value="' . esc_attr( $eltd_commenter['comment_author'] ) . '"' . $eltd_aria_req . ' /></div>',
				'email'  => '<div class="eltd-grid-col-6"><input id="email" name="email" placeholder="' . esc_html__( 'Your Email', 'albergo' ) . '" type="text" value="' . esc_attr( $eltd_commenter['comment_author_email'] ) . '"' . $eltd_aria_req . ' /></div></div>'
			) )
		);

	$eltd_args = apply_filters( 'albergo_elated_comment_form_final_fields', $eltd_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="eltd-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $eltd_show_comment_form = apply_filters('albergo_elated_show_comment_form_filter', true);
    if($eltd_show_comment_form) {
    ?>
        <div class="eltd-comment-form">
            <div class="eltd-comment-form-inner">
                <?php comment_form( $eltd_args ); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>	