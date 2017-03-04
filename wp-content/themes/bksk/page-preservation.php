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
<?php echo disciplineImage('adaptive-reuse', 'architecture', '.adaptive-reuse','adaptive reuse/restoration'); ?>
</div>

</div>

<div class="twocol">
	<div class="item sq2">
<?php echo disciplineImage('landmark-districts', 'architecture', '.landmark-districts','new buildings in landmark districts'); ?>
</div>

<div class="item sq1 bw">
<a class="" href="<?php echo get_site_url(); ?>/preservation/about">
	<?php $img = get_field('about', 4968);
	if($img != '') {
		$img = $img['sizes'][ 'sq2' ];
		echo '<img src="'.$img.'" />';
	} ?>
<div class="text grad-bg--top">	
	<h3>About</h3>
</div>
</a>
</div>

<div class="block sq1 last">

</div>
</div>

<div class="twocol first">

<div class="block float sq1"></div>

<div class="float item sq1 last">
	<?php $img = get_field('contact', 4968);
	if($img != '') {
		$img = $img['sizes'][ 'sq2' ];
		echo '<img src="'.$img.'" />';
	} ?>
<div class="text grad-bg--top">	
	<h3>Preservation Dialogue</h3>
</div>
</div>

<div class="item rect1 historic block">
<?php echo disciplineImage('historic-resource', 'architecture', '.historic-resource','historic resource analysis'); ?>
</div>

</div>

<div class="twocol last">
	<div class="item sq2">
	<?php echo disciplineImage('preservation-ethos', 'architecture', '.preservation-ethos','expanding our preservation ethos'); ?>
</div>
</div>
	
<?php endwhile; endif; ?>
<?php get_footer(); ?>