<?php
	$show_view_more_cat = isset( $show_view_more_cat ) ? $show_view_more_cat : 0;
	$taxonomyName = "product_cat";
	$i=0;
	$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug','hide_empty' => false));
	?><ul><?php
	foreach ($parent_terms as $pterm) { $i++;?>
	<?php if($i <= $number_cat){?>
		<li><div class="show_catthree">
			<?php  if($show_image){
			$thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
			$image = wp_get_attachment_url($thumbnail_id);
			if($crop_image){
				$image_resize = matthewruddy_image_resize( $image, $width_image, $height_image, true, false );
				echo "<a href=".get_term_link($pterm->term_id)."><img class= register_image style = width:100% src=' {$image_resize['url']} ' alt='' /></a>"; 
			}else{
				echo "<a href=".get_term_link($pterm->term_id)."><img src='{$image}' alt='' /></a>"; 
			}
			}?>
			<div class="get_textpd">
				<?php if($show_title){?>
					<a href = "<?php get_term_link($pterm->name, $taxonomyName);?>"><?php echo $pterm->name;?></a>
				<?php }?>
				<?php if($show_number) echo '<p class="get_count">'.$pterm->count.'  PRODUCTS</p>'; ?>
				<?php if($show_description) echo '<p class="get_description">'.$pterm->description.'</p>'; ?>
				<?php if( $show_view_more_cat ):?>
					<a href="<?php echo get_term_link($pterm->term_id);?>"itemprop="name" class="product_category_title"><span><?php echo esc_attr($button_text);?></span><i class="fa fa-chevron-right"></i></a>
			<?php endif;?>
			</div>
		</div>
	</li>
	<?php }?>
<?php } ?>
</ul>