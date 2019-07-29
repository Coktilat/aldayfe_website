<?php
/* Title */
if (!function_exists('jws_theme_title_render')) {
	function jws_theme_title_render(){
		global $jws_theme_options;
		ob_start();
		?>
		<?php if(is_single()){ ?>
			<?php if(get_the_title()){ ?>
				<div class="blog-title"><?php the_title(); ?></div>
			<?php } else { ?>    
				<div class="blog-title"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more...', 'laforat');; ?></a></div>
			<?php } ?>
		<?php }else{ ?>
			<?php if(get_the_title()){ ?>
				<div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<?php }
		}
		return  ob_get_clean();
	}
}
/* Info Bar */
if (!function_exists('jws_theme_info_bar_render')) {
	function jws_theme_info_bar_render() {
		global $jws_theme_options, $post;
		if( is_wp_error( $post ) ) return;
		$jws_theme_show_post_comment = (int) isset($jws_theme_options['jws_theme_'. $post->post_type .'_show_post_comment']) ?  $jws_theme_options['jws_theme_'. $post->post_type .'_show_post_comment']: 1;
		$jws_theme_show_post_tag = (int) isset( $jws_theme_options['jws_theme_post_show_post_tags'] ) ? $jws_theme_options['jws_theme_post_show_post_tags'] : 1;
		$jws_theme_show_author= (int) isset( $jws_theme_options['jws_theme_post_show_post_author'] ) ? $jws_theme_options['jws_theme_post_show_post_author'] : 1;
		ob_start();
			?>
			<div class="blog-info">
				
				<?php if( $jws_theme_show_author ){ ?><span class="author-name"><i class="fa fa-user"></i><?php esc_html_e('By ', 'laforat'); the_author_posts_link(); ?></span><?php } ?>
				<!-- Date -->
				<div class="tb-blog-date">
				   <?php 
					$archive_year  = get_the_time('Y'); 
					$archive_month = get_the_time('m'); 
					$archive_day   = get_the_time('d'); 
					?>
				   <a href="#"><i class="fa fa-calendar"></i><h4 class="the_date"><?php echo get_the_time('j');?></h4><h4 class="the_time"><?php echo get_the_time('M');?></h4></a>
				</div>
				<!-- Comment count -->
				<?php if( $jws_theme_show_post_comment ): ?><a href = "<?php the_permalink();?>" class="comments-number"><i class="fa fa-comment"></i><?php comments_number( esc_html__( '0 ', 'laforat' ), esc_html__( '1 ', 'laforat' ), esc_html__( '%', 'laforat' ) ); ?><h4 class="tb_comment"> Comment </h4></a><?php endif; ?>
				<?php if( $jws_theme_show_post_tag ){ ?><span class="tags"><?php the_tags( '<i class="fa fa-tags"></i> ', ', ', '' ); ?> </span><?php } ?>
				
			</div>
			<?php
		return  ob_get_clean();
	}
}
/* Post gallery */
if (!function_exists('jws_theme_grab_ids_from_gallery')) {

    function jws_theme_grab_ids_from_gallery() {
        global $post;
        $gallery = jws_theme_get_shortcode_from_content('gallery');
        $object = new stdClass();
        $object->columns = '3';
        $object->link = 'post';
        $object->ids = array();
        if ($gallery) {
            $object = jws_theme_extra_shortcode('gallery', $gallery, $object);
        }
        return $object;
    }

}
/* Extra shortcode */
if (!function_exists('jws_theme_extra_shortcode')) {
    function jws_theme_extra_shortcode($name, $shortcode, $object) {
        if ($shortcode && is_object($object)) {
            $attrs = str_replace(array('[', ']', '"', $name), null, $shortcode);
            $attrs = explode(' ', $attrs);
            if (is_array($attrs)) {
                foreach ($attrs as $attr) {
                    $_attr = explode('=', $attr);
                    if (count($_attr) == 2) {
                        if ($_attr[0] == 'ids') {
                            $object->$_attr[0] = explode(',', $_attr[1]);
                        } else {
                            $object->$_attr[0] = $_attr[1];
                        }
                    }
                }
            }
        }
        return $object;
    }
}
/* Get Shortcode Content */
if (!function_exists('jws_theme_get_shortcode_from_content')) {

    function jws_theme_get_shortcode_from_content($param) {
        global $post;
        $pattern = get_shortcode_regex();
        $content = $post->post_content;
        if (preg_match_all('/' . $pattern . '/s', $content, $matches) && array_key_exists(2, $matches) && in_array($param, $matches[2])) {
            $key = array_search($param, $matches[2]);
            return $matches[0][$key];
        }
    }

}
/* Remove Shortcode */
if (!function_exists('jws_theme_remove_shortcode_from_content')) {
	function jws_theme_remove_shortcode_from_content( $content ) {
		global $post;
		$format = get_post_format();
		if ( is_single() && 'gallery' == $format ) {
			$content = strip_shortcodes( $content );
		}
		return $content;
	}
}
/* add_filter( 'the_content', 'jws_theme_remove_shortcode_from_content' ); */
/* Content */
if (!function_exists('jws_theme_content_render')) {
	function jws_theme_content_render(){
		global $jws_theme_options;
		$jws_theme_blog_post_excerpt_leng = (int) isset($jws_theme_options['jws_theme_blog_post_excerpt_leng']) ? $jws_theme_options['jws_theme_blog_post_excerpt_leng'] : 0;
		$jws_theme_post_excerpt_more = isset($jws_theme_options['jws_theme_blog_post_excerpt_more']) ? $jws_theme_options['jws_theme_blog_post_excerpt_more'] : '';
		$jws_theme_post_read_more = isset($jws_theme_options['jws_theme_blog_post_readmore']) ? esc_attr( $jws_theme_options['jws_theme_blog_post_readmore'] ) : '';
		
		ob_start();
		?>
		<?php if (is_single() || is_home()) { ?>
				<div class="tb-excerpt">
					<?php
					if(has_excerpt()):
						the_excerpt();	
					else:
						the_content();
					endif;
					wp_link_pages(array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'laforat'),
						'after' => '</div>',
					));
					?>
				</div>
			<?php } else { ?>
				<div class="tb-excerpt">
					<?php echo jws_theme_custom_excerpt( intval( $jws_theme_blog_post_excerpt_leng ), $jws_theme_post_excerpt_more); ?>
				</div>
				<a class="tb-readmore" href="<?php the_permalink(); ?>"><?php echo $jws_theme_post_read_more; ?></a>
			<?php } ?>
		<?php
		return  ob_get_clean();
	}
}
/*Tags*/
if (!function_exists('jws_theme_tags_render')) {
	function jws_theme_tags_render(){
		ob_start();
		?>
		<?php if (is_single()) { ?>
				<div class="tag-links">
					<?php the_tags(); ?>
				</div>
			<?php }?>
		<?php
		return  ob_get_clean();
	}
}
/*Author*/
if ( ! function_exists( 'jws_theme_author_render' ) ) {
	function jws_theme_author_render() {
		ob_start();
		?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<span class="featured-post"> <?php esc_html_e( 'Sticky', 'laforat' ); ?></span>
		<?php } ?>
		<div class="about-author"> 
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?>
			</div>
			<div class="author-info">
				<span class="subtitle"><?php esc_html_e( 'AUTHOR', 'laforat' ); ?></span>
				<h4 class="name"><?php the_author_meta('display_name'); ?></h4>
				<p class="desc"><?php the_author_meta('description'); ?></p>
				<a class="read-more" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e('All stories by: ', 'laforat'); the_author_meta('display_name'); ?></a>
			</div>
		</div>
		<?php
		return  ob_get_clean();
	} 
}
/* Social share */
if ( ! function_exists('jws_theme_social_share_post_render') ) {
	function jws_theme_social_share_post_render() {
		global $post;
		$post_title = $post->post_title;
		$permalink = get_permalink($post->ID);
		$title = get_the_title();
		$output = '';
		$output .= '<div class="tb-social-buttons">
			'.__('', 'laforat').'
			<a class="icon-twitter" href="http://twitter.com/share?text='.$title.'&url='.$permalink.'"
				onclick="window.open(this.href, \'twitter-share\', \'width=550,height=235\');return false;">
				<span>Twitter</span>
			</a>             
			<a class="icon-fb" href="https://www.facebook.com/sharer/sharer.php?u='.$permalink.'"
				 onclick="window.open(this.href, \'facebook-share\',\'width=580,height=296\');return false;">
				<span>Facebook</span>
			</a>         
			<a class="icon-gplus" href="https://plus.google.com/share?url='.$permalink.'"
			   onclick="window.open(this.href, \'google-plus-share\', \'width=490,height=530\');return false;">
				<span>Google+</span>
			</a>
			<a href="http://pinterest.com/pin/create/button/?url=https%3A%2F%2Fwww.google.com&description=This+is+google+a+search+engine" class="pin-it-button" count-layout="horizontal">
			<i class="fa fa-pinterest"></i>
			</a>
		</div>';
		return $output;
	}
}

/* Social share */
if ( ! function_exists('jws_theme_social_share_post_rendera') ) {
	function jws_theme_social_share_post_rendera() {
		global $post;
		$post_title = $post->post_title;
		$permalink = get_permalink($post->ID);
		$title = get_the_title();
		$output = '';
		$output .= '<div class="tb-social-buttons">
			'.__('', 'laforat').'
			<a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
			</a>
			<a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
			 <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
			</a>
			<a href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
			</a>
			<a href="http://pinterest.com/pin/create/button/?url={URI-encoded URL of the page to pin}&media={URI-encoded URL of the image to pin}&description={optional URI-encoded description}" class="pin-it-button" count-layout="horizontal">
			<img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
			</a>
		</div>';
		return $output;
	}
}
