 <?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

<div id="filters" class="work__search">
	<div class="fourcol">
		<h3>Search By:</h3>
		<a href="#" class="filter--remove">Remove Filters</a>
	</div>
	<div class="fourcol">
		<h3>Discipline</h3>
		<ul class="discipline">
			<li class="discipline"><a href="#filter=.Architecture" class="Architecture" data-filter-name="discipline1" data-filter-value=".Architecture" data-filter=".Architecture"><label class="control control--checkbox">Architecture<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
			<li class="discipline"><a href="#filter=.Interiors" class="Interiors" data-filter-name="discipline2" data-filter-value=".Interiors" data-filter=".Interiors"><label class="control control--checkbox">Interiors<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
		</ul>
	</div>
	<div class="fourcol">
		<div class="project_type filter filter--two Interiors">
			<h3>Project Type</h3>
			<ul id="project_type" class="project_type Interiors">			
				<li><a href="#filter=.interiors-living" data-filter-name="int_type1" class="interiors-living" data-filter-value=".interiors-living" data-filter=".interiors-living"><label class="control control--checkbox">Living Environments<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
				<li><a href="#filter=.interiors-work" class="interiors-work" data-filter-name="int_type2" data-filter-value=".interiors-work" data-filter=".interiors-work"><label class="control control--checkbox">Work Environments<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
				<li><a href="#filter=.interiors-community" class="interiors-community" data-filter-name="int_type3" data-filter-value=".interiors-community" data-filter=".interiors-community"><label class="control control--checkbox">Community Environments<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
			</ul>
		</div>
		<div class="filter filter--two Architecture">
			<h3>Specialty</h3>
			<ul id="filter" class="specialty">
				<li><a href="#filter=.preservation" class="preservation" data-filter-name="specialty" data-filter-value=".preservation" data-filter=".preservation"><label class="control control--checkbox">Preservation+<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
				<li><a href="#filter=.sustainability" class="sustainability" data-filter-name="specialty" data-filter-value=".sustainability" data-filter=".sustainability"><label class="control control--checkbox">Sustainability<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
			</ul>
		</div>
	</div>
	<div class="fourcol">
	<div class="project_type filter filter--three Architecture">
		<h3>Project Type</h3>
	<ul id="filter" class="project_type Architecture">
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
	<div class="project_type filter filter--three Preservation">
		<h3>Project Type</h3>
	<ul id="project_type" class="project_type">
	<?php 
		$count = 0;
		$field_key = 'field_586675d92359a';
		$field = get_field_object($field_key);
		$preservations = $field['choices'];
	foreach($field['choices'] as $k => $v) {
		$count++;
		echo '<li><a href="#filter=.'.$k.'" class="'.$k.'" data-filter-name="type'.$count.'" data-filter-value=".'.$k.'" data-filter=".'.$k.'"><label class="control control--checkbox">'.$v.'<input type="checkbox"/><div class="control__indicator"></div></label></a></li>';
	} ?>
	</ul>
	</div>	
</div>
</div>
		
<div id="grid" class="grid-work">
<!-- 	<div class="gutter-sizer"></div> -->
<?php 
$f_types = array(
	
);	
$types = array();
$taxonomy = array('project_type', 'interior_project_type', 'specialty');

$terms = get_terms( array(
		'taxonomy' => $taxonomy,
		'hide_empty' => false,
		'exclude' => 4
	)); 
	$term_count = 0;
	foreach($terms as $term) {
		array_push($types, $term->slug);
	}
	//recursive array search not picking up first array hack
	array_push($f_types, array('id' => '0', 'type' => 'test'));
	
foreach($types as $type) {
	${'feat_'.$type.'s'} = get_field('featured_'.$type, 5376);	
	if(${'feat_'.$type.'s'}) {
		foreach(${'feat_'.$type.'s'} as ${'feat_'.$type}){
			array_push($f_types, array('id' => ${'feat_'.$type}->ID, 'type' => $type));
		}
	}
}

// var_dump($f_types);
	
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
// $feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq1');
// $feat_img2 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq500');
// $feat_img = 'http://localhost:8888/wp-content/uploads/2017/01/Reactive-Digital-Wall-500x500.jpg';
//get terms
$terms = get_the_terms( get_the_ID(), 'project_type' );
$types = array();
	if(search($f_types, 'id', $post->ID) != '') {
		$values = search($f_types, 'id', $post->ID);

		foreach($values as $value) {
			array_push($types, $value['type']);	
		}

	} else {
		echo $post->ID;
	}

// var_dump($types);
?>  
<?php if($feat_img) { ?>

	<div class="grid-item <?php if($disciplines) foreach($disciplines as $discipline) echo $discipline.' '; if($specialties) foreach($specialties as $specialty) echo strtolower($specialty).' '; if($interiors) foreach($interiors as $interior) echo 'interiors-'.$interior.' '; if($preservations) foreach($preservations as $preservation) echo ''.$preservation.' '; if($terms) foreach ($terms as $term) echo $term->slug .' '; if($featured == 1) : echo 'grid-item--featured '; endif; if($types) foreach($types as $type) echo 'featured_'.$type.' ' ;?>">

	    
	    <?php if($feat_img) { ?>
	    <a href="<?php the_permalink(' ') ?>">
		    <img src="<?php echo $feat_img[0]; ?>" alt="<?php echo the_title(); ?>" />
		</a>
		<?php } else { ?>
		<a href="<?php the_permalink(' ') ?>" class="block"></a>
		<?php } ?>
		<div class="text grad-bg">
				<h3><?php the_title(); ?></h3>		  	
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
</div><!-- END grid-work -->
<div id="empty"><h2>No projects match your search.</h2>
<p>Please try to <a href="javascript:reset(true);">remove filters</a>.</p></div>

<?php endif; ?>

<?php get_footer(); ?>