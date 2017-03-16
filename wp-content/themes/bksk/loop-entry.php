<?php
while (have_posts()) : the_post();
//get featured img
$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'grid-thumb');
//get terms
$terms = get_the_terms( get_the_ID(), 'post_tag' );
?>  

<!-- <div class="loop-entry <?php if($terms) foreach ($terms as $term) echo $term->slug .' '; ?>"> -->
<div class="loop-entry">
	<p class="date"><?php the_time('F j, Y') ?></p>
	<a href="<?php echo esc_url( get_permalink(get_the_ID()) ); ?>">
		<h2><a href="<?php echo esc_url( get_permalink(get_the_ID()) ); ?>"> 
	<?php $title = get_the_title(); 
    echo substr($title, 0, 130);
    if(strlen($title) > 130) {
        echo '...';
    } ?>
	</h2>
<!--
	<?php if($feat_img) { ?>
    	<img src="<?php echo $feat_img[0]; ?>" alt="<?php echo the_title(); ?>" />
	<?php } ?>
-->
	</a>
	<p><?php the_content('Read More'); ?></p>
</div>
<!-- loop-entry -->

<?php endwhile; ?>