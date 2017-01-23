<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Recognition
 */
?>

<?php get_header();
	if (have_posts()) : 
	while (have_posts()) : the_post(); ?>
<div id="content">
<header class="page__header">	
	<h2>BKSK In the News</h2>
</header>
<aside id="post">
<?php $args = array(
            'post_type' =>'press',
            'post_status'=>'publish', 
            'orderby' => 'date',
            'posts_per_page' => -1
        ); 
query_posts ($args);
if (have_posts()) :
while (have_posts()) : the_post(); 
$source = get_field('website');
$link = get_field('website_link'); ?>

		<div class="loop-entry">
			<p class="date"><?php the_time('F'); ?> <?php the_time('j'); ?>, <?php the_time('Y'); ?></p>
			<a href="<?php echo $link; ?>"><h2><?php the_title(); ?></h2></a>
			<a href="<?php echo $link; ?>"><p><?php echo $source; ?></p></a>
		</div>  

<?php endwhile; wp_reset_query(); endif; ?>
</aside>
<?php get_sidebar(); ?>
</div><?php the_title(); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>