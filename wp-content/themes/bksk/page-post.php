<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: (Po)st
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
<header class="page__header">	
	<?php the_content(); ?>
</header>

<div id="content">

<aside id="post" class="clearfix">
</aside>

</div>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>