<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Mobile
 */
?>

<?php get_header(); ?>

<div class="home--mobile">

<?php $exclude_array = array(); ?>
<div class="twocol">
<div class="item bg">
<?php $args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => array( 'cultural-civic' )
		)
	),
	'meta_query' => array(
		array(
			'key' => 'featured',
			'compare' => '==',
			'value' => '1'
		)
	),
	'posts_per_page' => 1
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
	array_push($exclude_array, $post->ID);
	$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
	echo '<a href="'.work_url('work').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg">	
		<h3>Architecture</h3>
</div>	
</a>
</div>
	
<div class="item block dark-gray">
	<div class="vertical-align-wrap">
		<div class="vertical-align">
			<a href="<?php echo get_site_url(); ?>/contact">
				<h3>Contact</h3>
			</a>
		</div>
	</div>
</div>

</div><div class="twocol">

<?php mobileBox('practice', 'Practice'); ?>

<div class="item bg">
<?php 
	$exclude_ids = array(implode(",", $exclude_array));
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__not_in' => $exclude_array,
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'discipline',
			'compare' => 'LIKE',
			'value' => 'Interiors'
		),
		array(
			'key' => 'featured',
			'compare' => '==',
			'value' => '1'
		)
	),
	'posts_per_page' => 1
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
	$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
	echo '<a href="'.get_site_url().'/interiors"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg">	
	<h3>interiors</h3>
</div>
</a>
</div>

</div><div class="twocol">

<div class="item bg">
<?php 
	$exclude_ids = array(implode(",", $exclude_array));
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__not_in' => $exclude_array,
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'featured',
			'compare' => '==',
			'value' => '1'
		),
		array(
			'key' => 'specialty',
			'compare' => 'LIKE',
			'value' => 'Sustainability'
		)
	),
	'posts_per_page' => 1
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
	array_push($exclude_array, $post->ID);
	$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
	echo '<a href="'.work_url('sustainability').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg">	
	<h3>Lab</h3>
</div>
</a>
</div>	

<?php mobileBox('post', '(Po)st'); ?>

</div><div class="twocol">

<?php mobileBox('press', 'Press'); ?>

<div class="item bg">
<?php 
	$exclude_ids = array(implode(",", $exclude_array));
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__not_in' => $exclude_array,
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'featured',
			'compare' => '==',
			'value' => '1'
		),
		array(
			'key' => 'specialty',
			'compare' => 'LIKE',
			'value' => 'Preservation'
		)
	),
	'posts_per_page' => 1
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
	array_push($exclude_array, $post->ID);
	$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
	echo '<a href="'.work_url('preservation').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg">	
	<h3>Preservation</h3>
</div>
</a>
</div>	

</div>

</div><!-- home--mobile -->

<?php mobileMessage('larger'); ?>

<?php get_footer(); ?>