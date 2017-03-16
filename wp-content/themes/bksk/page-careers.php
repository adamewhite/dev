<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Careers
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
	
<header class="page__header">	
	<?php echo get_post_field('post_content', 5059); ?>
	<?php if (is_category()) { ?>
	<h2><?php single_cat_title(); ?></h2>
	<?php } elseif( is_tag() ) { ?>
	<h2>(Po)sts tagged &quot;<?php single_tag_title(); ?>&quot;</h2>
	<?php  } elseif (is_day()) { ?>
	<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php  } elseif (is_month()) { ?>
	<h2>Archive for <?php the_time('F, Y'); ?></h2>
	<?php  } elseif (is_year()) { ?>
	<h2>Archive for <?php the_time('Y'); ?></h2>
	<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2>Blog Archives</h2>
	<?php } ?>
</header>
<div id="content">
<?php query_posts(
            array(
            'post_type'=> 'post',
            'posts_per_page' => 15,
            'paged'=>$paged
        )); ?>
<aside id="post">
		<div class="loop-entry">
		<h3>Jr. Interior Designer (3-5 yrs experience)</h3> 
		<p>BKSK Architects is currently looking for a Junior Interior Designer to join our talented team of architects and designers. Our interiors practice does a variety of project types, including private residential, luxury multi-family residential, institutional and corporate interiors. The team works collaboratively with the architecture side, as we believe in a consistency of design language and holistic design sensibility.</p>
		<p>The ideal candidate will have 3-5 years of experience, demonstrable expertise in 3-D modeling, design, and design presentation support. A creative, self-motivated individual could quickly find excellent room for growth within our team.  Our culture is energetic, collaborative and open – we value people who are fun to work with and who have a positive impact on those around them.</p>
	<p><strong>Select responsibilities include:</strong></p>
	<p>Desire to contribute and work on a variety of project types;<br />
Participate in programming and pre-planning design analysis;<br />
Ability to develop and execute design documentation including space planning, design development, construction documents and detailing for interior architecture projects;<br />
Finish and furniture sourcing, recommendations/selection and coordination;<br />
Perform site inspections, reviews shop drawings and material submittals and other related construction administration tasks</p>	
		<p><strong>Qualifications:</strong></p>
		<p>Bachelor’s degree in Interior Design, Interior Architecture, or Architecture
3-5 years of experience;
Strong FF&E experience including: sourcing, purchasing, tracking, and installation;
Knowledge of and ability to detail custom furniture;
Proficiency in Revit, Sketch up, V-Ray, Adobe Creative Suite (other design-related programs are a plus);
Excellent presentation skills</p>
<br />
<br />
		<p>This is a full-time position with benefits. Please submit resume, portfolio and cover letter outlining your suitability for the role to bkskcareers@bksk.com “Junior Interior Designer” in the subject line. Include salary requirements and availability and please do not send attachments exceeding 4 MB. No phone calls, please.</p>
		</div> 
</aside>

<?php wp_reset_query(); endif; ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>