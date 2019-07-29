<?php if ( ! albergo_elated_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="eltd-post-read-more-button">
		<?php
		if ( albergo_elated_core_plugin_installed() ) {
			echo albergo_elated_get_button_html(
				apply_filters(
					'albergo_elated_blog_template_read_more_button',
					array(
						'type'         => 'simple',
						'size'         => 'medium',
						'link'         => get_the_permalink(),
						'text'         => esc_html__( 'READ MORE', 'albergo' ),
						'custom_class' => 'eltd-blog-list-button',
						'line_position' => isset($line_position) ? $line_position : ''
					)
				)
			);
		} else { ?>
			<a itemprop="url" href="<?php echo esc_attr( get_the_permalink() ); ?>" target="_self" class="eltd-btn eltd-btn-medium eltd-btn-simple eltd-blog-list-button">
                <span class="eltd-btn-text"><?php echo esc_html__( 'READ MORE', 'albergo' ); ?></span>
			</a>
		<?php } ?>
	</div>
<?php } ?>