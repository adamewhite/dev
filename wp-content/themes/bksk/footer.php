<?php
/**
 * @package WordPress
 * @subpackage BKSK
 */
?>
</div><!-- /main -->
<div class="clearfix"></div>
<footer>
<?php echo '<nav class="footer__subnav" role="navigation">';
	wp_nav_menu( array('menu' => 'Footer', 'items_wrap' => my_nav_wrap() ));
	echo '</nav>'; ?>
<?php 
	query_posts('page_id=2'); 
	if(have_posts()) : while (have_posts ()): the_post(); 
	if( have_rows('social') ):
		echo '<div class="social">';
		while( have_rows('social') ): the_row(); 
		$image = get_sub_field('image');
		$image = wp_get_attachment_image_url( $image, 'full' );
		$link = get_sub_field('link');
		echo '<a href="'.$link.'" target="_blank"><img src="'.$image.'" /></a>';
	endwhile; echo '</div>'; endif;
endwhile; endif; ?>
<div class="clearfix"></div>

</footer>
</div><!-- wrapper --> 
<?php 
	echo '<div class="overlay"><button class="close">X</button><button class="prev"><</button><button class="next">></button><div class="content"></div></div>';
 ?>
<?php wp_footer(); ?>

</body>
</html>