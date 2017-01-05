<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Team
 */
?>

<?php get_header();
	echo '<nav class="page__subnav" role="navigation">';
	wp_nav_menu( array('menu' => 'Practice' ));
	echo '</nav>'; ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<header class="page__header">	
	<?php the_content(); ?>
</header>
<?php endwhile; endif; ?>

<div class="content grid-team">
	<div class="grid-sizer"></div>
<?php 
$staff_count = 0;
$i = 0;
$staff_args = array(
    'post_type' =>'team',
    'post_status'=>'publish', 
    'orderby' => 'rand',
    'posts_per_page' => -1,
    'meta_key' => 'partner',
    'meta_value' => 0
); 
$partners = get_posts( array(
    'post_type' =>'team',
    'post_status'=>'publish', 
    'orderby' => 'rand',
    'posts_per_page' => -1,
    'meta_key' => 'partner',
    'meta_value' => 1
));
$staff_query = new WP_Query($staff_args);
if ($staff_query->have_posts()) :
while ($staff_query->have_posts()) : $staff_query->the_post();
	$image = get_field('image1');
	$title = get_field('title');
	$partner = get_field('partner');
// 	echo $image;
	if($image['url'] != '') {
		$staff_count++;
		$img = $image['sizes']['sq2'];
/*
		if($partner == 0) {
			$img = $image['sizes']['sq2'];
			$class = '';
		} else {
			$img = $image['sizes']['sq500'];
			$class = 'grid-item--partner';
		}
*/
		echo '<div class="grid-item grid-item--staff bw">';
		echo '<img src="'.$img.'" />';
		echo '<div class="text grad-bg"><h3>'.get_the_title().'</h3></div>';
		echo '</div>';
	} 
	if($staff_count == 4 || $staff_count == 6 || $staff_count == 8 || $staff_count == 10 || $staff_count == 12) {
// 		setup_postdata($partners[$i]); 
		if($i <= 5) {
		$partner_image = get_field('image1', $partners[$i]->ID);
		$title = get_field('title', $partners[$i]->ID);
		if($partner_image['url'] != '') {
			$img = $partner_image['sizes']['sq500'];
			$class = 'grid-item--partner';
			echo '<div class="grid-item grid-item--partner">';
			echo '<a href="'.get_permalink($partners[$i]->ID).'"><img src="'.$img.'" />';
			echo '<div class="text grad-bg"><h3>'.get_the_title($partners[$i]->ID).'</h3></div>';
			echo '</a></div>';
			$i++;
		}
		}
	}
?>
<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>