<?php
/**
 * Template Name: No Container Template
 */
?>
<?php get_header(); ?>
<?php
$jws_theme_options = $GLOBALS['jws_theme_options'];
$jws_theme_show_page_title = isset($jws_theme_options['jws_theme_page_show_page_title']) ? $jws_theme_options['jws_theme_page_show_page_title'] : 1;
$jws_theme_show_page_breadcrumb = isset($jws_theme_options['jws_theme_page_show_page_breadcrumb']) ? $jws_theme_options['jws_theme_page_show_page_breadcrumb'] : 1;
jws_theme_title_bar($jws_theme_show_page_title, $jws_theme_show_page_breadcrumb);

$jws_theme_show_page_comment = (int) isset($jws_theme_options['jws_theme_page_show_page_comment']) ?  $jws_theme_options['jws_theme_page_show_page_comment']: 1;
?>
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>
			<div style="clear: both;"></div>
			<?php if($jws_theme_show_page_comment){ ?>
				
					<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				
			<?php } ?>

		<?php endwhile; // end of the loop. ?>
	</div>
<?php get_footer(); ?>