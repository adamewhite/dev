<?php
/**
 * theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage ESC
 * @since theme 1.0
 */

if ( ! function_exists( 'theme_setup' ) ) :
/**
 * theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since theme 1.0
 */
function theme_setup() {

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form', 'gallery', 'caption'
	) );
}
endif; // esc_setup
add_action( 'after_setup_theme', 'theme_setup' );

// register navigation menus
register_nav_menus( array( 'menu'=>__('Menu') ) );

/// add home link to menu
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/* Remove toolbar */
show_admin_bar(false);

// menu fallback
function default_menu() {
	require_once (get_template_directory() . '/includes/default-menu.php');
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since theme 1.0
 */
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.min.css', array(), '2.2', 'all');
	if(is_home() || is_post_type_archive('lab')) {
		wp_enqueue_script( 'images', get_template_directory_uri() . '/js/imagesloaded.min.js', array( 'jquery' ), '20161201', true );	
		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.4.1.1.min.js', array( ), false, true );
	}
	if(is_post_type_archive('work') || is_page('team')) {
		wp_enqueue_script( 'images', get_template_directory_uri() . '/js/imagesloaded.min.js', array( 'jquery' ), '20161201', true );
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.3.0.1.min.js', array( 'jquery' ), '20170102', true );
			wp_enqueue_script( 'packery', get_template_directory_uri() . '/js/packery.1.3.2.min.js', array( 'jquery', 'isotope', 'images' ), '20170102', true );
		if(is_page('team')) {
			wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '20170104', true );
			wp_enqueue_script( 'grid', get_template_directory_uri() . '/js/grid.js', array( 'jquery'), '20170111', true );
				wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery'), '20170116', true );
		}
	} if(is_page(2)) {	
		wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBoNAm7T3ov5Yy_6TeL7ijFqb-IDyMrE3Q&callback=initMap', array( 'jquery', 'theme' ), '20170104', true );
	} if(is_singular('work')) {
		wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '20170104', true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20170112', true );
	} if(is_page(2) || is_page('recognition') || is_home() || is_post_type_archive('work') || is_page('team') || is_single()) {
		wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/theme.min.js', array( 'jquery' ), '20170112', true );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

function remove_menus(){
// 	remove_menu_page( 'edit.php' ); 
}

add_action( 'admin_menu', 'remove_menus' );
add_theme_support('post-thumbnails');
add_image_size( 'sq1', 125, 125, true );
// add_image_size( 'sq250', 250, 250, true );
add_image_size( 'sq2', 260, 260, true );
add_image_size( 'sq500', 500, 500, true );
add_image_size( 'loop', 1024, 512, true );

function work_url($slug) {
	return get_site_url().'/work/#.'.$slug;
}

function disciplineImage($type, $slug, $url, $title) { 
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'featured',
			'compare' => '==',
			'value' => '1'
		),
		array(
			'key' => $type,
			'compare'    => 'LIKE',
			'value'    => $slug
		)
	),
	'posts_per_page' => 1
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq500');
	return '<a href="'.work_url($url).'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" /><div class="text grad-bg"><h3>'.$title.'</h3></div></a>';
	}
} 	
}

function disciplineImageFeat($type, $slug, $url, $title) { 
	if($slug == 'featured_adaptive') {
		$ids = array(3324, 1221,1682);
	}
	$args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
	'post__in' => $ids,
	'posts_per_page' => 1
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq500');
	return '<a href="'.work_url($url).'"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" /><div class="text grad-bg"><h3>'.$title.'</h3></div></a>';
	}
} 	
}

function set_custom_post_types_admin_order($wp_query) {  
  if (is_admin()) {  
  
    // Get the post type from the query  
    $post_type = $wp_query->query['post_type'];  
  
    if ( $post_type == 'team' || $post_type == 'work') {  
  
      // 'orderby' value can be any column name  
      $wp_query->set('orderby', 'title');  
  
      // 'order' value can be ASC or DESC  
      $wp_query->set('order', 'ASC');
//       $wp_query->set('post_status', 'publish');   
    }  
  }  
}  
add_filter('pre_get_posts', 'set_custom_post_types_admin_order');  

function recursive_array_search($needle,$haystack) {
   $keys = '';
    foreach($haystack as $key=>$value) {
        $current_key=$key;
        if($needle===$value OR (is_array($value) && recursive_array_search($needle,$value) !== false)) {
            $keys .= $current_key;
        } else {
	        
        }
    }
    return $keys;
}

function search($array, $key, $value) 
{ 
    $results = array(); 

    if (is_array($array)) 
    { 
        if (isset($array[$key]) && $array[$key] == $value) 
            $results[] = $array; 

        foreach ($array as $subarray) 
            $results = array_merge($results, search($subarray, $key, $value)); 
    } 

    return $results; 
}