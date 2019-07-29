<div class="tpl1 tb-category-slider">
<div class="owl-carousel">
<?php
	$show_view_more_cat = isset( $show_view_more_cat ) ? $show_view_more_cat : 0;
	$taxonomyName = "product_cat";
	$i=0;
	$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug','hide_empty' => false));
	foreach ($parent_terms as $pterm) { $i++;?>
	<?php if($i <= $number_cat){?>
	<div class="show_catthree">
		<div class="image_text">
			<div class="get_textpd">
				<?php if($show_title){?>
					<a href = "<?php get_term_link($pterm->name, $taxonomyName);?>"><?php echo $pterm->name;?></a>
				<?php }?>
				<?php if($show_number) echo '<p class="get_count">'.$pterm->count.'  PRODUCTS</p>'; ?>
				<?php if($show_description) echo '<p class="get_description">'.$pterm->description.'</p>'; ?>
				<?php if( $show_view_more_cat ):?>
				<a href="<?php echo get_term_link($pterm->term_id);?>"itemprop="name" class="product_category_title"><?php echo esc_html("SHOP NOW","laforat");?></a>
			<?php endif;?>
			</div>
			<?php  if($show_image){
			$thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
			$image = wp_get_attachment_url($thumbnail_id);
			echo "<img src='{$image}' alt='' />"; }?>
		</div>
	</div>
	<?php }?>
<?php } ?>
</div>
</div>