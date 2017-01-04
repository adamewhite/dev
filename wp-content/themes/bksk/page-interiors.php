<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Interiors
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="twocol">
<div class="block rect1">
	<div class="text">
	<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="bg float sq2">
<?php echo disciplineImage('interiors_project_type', 'living','interiors-living','living environments'); ?>
<div class="text">	
	<h3>living environments</h3>
</div>	
</div>

</div>

<div class="twocol">
	<div class="bg sq2">
	<?php echo disciplineImage('interiors_project_type', 'work','interiors-work','work environments'); ?>
	<div class="text">
		<h3>work environments</h3>
	</div>
</div>

<div class="sq1 bw">
<a class="link bg" href="<?php echo get_site_url(); ?>/interiors/about">
	<?php $img = wp_get_attachment_image(4909, 'sq2'); 
	echo $img; ?>
<div class="text">	
	<h3>About</h3>
</div>
</a>
</div>

<div class="block sq1 last">

</div>
</div>

<div class="fourcol">
<div class="block sq1"></div>

<div class="link bg sq1 bw">
<?php $img = wp_get_attachment_image(4990, 'sq2'); 
	echo $img; ?>
<div class="text">	
	<h3>Contact</h3>
</div>
</div>
</div>

<div class="twocol first">
	<div class="bg sq2">
	<?php echo disciplineImage('interiors_project_type', 'community', 'interiors-community','community environments'); ?>
<div class="text">	
	<h3>community environments</h3>
</div>	
</div>
</div>

<div class="fourcol last">
<div class="link bg sq1 bw">
<?php $img = wp_get_attachment_image(4991, 'sq2'); 
	echo $img; ?>
<div class="text">	
	<h3>Inspiration</h3>
</div>
</div>

<div class="block sq1"></div>
</div>

	


<?php endwhile; endif; ?>
<?php get_footer(); ?>