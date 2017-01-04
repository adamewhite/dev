 <?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

<div class="work__search">
	<div class="fourcol"><h3>Search By:</h3></div>
	<div class="fourcol"><h3>Discipline</h3>
		<ul id="discipline" class="">
			<li><a href="#filter=.Architecture" class="Architecture active" data-filter=".Architecture"><label class="control control--checkbox">Architecture<input type="checkbox" checked="checked"/><div class="control__indicator"></div></label></a></li>
			<li><a href="#filter=.Interiors" class="Interiors" data-filter=".Interiors"><label class="control control--checkbox">Interiors<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
		</ul>
	</div>
	<div class="fourcol">
		<div class="project_type filter Interiors" style="display:none">
			<h3>Project Type</h3>
			<ul id="project_type">			
				<li><a href="#filter=.interiors-living" class="interiors-living" data-filter=".interiors-living">Living Environments</a></li>
				<li><a href="#filter=.interiors-work" class="interiors-work" data-filter=".interiors-work">Work Environments</a></li>
				<li><a href="#filter=.interiors-community" class="interiors-community" data-filter=".interiors-community">Community Environments</a></li>
			</ul>
		</div>
		<div class="filter Specialty">
			<h3>Specialty</h3>
			<ul id="project_type">
				<li><a href="#filter=.Preservation" class="Preservation" data-filter=".Preservation">Preservation+</a></li>
				<li><a href="#filter=.Sustainability" class="Sustainability" data-filter=".Sustainability">Sustainability</a></li>
			</ul>
		</div>
	</div>
	<div class="fourcol">
	<div class="project_type filter Architecture">
		<h3>Project Type</h3>
	<ul id="project_type">
	<?php $terms = get_terms( array(
		'taxonomy' => 'project_type',
		'hide_empty' => false,
		'exclude' => 4
	)); 
	$term_count = 0;
	foreach($terms as $term) {
		$term_count++;
		echo '<li><a href="#filter=.'.$term->slug.'" class="'.$term->slug.'" data-filter-name="type'.$term_count.'" data-filter-value=".'.$term->slug.'" data-filter=".'.$term->slug.'"><label class="control control--checkbox">'.$term->name.'<input type="checkbox"/><div class="control__indicator"></div></label></a></li>';
	} ?>
	</ul>
	</div>	
	<div class="project_type filter Preservation">
		<h3>Project Type</h3>
	<ul id="project_type">
	<?php 
		$field_key = 'field_586675d92359a';
		$field = get_field_object($field_key);
		$preservations = $field['choices'];
	foreach($field['choices'] as $k => $v) {
		echo '<li><a href="#filter=.'.$k.'" class="'.$k.'" data-filter=".'.$k.'">'.$v.'</a></li>';
	} ?>
	</ul>
	</div>	
</div>
</div>
		
<div class="grid-work">
<!-- 	<div class="grid-sizer"></div> -->
<?php 
$count = 0;
$small_count = 0;
$args = array(
            'post_type' =>'work',
            'post_status'=>'publish', 
            'orderby' => 'rand',
            'posts_per_page' => -1
        ); 
query_posts ($args);
if (have_posts()) :
while (have_posts()) : the_post();

$featured = get_post_meta(get_the_ID(), 'featured', true);
/* if($featured != 1) :  ADD BACK IN ENDIF */

$count++;
//get featured img
$disciplines = get_field('discipline');
$specialties = get_field('specialty');
$interiors = get_field('interiors_project_type');
$preservations = get_field('preservation_project_type');
$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq1');
$feat_img2 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq500');
//get terms
$terms = get_the_terms( get_the_ID(), 'project_type' );

?>  
<?php if($feat_img) { ?>

	<div class="grid-item <?php if($disciplines) foreach($disciplines as $discipline) echo $discipline.' '; if($specialties) foreach($specialties as $specialty) echo $specialty.' '; if($interiors) foreach($interiors as $interior) echo 'interiors-'.$interior.' '; if($preservations) foreach($preservations as $preservation) echo ''.$preservation.' '; if($terms) foreach ($terms as $term) echo $term->slug .' '; if($featured == 1) : echo 'grid-item--featured'; endif;?>">

	    
	    <?php if($feat_img) { ?>
	    <a href="<?php the_permalink(' ') ?>" class="">
		    <img src="<?php echo $feat_img[0]; ?>" alt="<?php echo the_title(); ?>" />
		</a>
		<?php } else { ?>
		<a href="<?php the_permalink(' ') ?>" class="block"></a>
		<?php } ?>
		<div class="text">
		   <a href="<?php the_permalink(' ') ?>">
				<h3><?php the_title(); ?> <?php echo $small_count; ?></h3>		  	
		    </a>
		</div>
</div><!-- item -->

<?php if($featured == 0) {
	$small_count++;
} if($small_count == 4 || $small_count == 12 || $small_count == 20 || $small_count == 28) {
	echo '<div class="grid-item grid-item--block ';if($disciplines) foreach($disciplines as $discipline) echo $discipline.' '; echo '"></div>';
	$small_count++;
} ?>
<?php } ?>
   
<?php endwhile; ?>                	     
</div><!-- END project-content -->


<?php endif; ?>

<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bbq.js"> </script> -->
<script type="text/javascript">

</script>
<?php get_footer(); ?>