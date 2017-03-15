<?php
/**
 * @package WordPress
 * @subpackage Theme
 */
?>
<?php get_header(); ?>

<?php
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android"); ?>

<div class="home--browser">

<?php $exclude_array = array(); ?>
<div class="col30">
<div class="item block rect2">
<a class="link" href="<?php echo get_site_url(); ?>/work/#.Architecture">
	<div class="text">
		<h1>Architecture</h1>
	</div>
</a>
</div>

<div class="col sm">
<div class="item sq1 bw">
<a href="<?php echo get_site_url(); ?>/practice">
	<?php $img = wp_get_attachment_image(4909, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Practice</h3>
</div>
</a>
</div>	

<div class="item block sq1"></div>	
</div>

<div class="col lg last">
<div class="item bg sq2">
	<?php echo homeImage('cultural-civic', 'architecture', 'work', '.cultural-civic', 'Cultural & Civic'); ?>	
</div>
</div>

<div class="col lg first">
<div class="item sq2">
	<?php echo homeImage('commercial', 'architecture', 'work', '.commercial', 'Commercial'); ?>
</div>
</div>

<div class="col sm last">
<div class="item block block--last sq1"></div>

<div class="item sq1 bw">
<a href="<?php echo get_site_url(); ?>/careers">
	<?php $img = wp_get_attachment_image(4906, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Careers</h3>
</div>
</a>
</div>

</div>	
</div>


<div class="col50">
	<div class="grid">
		<div class="grid-sizer"></div>
		<div class="gutter-sizer"></div>
<div class="item grid-item--med grid-item sq2">
	
	<?php 
		$options = array('multi-family', 'modern-home');
		shuffle($options);
		$type = $options[0];
		echo homeImage($type, 'architecture', 'work', '.architecture.multi-family,.modern-home,.traditional-home', 'Residential'); ?>
</div>

<div class="item grid-item--med grid-item block h1-small rect2">
<a class="link" href="<?php echo get_site_url(); ?>/preservation">
	<div class="text">
		<h1>Preservation+</h1>
	</div>
</a>
</div>

<div class="item grid-item--sm sq1 bw last">
<a href="<?php echo get_site_url(); ?>/post">
<?php $img = wp_get_attachment_image(4907, 'sq1'); 
	echo $img; ?>
	<div class="text grad-bg">	
		<h3>(PO)ST</h3>
	</div>
</a>
</div>

<div class="item item--contact grid-item--sm sq1 bw">
<a href="<?php echo get_site_url(); ?>/contact">
	<?php $img = wp_get_attachment_image(4908, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Contact</h3>
</div>
</a>
</div>

<div class="item grid-item--med sq2">
	<?php echo homeImage('preservation', 'architecture', 'work', '.preservation', 'Preservation+'); ?>
</div>

<div class="item grid-item--lg block clear rect2">
<a class="link" href="<?php echo get_site_url(); ?>/interiors">
	<div class="text">
		<h1>Interiors</h1>
	</div>
</a>
</div>


</div>

<div class="clearfix"></div>
<div class="col lg first">

<div class="item grid-item sq2">
	<?php echo homeImage('interiors', 'interiors', 'work', '.interiors', 'Interiors'); ?>
</div>
</div>

<div class="col sm">
<div class="item sq1 bw">
<a href="<?php echo get_site_url(); ?>/recognition">
	<?php $img = wp_get_attachment_image(4910, 'sq1'); 
	echo $img; ?>
<div class="text grad-bg">	
	<h3>Recognition</h3>
</div>
</a>
</div>
<div class="item block sq1"></div>
</div>

<div class="col lg last">
<div class="item sq2">
	<?php echo homeImage('sustainability', 'architecture', 'work', '.sustainability', 'Sustainability'); ?>
</div>
</div>


</div>

<div class="col20">
<div class="item sq2">
	<?php echo homeImage('education', 'architecture', 'work', '.education', 'Education'); ?>
</div>

<div class="item sq2">
	<?php echo homeImage('community', 'architecture', 'work', '.community', 'Community'); ?>
</div>

<div class="item block med">
	<?php $pages = get_pages(array('include' => '4964'));
		if ($pages): foreach($pages as $page): ?>
	<a class="link" href="<?php echo get_permalink($page->ID); ?>">
		<div class="text">	
		<h2><?php echo $page->post_title; ?></h2>
	</div>
	</a>
	<?php endforeach; endif; ?>
</div>

</div>

</div> <!-- home-browser -->

<?php mobileMessage('smaller'); ?>

<?php get_footer(); ?>