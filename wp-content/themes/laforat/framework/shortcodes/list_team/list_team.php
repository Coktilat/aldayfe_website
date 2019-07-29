<?php
function jws_theme_list_team_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'posts_per_page' => -1,
        'columns' => 4,
		'orderby' => 'none',
        'order' => 'none',
        'el_class' => '',
        'show_image' => 1,
        'show_title' => 1,
        'el_align' => 'text-center',
        'show_experience' => 1,
        'show_social' => 1
    ), $atts));
			
    $class = array();
    $class[] = 'tb-team';
    $class[] = $el_class;
    $class[] = $el_align;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'team',
        'post_status' => 'publish');
    $wp_query = new WP_Query($args);
	
    ob_start();
	
	if ( $wp_query->have_posts() ) {
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<div class="row">
			<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
				<div class="col-sm-6 col-md-<?php echo intval( 12/ intval( $posts_per_page ) );?>">
                    <div class="tb-box-inner">
                        <?php if($show_image && has_post_thumbnail( get_the_ID() ) ):?>
                            <div class="tb-image">
                                <?php the_post_thumbnail( array(270,270), array('clas'=>'img-responsive') ); ?>
                            </div>
                        <?php
                            endif;
                            if($show_title) {
                        ?>
                        <div class="tb-image-name">
                            <h5 class="tb-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                            <?php
                                if( $show_experience ){
                                    $experience = esc_attr( get_post_meta(get_the_ID(), 'jws_theme_team_experience', true) );
                                    if($experience) echo '<span class="tb-experience">'. $experience.'</span>';
                                }
                            ?>
                        </div>
                        <?php } ?>
                        <?php if( $show_social ):
                            $social =wp_kses_post( get_post_meta( get_the_ID(), 'jws_theme_team_social', true ) );
                            if( ! empty( $social ) ):
                         ?>
                            <div class="tb-social">
                                <?php echo $social; ?>
                            </div>
                        <?php endif; endif; ?>
                    </div>
                </div>
			<?php } wp_reset_postdata(); ?>
		</div>
	</div>
    <?php
	}
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('list_team', 'jws_theme_list_team_func'); }
