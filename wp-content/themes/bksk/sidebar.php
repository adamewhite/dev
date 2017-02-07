<?php
/**
 * @package WordPress
 * @subpackage BKSK
 */
?>
<aside id="sidebar" class="clearfix">

<?php if(is_page(5361) || is_post_type_archive('post')) { 

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
	echo '<div class="sidebar-box"><h3>Twitter</h3>';
		echo '<div class="twitter"></div>';
	echo '</div>';

	echo '<div class="sidebar-box"><h3>Press Inquiries</h3>';
	echo '<p>Contact: <a href="mailto:bkskinfo@bksk.com" target="_blank">bkskinfo@bksk.com</a></p>';
	echo '</div>';
} ?>

<?php if(is_page(5059)) {
	echo '<div class="sidebar-box sidebar--careers">';
	echo '<p>BKSK endeavors to use staff in a studio-type format as opposed to a tiered job-specific format, so we value employees who are strong in—and have an interest in—all phases of putting a building together. We will always consider an applicant who is ready to step up to the next level of responsibility irrespective of years of experience keeping in mind that experience counts for a great deal.</p>';
	echo '<p>Resumes may be submitted via email to bkskinfo[at]bksk.com. Due to the high volume of emails that we receive, responses are not guaranteed. Emails with attachments larger than 5MB will be deleted.</p>';
	echo '</div>';
} ?>

<?php if(is_post_type_archive('lab')) { 
	echo '<div class="sidebar-box"><h3>Syntax</h3>';
	$args = array(  'taxonomy' => 'syntax', 'hide_empty'=> false, 'orderby' => 'title'	);
	$cats = get_terms($args);
	if($cats) {
		echo '<ul>';
		foreach( $cats as $cat ) {    
			echo '<li><a href="'.get_term_link($cat->term_id).'">'.$cat->name.'</a></li>';
		}
		echo '</ul>';	
	}
	echo '</div>';

	echo '<div class="sidebar-box"><h3>Tools</h3>';
	echo '<a href="http://www.bkskarch.com/lab/strategy/map.php">NYC Strategy Field</a>';
	echo '</div>';

} ?>

</aside><!-- /sidebar -->