<?php
/*
Template Name: Under Construction Template
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<?php global $tb_options; ?>
	<!--<title><?php wp_title( '-', true, 'right' ); ?></title>-->
	<?php wp_head(); ?>

</head>
<?php
	$body_class = 'tb_body';
?>
<body <?php body_class($body_class) ?>>	
	<div id="tb_wrapper" class="tb_wrapper_commingsoon">
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
	<?php wp_footer();?>
</body>
</html>