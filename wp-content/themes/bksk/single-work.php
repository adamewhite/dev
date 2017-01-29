<?php
  get_header(); while (have_posts()) : the_post();
  /* Variables */
  $occupancy = get_field('occupancy_date');
  $location = get_field('location');
  $client = get_field('client');
  $quote = get_field('quote');
  $quote_source = get_field('quote_source');
?>

<?php include_once(TEMPLATEPATH . '/includes/work-carousel.php'); ?>

<header class="page__header">
  <h2><?php the_title(); ?></h2>
</header>

  <div class="single-work">

    <div class="fourcol">
      <div class="work-box">
        <h4>Project Type</h4>
        <?php
          $type = wp_get_post_terms($post->ID, 'project_type', array("fields" => "all"));
          for ($i = 0; $i < count($type); $i++){
            if ($type[$i]->name != 'Featured') {
              echo '<a href="' . home_url("/work/#." . $type[$i]->slug) . '">';
              echo $type[$i]->name;
              echo '</a>';
              if ($i != count($type) - 1) {
                echo '<br>';
              }
            }
          }
        ?>
      </div>

      <?php
      if ($occupancy){
        echo '<div class="work-box"><h4>Occupancy</h4>' . $occupancy . '</div>';
      }
      if ($location){
        echo '<div class="work-box"><h4>Location</h4>' . $location . '</div>';
      }

      if ($client){
        echo '<div class="work-box"><h4>Client</h4>' . $client . '</div>';
      }

      if ($quote){
        echo '<div class="quote"><p>"' . $quote . '"</p>';
        if ($quote_source){
          echo '<p class="quote-source">' . $quote_source . '</p>';
        }
        echo '</div>';
      }
      ?>
    </div>

    <div class="twocol">
      <?php the_field('description'); ?>
    </div>


	<div class="fourcol">
		<?php 
			$types = get_the_terms($post->ID, 'project_type');
			if($types) {
				$tag_ids = array();
				foreach($types as $type) $tag_ids[] = $type->term_id;
				$args = array(
		            'post_type' =>'work',
		            'post_status'=>'publish', 
		            'orderby' => 'rand',
		            'posts_per_page' => 4,
		            'post__not_in' => array($post->ID),
		            'tax_query' => array(
						array( 
						'taxonomy' => 'project_type',
						'field' => 'term_id',
						'terms' => $tag_ids,
						)
		            ),
		            'meta_query' => array(
					array(
						'key' => 'discipline',
						'compare' => 'LIKE',
						'value' => 'Architecture'
					)
		            ),
		            
				); 
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
				echo '<div class="work-box"><h4>Related<br /> Architecture Projects</h4>';
				while ( $query->have_posts() ) :
				$query->the_post();
				echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
				endwhile; 
				echo '</div>';
				endif; wp_reset_query();
			} 
			$interior_types = get_the_terms($post->ID, 'interior_project_type');
			if($interior_types) {
				$interior_ids = array();
				foreach($interior_types as $type) $interior_ids[] = $type->term_id;
				$args = array(
		            'post_type' =>'work',
		            'post_status'=>'publish', 
		            'orderby' => 'rand',
		            'posts_per_page' => 4,
		            'post__not_in' => array($post->ID),
		            'tax_query' => array(
						array( 
						'taxonomy' => 'interior_project_type',
						'field' => 'term_id',
						'terms' => $interior_ids,
						)
		            ),
		            'meta_query' => array(
					array(
						'key' => 'discipline',
						'compare' => 'LIKE',
						'value' => 'Interiors'
					)
		            ),
		            
				); 
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
				echo '<div class="work-box"><h4>Related<br /> Interior Projects</h4>';
				while ( $query->have_posts() ) :
				$query->the_post();
				echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
				endwhile; 
				echo '</div>';
				endif; wp_reset_query();
			} ?>
	</div>
<!--
  <div class="fourcol">
    <?php if (have_rows('related_posts')): ?>
      <div class="sort work-sort">
        <h4>Related Work</h4>
        <?php while (have_rows('related_posts')): the_row(); ?>
          <?php $p = get_sub_field('post'); ?>
          <a href="<?php echo get_permalink( $p->ID ); ?>">
            <?php echo get_the_title( $p->ID ); ?>
          </a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php if (have_rows('impact_posts')): ?>
      <div class="sort work-sort">
        <h4>Impact</h4>
        <?php while (have_rows('impact_posts')): the_row(); ?>
          <?php $p = get_sub_field('post'); ?>
          <a href="<?php echo get_permalink( $p->ID ); ?>">
            <?php the_sub_field('link_text'); ?>
          </a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
-->


</div><!-- Single Work -->



<?php endwhile; get_footer(); ?>
