<?php
function jws_theme_title_func($atts) {
    $title = $color = $el_align =$animation = $el_class = '';
    extract(shortcode_atts(array(
        'title' => '',
		'image_1' => '',
		'icon' => '',
		'sub_title' => '',
		'title_background' => '',
        'title_tpl' => 'tpl3',
		'font_size' => '',
        'color' => '',
        'el_align' => 'text-center',
        'animation' => '',
        'el_class' => ''
    ), $atts));

    $class = $style = $parent_class = array();
    $class[] = 'laforat-title';
    if( in_array( $title_tpl, array('tpl3','tpl2') ) ){
        $parent_class[] = $el_align;
        $parent_class[] = getCSSAnimation($animation);
    }else{
        $class[] = $el_align;
        $class[] = getCSSAnimation($animation);
    }
	if($font_size){
        $style[] = "font-size: {$font_size}px";
    }
    if($color){
        $style[] = "color: $color";
    }
    $class[] = $el_class;
	$layout = "";

    $title = wp_kses_post( $title );
        if ($title_tpl == 'tpl1'){
            ob_start();
            $class[] = "laforat-title-underline-1";
            ?>
				<div class="title_one">
					<h3 class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style)echo 'style="'.esc_attr(implode('; ', $style)).'"'; ?>>
						<?php echo $title;?>
					</h3>
					<p><?php echo $sub_title;?></p>
				</div>
            <?php
            $layout = ob_get_clean();
        } elseif ($title_tpl == 'tpl2'){
             ob_start();
            ?>
             <div class="laforat-title-default <?php echo $title_tpl;?>">
                <h3 class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <?php echo $title;?>
                </h3>
            </div>
            <?php
            $layout = ob_get_clean();
        }else if($title_tpl == 'tpl3'){
            ob_start();
            ?>
            <div class="laforat-title-separator-wrap <?php echo esc_attr( implode(' ', $parent_class) );?>">
                <h3 class="laforat-title-separator <?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <span>
                    <?php echo $title;?>
                    </span>
                </h3>
            </div>
            <?php
            $layout = ob_get_clean();
        }else if($title_tpl == 'tpl4' || $title_tpl == 'tpl6' || $title_tpl == 'tpl7'){
			ob_start();
            ?>
            <div class="laforat-title-tpl4 <?php echo $title_tpl;?>">
                <h3 class="laforat-subtitle <?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <?php echo $title;?>
                </h3>
				<p><?php echo $sub_title;?></p>
            </div>
            <?php
           $layout = ob_get_clean();
		}else if($title_tpl == 'tpl5'){
			ob_start();
            ?>
            <div class="laforat-title-default <?php echo $title_tpl;?>">
                <h3 class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <?php echo $title;?>
                </h3>
				<a href="#"><i class="<?php echo esc_attr($icon);?>"></i></a>
            </div>
            <?php
            $layout = ob_get_clean();
		}
		else{
            ob_start();
            ?>
            <div class="laforat-title-default">
                <h3 class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style) echo 'style="'. esc_attr(implode('; ', $style))  .'"'; ?>>
                    <?php echo $title;?>
                </h3>
            </div>
            <?php
            $layout = ob_get_clean();
        }
	return $layout;
}

if(function_exists('insert_shortcode')) { insert_shortcode('title', 'jws_theme_title_func'); }
