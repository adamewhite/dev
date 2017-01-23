<?php
/**
 * @package WordPress
 * @subpackage BKSK
 */
?>
<aside id="sidebar" class="clearfix">

<?php if(is_page(5361) || is_archive()) { 

// (Po)st Categories 
	echo '<div class="sidebar-box"><h3>Tags</h3>';
	$args = array(  'taxonomy' => 'post_tag', 'hide_empty'=> false, 'orderby' => 'title', 'include' => array( 25, 45, 21, 54, 53, 26, 64, 111, 44, 29)
	);
	$cats = get_terms($args);
	if($cats) {
		echo '<ul>';
		foreach( $cats as $cat ) {    
			echo '<li><a href="'.get_term_link($cat->term_id).'">'.$cat->name.'</a></li>';
		}
		echo '</ul>';	
	}
	echo '</div>';

// Instagram
	$jsonurl = "https://api.instagram.com/v1/users/self/media/recent/?access_token=1433913024.1677ed0.cf327409200347adbefb83d477754726&count=6";	
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json, true);

	echo '<div class="sidebar-box instagram"><h3>Instagram</h3>';
	foreach($json_output['data'] as $item) {
		$title = str_replace(' & ', ' &amp; ', $item['caption']['text']);
	    $link = $item['link'];
	    $image = $item['images']['low_resolution']['url'];  
// 	    $image = substr($image, 0, strpos($image, "?"));
	    
	    $type  = $item['type'];
	   
		echo '<a class="twocol" href="'.$link.'" target="_blank">';
		if($type == 'video') {
		    $video = $item['videos']['low_resolution']['url']; 
			echo '<video poster="'.$image.'" data-setup="{}">';
			echo '<source src="'.$video.'" type="video/mp4" />';
			echo '</video>';
		} else {
			echo '<img src="'.$image.'" alt="'.$title.'" />';
		}
		echo '</a>';
			
	}
	echo '</div>';

}	?>

<?php if(is_page(5061)) { 
	echo '<div class="sidebar-box"><h3>Awards</h3>';
	$args = array(
            'post_type' =>'post',
            'post_status'=>'publish', 
            'orderby' => 'date',
            'posts_per_page' => 10,
            'tag' => 'awards'
        ); 
		query_posts ($args);
		if (have_posts()) :
		while (have_posts()) : the_post(); 
			echo '<p><a href="'.get_the_permalink().'">'.get_the_title().'</a></p>';
		endwhile; endif;
	echo '</div>';

	echo '<div class="sidebar-box"><h3>Press Inquiries</h3>';
	echo '<p>Contact <a href="mailto:bkskinfo@bksk.com" target="_blank">bkskinfo@bksk.com</a></p>';
	echo '</div>';
} ?>

</aside><!-- /sidebar -->