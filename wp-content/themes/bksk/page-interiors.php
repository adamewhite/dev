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

<div class="float item sq2">
<?php echo disciplineImage('interiors_project_type', 'living','living-environments','living environments'); ?>
<!--
<div class="text grad-bg">	
	<h3>living environments</h3>
</div>	
-->
</div>

</div>

<div class="twocol">
	<div class="sq2 item">
	<?php echo disciplineImage('interiors_project_type', 'work','work-environments','work environments'); ?>
<!--
	<div class="text grad-bg">
		<h3>work environments</h3>
	</div>
-->
</div>

<div class="sq1 bw item">
<a class="" href="<?php echo get_site_url(); ?>/interiors/about">
	<?php $img = wp_get_attachment_image(4909, 'sq2'); 
	echo $img; ?>
<div class="text grad-bg--top">	
	<h3>About</h3>
</div>
</a>
</div>

<div class="block sq1 last">

</div>
</div>

<div class="fourcol">
<div class="block sq1"></div>

<div class="sq1 bw flip-container" onclick="this.classList.toggle('hover');">
<div class="flip">
	<div class="front">
	<?php $img = wp_get_attachment_image(5536, 'sq2'); 
		echo $img; ?>
	<div class="text grad-bg--top">	
		<h3>Contact</h3>
	</div>
	</div>
	<div class="back">
		<h3>Contact</h3>
		<p>BKSK Architects LLP<br />
		28 West 25th Street, 4th Fl<br />
		New York, NY 10010<br />
		Phone:  212.807.9600<br /></p>
<!-- 		<p>General/Press: <a href="mailto:bkskinfo@bksk.com" target="_blank">bkskinfo@bksk.com</a></p> -->
		<p><a href="mailto:interiors@bksk.com" target="_blank">interiors@bksk.com</a></p>
		<p><a href="https://instagram.com/bkskinteriors" target="_blank">instagram.com/bkskinteriors</a></p>
	</div>
</div>
</div>
</div>

<div class="twocol first">
	<div class="sq2 item">
	<?php echo disciplineImage('interiors_project_type', 'community', 'community-environments','community environments'); ?>
<!--
<div class="text grad-bg">	
	<h3>community environments</h3>
</div>
-->	
</div>
</div>

<div class="fourcol last">
<div class="sq1 bw item">
<?php $jsonurl = "https://api.instagram.com/v1/users/self/media/recent/?access_token=3323346110.1677ed0.8bdb4bc04ff14e0793eac97a159dddb2&count=1";	
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json, true);
	foreach($json_output['data'] as $item) {
		$title = str_replace(' & ', ' &amp; ', $item['caption']['text']);
	    $link = $item['link'];
	    $image = $item['images']['low_resolution']['url']; 
		echo '<a href="'.get_site_url().'/interiors/inspiration"><img src="'.$image.'" alt="'.$title.'" />';
	} ?>
<div class="text grad-bg--top">	
	<h3>Inspiration</h3>
</div></a>
</div>

<div class="block sq1"></div>
</div>

	


<?php endwhile; endif; ?>
<?php get_footer(); ?>