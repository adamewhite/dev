<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Lab
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="twocol">
<div class="block rect1">
	<div class="text small">
	<h2><?php the_title(); ?></h2>
	</div>
</div>

<div class="item float sq2">
	<?php $img = wp_get_attachment_image(5795, 'sq500');
	echo '<a href="'.get_site_url().'/lab">'.$img; ?>
	<div class="text grad-bg">	
		<h3>what we're thinking</h3>
	</div></a>	
</div>

</div>

<div class="twocol">
	<div class="item sq2">
	<?php echo disciplineImage('specialty', 'sustainability','sustainability','projects we\'ve done'); ?>
	</div>

	<div class="item sq1 bw">
		<?php $img = get_field('about', 4964);
		if($img != '') {
			$img = $img['sizes'][ 'sq2' ];
			echo '<a href="'.get_site_url().'/lab/about"><img src="'.$img.'" />';
		} ?>
		<div class="text grad-bg--top">	
			<h3>About</h3>
		</div></a>
	</div>
	
	<div class="block sq1 last"></div>

</div>


<div class="twocol first">

<div class="rect1 item--strategy item block">	
<a href="http://www.bkskarch.com/lab/strategy/map.php">
	<? $img = wp_get_attachment_image(5804, 'full');
		echo $img; ?>
<div class="text top">	
	<h3>NYC Design Strategy Tool</h3>
</div></a>	
</div>

<div class="block sq1"></div>

<div class="sq1 last bw flip-container">
	<div class="flip">
	<div class="front">
	<?php $img = get_field('contact', 4964); 
		if($img == '') {
			$img = wp_get_attachment_image(4992, 'sq1');
			echo $img;
		} else {
			$img = $img['sizes'][ 'sq2' ];
			echo '<img src="'.$img.'" />';
		} ?>
	<div class="text grad-bg--top">	
		<h3>Contact</h3>
	</div>
	</div>
	<div class="back back--lab">
		<h3>Contact</h3>
		<p>BKSK Architects LLP<br />
		28 West 25th Street, 4th Fl<br />
		New York, NY 10010<br />
		Phone:  212.807.9600<br /></p>
	</div>
	</div>
</div>

</div>


<div class="twocol last">
	<div class="item sq2">
<?php $img = wp_get_attachment_image(5793, 'sq2'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>tools we use</h3>
</div>	
</div>
</div>
	


<?php endwhile; endif; ?>
<?php get_footer(); ?>