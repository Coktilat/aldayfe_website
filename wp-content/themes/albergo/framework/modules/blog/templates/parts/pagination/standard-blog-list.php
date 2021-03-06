<?php if($max_num_pages > 1) { ?>
	<div class="eltd-blog-pag-loading">
		<div class="eltd-blog-pag-bounce1"></div>
		<div class="eltd-blog-pag-bounce2"></div>
		<div class="eltd-blog-pag-bounce3"></div>
	</div>
	<?php
		$number_of_pages = $max_num_pages;
		$current_page    = $paged;
		
		if($number_of_pages > 1){ ?>
			<div class="eltd-bl-standard-pagination">
				<ul>
					<li class="eltd-bl-pag-prev">
						<a href="#" data-paged="1">
						<span class="eltd-custom-prev-icon">
							<span class="custom-line-top"></span><span class="custom-line-bottom"></span>
						</span>
							<?php echo '<span class="eltd-bl-single-nav-label">' .esc_html__('previous', 'albergo'). '</span>' ?>
						</a>
					</li>
					<?php for ($i=1; $i <= $number_of_pages; $i++) { ?>
						<?php
							$active_class = '';
							if($current_page == $i) {
								$active_class = 'eltd-bl-pag-active';
							}
						?>
						<li class="eltd-bl-pag-number <?php echo esc_attr($active_class); ?>">
							<a href="#" data-paged="<?php echo esc_attr($i); ?>"><?php echo esc_html($i); ?></a>
						</li>
					<?php } ?>
					<li class="eltd-bl-pag-next">
						<a href="#" data-paged="2">
							<?php echo '<span class="eltd-bl-single-nav-label">' .esc_html__('next', 'albergo'). '</span>' ?>
							<span class="eltd-custom-next-icon">
							<span class="custom-line-top"></span><span class="custom-line-bottom"></span>
							</span>
						</a>
					</li>
				</ul>
			</div>
		<?php }
	?>
<?php }