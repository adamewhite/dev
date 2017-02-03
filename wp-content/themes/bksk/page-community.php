<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Community
 */
?>

<?php get_header();
	echo '<nav class="page__subnav" role="navigation">';
	wp_nav_menu( array('menu' => 'Practice' ));
	echo '</nav>'; ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<header class="page__header">	
	<?php $headline = get_field('headline');
		if($headline) {
			the_field('headline');
		} ?>
</header>

<?php 
		echo '<div class="page__intro">';
		the_content();
		echo '</div>';
		 ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>