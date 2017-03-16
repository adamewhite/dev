<?php get_header(); ?>
<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
$syntax = get_field('primary_syntax');
if ($syntax) {
	$syntax = get_term($syntax, 'syntax');
} else {
	$featured = get_category_by_slug('featured');
	$syntax = wp_get_post_terms($post->ID, 'syntax');
	$syntax = wp_list_filter($syntax, array('slug' => 'featured'), 'NOT');
    $syntax = array_shift($syntax);
}
?>
	
	<aside id="post">  
	<div class="loop-entry">
		<?php if ($syntax): ?>
		<p class="date"><?php echo $syntax->name; ?></p>
		<?php endif; ?>
		<h2><?php the_title(); ?></h2>
		  <?php the_content(); ?>
	</div>
	</aside>
<?php endwhile; endif; ?> 
	
<?php get_sidebar(); ?>  

</div>
	
<?php get_footer(); ?>
