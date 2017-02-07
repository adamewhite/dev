<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Recognition
 */
?>

<?php get_header(); ?>
<div id="content">
<!--
<header class="page__header">	
	<h2>BKSK In the News</h2>
</header>
-->
<?php 
	echo '<h3> Featured Projects</h3>';
	echo '<div class="awards-header">';
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
/*
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => array( 'multi-family', 'traditional-home' )
		)
	),
*/
	'meta_query' => array(
		array(
			'key' => 'featured',
			'compare' => '==',
			'value' => '1'
		)
	),
	'posts_per_page' => 4
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
	$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
	echo '<div class="fourcol"><a href="'.get_the_permalink($post->ID).'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" /></div>';
	} 
} 
echo '</div>'; ?>

<aside id="post">

<h3>Press</h3>
<?php $args = array(
            'post_type' =>'press',
            'post_status'=>'publish', 
            'orderby' => 'date',
            'posts_per_page' => -1
        ); 
query_posts ($args);
if (have_posts()) :
echo '<div id="accordion">';
$year_variable = '';
$count = 0;
while (have_posts()) : the_post(); 
$source = get_field('website');
$link = get_field('website_link'); 
   $post_year = get_the_date( 'Y' );
    if ($year_variable !== $post_year) {
	    if($count != 0) {
		    echo '</div>';
	    }
        echo '<div class="accordion-header">' . $post_year . '</div><div class="accordion-content">';
    }
    $year_variable = $post_year;
?>
		<span>
			<p>[Project] - "<a href="<?php echo $link; ?>"><?php the_title(); ?></a>," <?php echo $source; ?>, <?php the_time('F'); ?> <?php the_time('Y'); ?></p>
		</span>  
	<?php $count++; ?>

<?php endwhile; echo '</div>'; endif; echo '</div>'; wp_reset_query(); ?>


<?php $args = array(
            'post_type' =>'award',
            'post_status'=>'publish', 
            'orderby' => 'date',
            'posts_per_page' => -1
        ); 
query_posts ($args);
if (have_posts()) :
$year_variable = '';
$count = 0;
$post_array = array();
while (have_posts()) : the_post(); 
$award = get_field('award');
   $post_year = get_the_date( 'Y' );
   $year_int = intval($post_year);
    $year_variable = $post_year;
    $terms = wp_get_object_terms($post->ID, 'work');
//     var_dump($terms);
    if($terms) {
	    foreach($terms as $term) {
		    $term_link = get_the_permalink($term->term_id);
			$post = '<p>'.get_the_title().', '.$award.'</p>';
			array_push($post_array, array('post' => $post, 'term' => $term->name, 'term_link' => $term_link, 'date' => $post_year));
	    }
    } else {
	       $post = '<p>'.get_the_title().', '.$award.'</p>';
	    array_push($post_array, array('post' => $post, 'term' => 'z_none', 'term_link' => '', 'date' => $post_year));
?>
	<?php } $count++; ?>

<?php endwhile; endif; wp_reset_query(); ?>

<?php 
echo '<h3>Awards</h3>';
echo '<div id="accordion" class="awards">';
$sort = array();
foreach($post_array as $k=>$v) {
    $sort['date'][$k] = $v['date'];
    $sort['term'][$k] = $v['term'];
}
array_multisort($sort['date'], SORT_DESC, $sort['term'], SORT_ASC,$post_array);

// 	$post_array = array_reverse($post_array);
// var_dump($post_array);
$newcount = 0;	
$year_variable = '';
$term_variable = '';
foreach($post_array as $post) {
	$post_year = $post['date'];
	$term = $post['term'];
	if($term == 'z_none') {
		$term = 'BKSK Architects';
	}
    $year_int = intval($post_year);
	if ($year_variable !== $post_year && $year_int >= 2012) {
	    if($newcount != 0) {
		    echo '</div>';
	    }
	    if($year_int == 2012) {
		    $post_year = '2012 and earlier';
	    }
        echo '<div class="accordion-header">' . $post_year . '</div><div class="accordion-content">';
    }
    if($year_variable !== $post_year && $year_int < 2012) {
	    if($year_int != 2011) {
		    echo '</article>';
	    }
	    echo '<p>'.$year_int.'</p>';
    }
    $year_variable = $post_year;
    if ($term_variable !== $term) {
	    echo '</article><article class="group">';
	    if($term != 'BKSK Architects') {
		    echo '<a href="'.$post['term_link'].'">';
		} 
		echo $term;
		if($term != 'BKSK Architects') {
		    echo '</a>';
		} 
	}
    echo $post['post'];
    if ($term_variable !== $term && $term != 'none') {
//     	echo '</span><br /><br />';
    }
	$term_variable = $term;
    $newcount++;
} 
echo '</div>'; ?>
</aside>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>