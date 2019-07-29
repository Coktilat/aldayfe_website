<?php
class TB_Setting_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'tb_setting_widget', // Base ID
                __('TB Setting Widget', 'venus'), // Name
                array('description' => __('TB Setting Widget', 'venus'),) // Args
        );
    }
    function widget($args, $instance) {
        extract(shortcode_atts($instance,$args));
        $icon = !empty($instance['icon']) ? $instance['icon'] : "";
        $title = !empty($instance['title']) ? $instance['title'] : "";
        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";
        $micon = array();
        $mtext = array();
        for ($i = 1; $i <= 5; $i++) {
            $micon[$i] = !empty($instance['micon_' . $i]) ? esc_attr($instance['micon_' . $i]) : '';
            $mtext[$i] = !empty($instance['mtext_' . $i]) ? esc_attr($instance['mtext_' . $i]) : '';
        }
        ?>
        <div class="widget_setting_wrap">
            <div class="header">
                <a href="#"><i class="<?php echo esc_attr($icon); ?>"></i></a>
				<?php echo $icon; if($title) { ?> 
					<h4><?php echo esc_html($title); ?></h4>
				<?php } ?> 
            </div>
            <div class="setting_dropdown" id="setting_dropdown">
                <div class="setting_dropdown_inner">
					<ul class="setting-list">
						  <?php
							for ($i = 1; $i <= 5; $i++) {
								if($micon[$i] || $mtext[$i] ){
								echo '<li>';
								?>
									<i class="<?php echo esc_attr($micon[$i]); ?>"></i> <span><?php echo esc_html($mtext[$i]); ?></span>
								<?php  echo '</li>';
								}
							}
						?>
					</ul>
				</div>
			</div>
        </div>
		<?php
        echo isset($after_widget)?$after_widget:'';
        echo ob_get_clean();
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['icon'] = $new_instance['icon'];
		$instance['extra_class'] = $new_instance['extra_class'];
        for ($i = 1; $i <= 5; $i++) {
            $instance['micon_' . $i] = $new_instance['micon_' . $i];
            $instance['mtext_' . $i] = $new_instance['mtext_' . $i];
        }
		return $instance;
    }
    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $icon = isset($instance['icon']) ? esc_attr($instance['icon']) : '';
		$extra_class = isset($instance['extra_class']) ? esc_attr($instance['extra_class']) : '';
        $micon = array();
        $mtext = array();
		for ($i = 1; $i <= 5; $i++) {
            $micon[$i] = isset($instance['micon_' . $i]) ? esc_attr($instance['micon_' . $i]) : '';
            $mtext[$i] = isset($instance['mtext_' . $i]) ? esc_attr($instance['mtext_' . $i]) : '';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title:', 'venus' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php _e( 'Icon:', 'venus' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('icon') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon') ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
        </p>
		
		<p><?php echo esc_html__('Please enter content for this element','venus');?></p>
		<?php for ($i = 1; $i <= 5; $i++) { ?>
            <p>
                <label for="<?php echo esc_url($this->get_field_id('micon_' . $i)); ?>"><?php _e('Icon:', 'venus');
            echo esc_html($i); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('micon_' . $i)); ?>" name="<?php echo esc_attr($this->get_field_name('micon_' . $i)); ?>" type="text" value="<?php echo esc_attr($micon[$i]); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_url($this->get_field_id('mtext_' . $i)); ?>"><?php _e('Text:', 'venus');
            echo esc_html($i); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('mtext_' . $i)); ?>" name="<?php echo esc_attr($this->get_field_name('mtext_' . $i)); ?>" type="text" value="<?php echo esc_attr($mtext[$i]); ?>" />
            </p>
        <?php } ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('extra_class')); ?>"><?php _e('Extra Class:', 'venus'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('extra_class')); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php echo esc_attr($extra_class); ?>" />
        </p>
    <?php

    }
}
/**
 * Class TB_Setting_Widget
 */
function register_setting_widget() {
    register_widget('TB_Setting_Widget');
}
add_action('widgets_init', 'register_setting_widget');
?>
