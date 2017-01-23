<?php
/**
 * @package WordPress
 * @subpackage BKSK
 */
?>
</div><!-- /main -->
<!-- <?php if(!is_page(5361)) { ?> -->
<div class="clearfix"></div>
<!-- <?php } ?> -->
<footer>
<?php if(!is_home()) { ?>	
<?php echo '<nav class="footer__subnav" role="navigation">';
	wp_nav_menu( array('menu' => 'Footer' ));
	echo '</nav>'; ?>
<?php } ?>
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
<!-- ©2016 BKSK ARCHITECTS. ALL RIGHTS RESERVED. TERMS & CONDITIONS. PRIVACY POLICY. -->
</footer>
</div><!-- wrapper --> 
<?php 
	echo '<div class="overlay"><button class="close">X</button><button class="prev"><</button><button class="next">></button><div class="content"></div></div>';
 ?>
<?php wp_footer(); ?>

</body>
</html>