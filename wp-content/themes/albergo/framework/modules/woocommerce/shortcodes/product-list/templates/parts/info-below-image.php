<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$text_wrapper_styles    = $this_object->getTextWrapperStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="eltd-pli eltd-item-space <?php echo esc_html( $item_classes ); ?>">
	<div class="eltd-pli-inner">
		<div class="eltd-pli-image">
			<?php albergo_elated_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<div class="eltd-pli-text" <?php echo albergo_elated_get_inline_style( $shader_styles ); ?>>
			<div class="eltd-pli-text-outer">
				<div class="eltd-pli-text-inner">
					<?php albergo_elated_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>
				</div>
			</div>
		</div>
		<a class="eltd-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="eltd-pli-text-wrapper" <?php echo albergo_elated_get_inline_style( $text_wrapper_styles ); ?>>
		<?php albergo_elated_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>
		
		<?php albergo_elated_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
		
		<?php albergo_elated_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>
		
		<?php albergo_elated_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>
		
		<?php albergo_elated_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
	</div>
</div>