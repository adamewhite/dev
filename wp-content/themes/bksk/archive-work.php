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
			<li class="discipline"><a href="#filter=.architecture" class="architecture" data-filter-name="discipline1" data-filter-value=".architecture" data-filter=".Architecture"><label class="control control--checkbox">Architecture<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
			<li class="discipline"><a href="#filter=.interiors" class="interiors" data-filter-name="discipline2" data-filter-value=".interiors" data-filter=".interiors"><label class="control control--checkbox">Interiors<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
		</ul>
	</div>
	<div class="fourcol">
		<div class="project_type filter filter--two interiors">
			<h3>Project Type</h3>
			<ul id="project_type" class="project_type interiors">		
				<li><a href="#filter=.living-environments" data-filter-name="int_type" class="interiors-living" data-filter-value=".living-environments" data-filter=".living-environments"><label class="control control--checkbox">Living Environments<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
				<li><a href="#filter=.work-environments" class="interiors-work" data-filter-name="int_type" data-filter-value=".work-environments" data-filter=".work-environments"><label class="control control--checkbox">Work Environments<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
				<li><a href="#filter=.community-environments" class="interiors-community" data-filter-name="int_type" data-filter-value=".community-environments" data-filter=".community-environments"><label class="control control--checkbox">Community Environments<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
			</ul>
		</div>
		<div class="filter filter--two architecture">
			<h3>Specialty</h3>
			<ul id="filter" class="specialty">
				<li><a href="#filter=.preservation" class="preservation" data-filter-name="specialty" data-filter-value=".preservation" data-filter=".preservation"><label class="control control--checkbox">Preservation+<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
				<li><a href="#filter=.sustainability" class="sustainability" data-filter-name="specialty" data-filter-value=".sustainability" data-filter=".sustainability"><label class="control control--checkbox">Sustainability<input type="checkbox"/><div class="control__indicator"></div></label></a></li>
			</ul>
		</div>
	</div>
	<div class="fourcol">
	<div class="project_type filter filter--three architecture">
		<h3>Project Type</h3>
	<ul id="filter" class="project_type architecture">
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
	<?php $terms = get_terms( array(
		'taxonomy' => 'specialty',
		'hide_empty' => false,
		'exclude' => array(184,17)
	)); 
	$term_count = 0;
	foreach($terms as $term) {
		$term_count++;
		echo '<li><a href="#filter=.'.$term->slug.'" class="'.$term->slug.'" data-filter-name="type'.$term_count.'" data-filter-value=".'.$term->slug.'" data-filter=".'.$term->slug.'"><label class="control control--checkbox">'.$term->name.'<input type="checkbox"/><div class="control__indicator"></div></label></a></li>';
	} ?>
	</ul>
	</div>	
</div>
<div class="keyword--work">
<h3>Keyword Search</h3>
<input type="text" class="quicksearch" placeholder="" />
</div>
</div>
		
<div id="grid" class="grid-work">
	<div class="gutter-sizer"></div>
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

	$feat_archs = get_field('featured_architecture', 5376);
	if($feat_archs) {
		foreach($feat_archs as $feat_arch) {
			echo $feat_arch->ID;
			array_push($f_types, array('id' => $feat_arch->ID, 'type' => 'architecture'));
		}
	}
	
	$feat_interiors = get_field('featured_interiors', 5376);
	if($feat_interiors) {
		foreach($feat_interiors as $feat_interior) {
			array_push($f_types, array('id' => $feat_interior->ID, 'type' => 'interiors'));
		}
	}
	
	$feat_defaults = get_field('featured', 5376);
	if($feat_defaults) {
		foreach($feat_defaults as $feat_default) {
			array_push($f_types, array('id' => $feat_default->ID, 'type' => 'default'));
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

// $feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq1');
// $feat_img2 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq2');
$keywords = get_field('keywords');
$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq500');

//get terms
$project_terms = get_the_terms( get_the_ID(), 'project_type' );
$interior_terms = get_the_terms( get_the_ID(), 'interior_project_type' );
$specialty_terms = get_the_terms( get_the_ID(), 'specialty' );
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

	<div class="grid-item <?php if($disciplines) foreach($disciplines as $discipline) echo strtolower($discipline).' '; if($project_terms) foreach ($project_terms as $p_term) echo $p_term->slug .' '; if($interior_terms) foreach ($interior_terms as $i_term) echo $i_term->slug .' '; if($specialty_terms) foreach ($specialty_terms as $s_term) echo $s_term->slug .' ';  if($types) foreach($types as $type) echo 'featured_'.$type.' ' ;?>">

	    <a href="<?php the_permalink(); ?>">
		    <img src="<?php echo $feat_img[0]; ?>" alt="<?php echo the_title(); ?>" />
		<div class="text grad-bg">
			<h3><?php the_title(); ?><?php if($keywords) echo '<span class="keywords">'.$keywords.'</span>'; ?></h3>		  	
		</div>
	    </a>
	    
</div><!-- item -->

<?php if($featured == 0) {
	$small_count++;
} if($small_count == 4 || $small_count == 12 || $small_count == 20 || $small_count == 28) {
	echo '<div class="grid-item grid-item--block ';if($disciplines) foreach($disciplines as $discipline) echo strtolower($discipline).' '; echo '"></div>';
	$small_count++;
} ?>
<?php } ?>
   
<?php endwhile; ?>                	     
</div><!-- END grid-work -->
<div id="empty"><h2>No projects match your search.</h2>
<p>Please try to <a href="javascript:reset(true);">remove filters</a>.</p></div>

<?php endif; ?>

<?php get_footer(); ?>