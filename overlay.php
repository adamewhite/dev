<?php include("wp-load.php");
// $id = $_POST['id'];
// echo $id;
$args = array( 'post__in' => array(1), 'post_type' => array('attachment', 'post'),     'post_status' => array('inherit','publish'));
$the_query = new WP_Query($args);
	if ( $the_query->have_posts() ) {
		echo '<div class="close">X</div>';
		while ( $the_query->have_posts() ) {
		$the_query->the_post();	
		
		endwhile;
		endif;
?>