<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Preservation
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="twocol">
<div class="block rect1">
	<div class="text">
	<h2><?php the_title(); ?></h2>
	</div>
</div>

<div class="item float sq2">
<?php echo disciplineImage('preservation_project_type', 'adaptive','adaptive','adaptive reuse/restoration'); ?>
<!--
<div class="text">	
	<h3>adaptive reuse/restoration</h3>
</div>
-->	
</div>

</div>

<div class="twocol">
	<div class="item sq2">
<?php echo disciplineImage('preservation_project_type', 'new','new','new buildings in landmark'); ?>
<!--
<div class="text">	
	<h3>new buildings in landmark</h3>
</div>
-->	
</div>

<div class="sq1 bw">
<a class="" href="<?php echo get_site_url(); ?>/preservation/about">
<?php $img = wp_get_attachment_image(4992, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg--top">	
	<h3>About</h3>
</div>
</a>
</div>

<div class="block sq1 last">

</div>
</div>

<div class="clearfix"></div>
<div class="twocol first">

<div class="block float sq1"></div>

<div class="float item sq1 last bw">
<?php $img = wp_get_attachment_image(5089, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg--top">	
	<h3>Preservation Dialogue</h3>
</div>
</div>

<div class="item rect1 historic block">
<?php echo disciplineImage('preservation_project_type', 'historic','historic','historic resource analyses'); ?>
<!--
<div class="text">	
	<h3>historic resource analyses</h3>
</div>
-->	
</div>

</div>

<div class="twocol last">
	<div class="item sq2">
	<?php echo disciplineImage('preservation_project_type', 'extending','extending','expanding our preservation ethos'); ?>
<!--
<div class="text">	
	<h3>expanding our preservation ethos</h3>
</div>	
-->
</div>
</div>
	


<?php endwhile; endif; ?>
<?php get_footer(); ?>