<?php
/**
 * @package WordPress
 * @subpackage BKSK
 */
?>
<aside id="sidebar" class="clearfix">

<?php if(is_page(5361)) { 

// (Po)st Categories 
	echo '<div class="sidebar-box"><h3>Categories</h3>';
	$args = array(  'taxonomy' => 'category', 'hide_empty'=> false, 'orderby' => 'title'
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

</aside><!-- /sidebar -->