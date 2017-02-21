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

<?php if( have_rows('photographs') ):
	$count = 0;
	echo '<div class="grid-community">';
    while ( have_rows('photographs') ) : the_row();
      $img = get_sub_field('image');
      if($count == 0) {
		  echo '<div class="container twocol">';
	  }
	  
	  if($count == 3) {
		  echo '<div class="container twocol last">';
	  }
	  
	  if($count == 0 || $count == 1 || $count == 4 || $count == 5) {
		  $class = 'twocol';
	} else {
		$class = '';
	}
	  
	if($count == 0 || $count == 1 || $count == 4 || $count == 5) {
	  $img = $img['sizes']['sq2'];
	} else {
	  $img = $img['sizes']['sq500'];
	}
		echo '<div class="item '.$class.'"><img src="'.$img.'" /></div>';
	
	if($count == 2 || $count == 5) {
	  echo '</div>';
	}
	$count++;
	endwhile;
	echo '</div>';
endif; ?>

<?php 
		echo '<div class="clearfix"></div>';
		echo '<div class="column-2">';
		the_content();
		echo '</div>';
		 ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>