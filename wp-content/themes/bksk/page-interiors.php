<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Interiors
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="discipline">

<div class="twocol container resp-col1">
<div class="block rect1">
	<div class="text">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="item sq2">
<?php echo disciplineImage('living-environments', 'interiors', '.living-environments','living environments'); ?>
</div>

<div class="resp-lg section1">
	
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
		<div class="content">
			<h3>Contact</h3>
			<p>BKSK Architects LLP<br />
			28 West 25th Street, 4th Fl<br />
			New York, NY 10010<br />
			Phone:  212.807.9600<br /></p>
			<p><a href="mailto:interiors@bksk.com" target="_blank">interiors@bksk.com</a></p>
			<p><a href="https://instagram.com/bkskinteriors" target="_blank"><img class="instagram" src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" />/bkskinteriors</a></p>
		</div>
	</div>
</div>
</div>

</div>

</div><!-- twocol -->

<div class="twocol resp-col2">

<div class="sq2 item">
	<?php echo disciplineImage('work-environments', 'interiors', '.work-environments','work environments'); ?>
</div>

<div class="sq1 bw item resp-sm about">
	<a class="" href="<?php echo get_site_url(); ?>/interiors/about">
		<?php $img = wp_get_attachment_image(5782, 'sq2'); 
		echo $img; ?>
	<div class="text grad-bg--top">	
		<h3>About</h3>
	</div>
	</a>
</div>

<div class="block sq1 last"></div>

<div class="sq1 bw item resp-lg about">
<a class="" href="<?php echo get_site_url(); ?>/interiors/about">
	<?php $img = wp_get_attachment_image(5782, 'sq2'); 
	echo $img; ?>
<div class="text grad-bg--top">	
	<h3>About</h3>
</div>
</a>
</div>

</div>

<div class="fourcol resp-fourcol">

<div class="resp-sm section1">

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
		<div class="content">
			<h3>Contact</h3>
			<p>BKSK Architects LLP<br />
			28 West 25th Street, 4th Fl<br />
			New York, NY 10010<br />
			Phone:  212.807.9600<br /></p>
			<p><a href="mailto:interiors@bksk.com" target="_blank">interiors@bksk.com</a></p>
			<p><a href="https://instagram.com/bkskinteriors" target="_blank"><img class="instagram" src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" />/bkskinteriors</a></p>
		</div>
	</div>
</div>
</div>

</div>

</div>

<div class="twocol first resp-col2">
	
<div class="fourcol last resp-lg section2">
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

</div><!-- section2 -->


<div class="sq2 item resp-hack">
	<?php echo disciplineImage('community-environments', 'interiors', '.community-environments', 'community environments'); ?>
</div>

</div><!-- twocol -->

<div class="fourcol last resp-sm section2">
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

</div><!-- section2 -->

</div>
	


<?php endwhile; endif; ?>
<?php get_footer(); ?>