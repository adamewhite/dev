<?php
/**
 * @package WordPress
 * @subpackage Theme
 */
?>
<?php get_header(); ?>

<?php
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android"); ?>

<?php $exclude_array = array(); ?>
<div class="col30">
<div class="item block rect2">
<a class="link" href="<?php echo get_site_url(); ?>/work">
	<div class="text">
		<h1>Architecture</h1>
	</div>
</a>
</div>

<div class="col sm">
<div class="item sq1 bw">
<a href="<?php echo get_site_url(); ?>/practice">
	<?php $img = wp_get_attachment_image(4909, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Practice</h3>
</div>
</a>
</div>	

<div class="item block sq1"></div>	
</div>

<div class="col lg last">
<div class="item bg work-link sq2">
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
	echo '<a href="'.work_url('cultural-civic').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text  grad-bg--top">	
	<h3>cultural & civic</h3>
</div>	
</a>
</div>
</div>

<div class="col lg first">
<div class="item work-link sq2">
<?php 
	$exclude_ids = array(implode(",", $exclude_array));
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__not_in' => $exclude_array,
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => array( 'commercial' )
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
	echo '<a href="'.work_url('commercial').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text  grad-bg--top">	
	<h3>commercial</h3>
</div>
</a>
</div>
</div>

<div class="col sm last">
<div class="item block block--last sq1"></div>

<div class="item sq1 bw">
<a href="<?php echo get_site_url(); ?>/careers">
	<?php $img = wp_get_attachment_image(4906, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Careers</h3>
</div>
</a>
</div>

</div>	
</div>


<div class="col50">
	<div class="grid">
		<div class="grid-sizer"></div>
		<div class="gutter-sizer"></div>
<div class="item grid-item--med grid-item work-link sq2">
<?php 
	$exclude_ids = array(implode(",", $exclude_array));
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__not_in' => $exclude_array,
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => array( 'multi-family', 'traditional-home' )
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
	echo '<a href="'.work_url('living-environments').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg--top">	
	<h3>residential</h3>
</div>
</a>
</div>

<div class="item grid-item--med grid-item block h1-small rect2">
<a class="link" href="<?php echo get_site_url(); ?>/preservation">
	<div class="text">
		<h1>Preservation+</h1>
	</div>
</a>
</div>

<div class="item grid-item--sm sq1 bw last">
<a href="<?php echo get_site_url(); ?>/post">
<?php $img = wp_get_attachment_image(4907, 'sq1'); 
	echo $img; ?>
	<div class="text grad-bg">	
		<h3>(PO)ST</h3>
	</div>
</a>
</div>

<div class="item item--contact grid-item--sm sq1 bw">
<a href="<?php echo get_site_url(); ?>/contact">
	<?php $img = wp_get_attachment_image(4908, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Contact</h3>
</div>
</a>
</div>

<div class="item grid-item--med work-link sq2">
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
			'value' => 'preservation'
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
	echo '<a href="'.get_site_url().'/preservation"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg--top">	
	<h3>preservation+</h3>
</div>
</a>
</div>

<div class="item grid-item--lg block clear rect2">
<a class="link" href="<?php echo get_site_url(); ?>/interiors">
	<div class="text">
		<h1>Interiors</h1>
	</div>
</a>
</div>


</div>

<div class="clearfix"></div>
<div class="col lg first">

<div class="item grid-item work-link sq2">
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
<div class="text grad-bg--top">	
	<h3>interiors</h3>
</div>
</a>
</div>
</div>

<div class="col sm">
<div class="item sq1 bw">
<a href="<?php echo get_site_url(); ?>/recognition">
	<?php $img = wp_get_attachment_image(4910, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Recognition</h3>
</div>
</a>
</div>
<div class="item block sq1"></div>
</div>

<div class="col lg last">
<div class="item work-link sq2">
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
<div class="text grad-bg--top">	
	<h3>sustainability</h3>
</div>
</a>
</div>
</div>


</div>

<div class="col20">
<div class="item work-link sq2">
<?php 
	$exclude_ids = array(implode(",", $exclude_array));
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__not_in' => $exclude_array,
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => array( 'education' )
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
	echo '<a href="'.work_url('education').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg--top">	
	<h3>education</h3>
</div>
</a>
</div>

<div class="item work-link sq2">
<?php 
	$exclude_ids = array(implode(",", $exclude_array));
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__not_in' => $exclude_array,
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => array( 'community' )
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
	echo '<a href="'.work_url('community').'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
} ?>
<div class="text grad-bg--top">	
	<h3>community</h3>
</div>
</a>
</div>

<div class="item block med">
	<?php $pages = get_pages(array('include' => '4964'));
		if ($pages): foreach($pages as $page): ?>
	<a class="link" href="<?php echo get_permalink($page->ID); ?>">
		<div class="text">	
		<h2><?php echo $page->post_title; ?></h2>
	</div>
	</a>
	<?php endforeach; endif; ?>
</div>

</div>

<?php get_footer(); ?>