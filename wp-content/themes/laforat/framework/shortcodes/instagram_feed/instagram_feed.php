<?php
function jws_theme_instagram_feed($atts, $content = null) {
    extract(shortcode_atts(array(
        'tpl' => '',
		'access_token' => '',
		'item' => '',
		'limit' => '',
		'columns' => 6,
		'thumb' => '',
		'el_class' => ''
    ), $atts));
			
    $class = array();
    $item = esc_attr( $item );
    $class[] = 'tb-blog-carousel';
    $class[] = $el_class;
	wp_enqueue_script( 'instafeed-custom' );
	if( empty( $access_token ) ) $access_token = '2713900256.1677ed0.fbf9c9e6a41e436abe5b309e22944caa';
    ob_start();
	?>
	<div id="instafeed" class="clearfix tb-col-<?php echo esc_attr( $columns );?>"></div>
	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				var ops = {
			        accessToken: '<?php echo esc_attr( $access_token );?>',
			        resolution: '<?php echo esc_attr( $thumb );?>',
			        template: '<a href="{{link}}"><img class="img-responsive" src="{{image}}" /><hr class="hr_1"><hr class="hr_2"></a>',
			        limit: <?php echo intval( $limit );?>
			    };
			    <?php if( ! empty( $tpl ) ): ?>
			    	ops.get = '<?php echo esc_attr( $tpl );?>';
			    <?php endif; ?>
			    <?php if( $tpl == 'tagged' ):?>
			    	ops.tagName = '<?php echo $item;?>';
			    <?php elseif( $tpl == 'location'): ?>
			    	ops.locationId = '<?php echo $item;?>';
			    <?php elseif( $tpl == 'user'): ?>
			    	ops.userId  = '<?php echo $item;?>';
			    <?php endif; ?>
				var feed = new Instafeed( ops );
			    feed.run();
			});
		})(window.jQuery)
	</script>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('instagram_feed', 'jws_theme_instagram_feed'); }
