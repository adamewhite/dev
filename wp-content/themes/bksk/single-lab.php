<?php get_header(); ?>
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
	
	<div class="grid cf">
	
	  <div class="grid-left">
  		<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix lab-single'); ?>>
  			<?php if ($syntax): ?>
  				<div class="lab-syntax"><?php echo $syntax->name ?></div>
  			<?php endif ?>
  			<div class="lab_title"><?php the_title(); ?></div>
  			<?php echo $copy = get_field('copy'); ?>
  		</div>
	  </div><!-- Grid Left -->
	  
	  <div class="grid-right">
      <?php include_once(TEMPLATEPATH . '/includes/sidebar-lab.php'); ?>
    </div>
		
	</div>
	<?php endwhile; ?>		
	<?php else : ?>
		Post Not Found
	<?php endif; ?>
	
<?php get_footer(); ?>
