<div class="no-results">
	<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'laforat' ); ?></h1>
	<?php if( current_user_can( 'edit_posts' )): ?>
	<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'laforat' ),array( 'a' => array( 'href' => array() ))), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php endif; ?>
</div>