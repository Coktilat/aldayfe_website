<?php
function jws_theme_search_mega_render($atts) {
    extract(shortcode_atts(array(
		'type'       	=> '',
        'title'  => '',
        'hide_empty'    => '',
        'el_class'      =>''
    ), $atts));
	
    $class = array('searchform');
	$class[] = $el_class;
	$args = array(
    'orderby'    => 'title',
    'order'      => 'ASC',
    'exclude'    => 1,//remove uncategory
    'hide_empty' => $hide_empty
    );
    $is_blog = $type == 'blog';
    $cat = $is_blog ? 'category' : 'product_cat';
    $product_categories = get_terms( $cat, $args );
    $count = count($product_categories);
    ob_start();
    ?>
    <form method="get" id="tb-mega-searchform" class="<?php echo esc_attr( implode( ' ', $class ) );?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="clearfix">
            <div class="col-xs-25">
                <div class="dropdown">
                    <i class="fa fa-th"></i>
                    <!-- <span class="tb-title"></span> -->
                    <select>
                        <option value=""><?php echo esc_attr($title);?></option>
                        <?php
                           if ( $count > 0 ){
                            foreach ( $product_categories as $product_category ) {
                                ?>
                                <option value="<?php echo esc_attr( $product_category->slug );?>">
                                        <?php echo esc_attr( $product_category->name); ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <span class="caret"></span>
                </div>
            </div>
            <div class="col-xs-95">
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Type your search here.." />
                <button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
            </div>
            <?php if( ! $is_blog ): ?>
                <input type="hidden" name="post_type" value="product">
            <?php  endif;?>
            <input type="hidden" value="women" disabled name="cat" />
            <!-- <button id="searchsubmit" type="submit"><i class="fa fa-search"></i></button> -->
        </div>
    </form>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('search_mega', 'jws_theme_search_mega_render'); }