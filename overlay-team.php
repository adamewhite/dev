<?php
/**
 * @package WordPress
 * @subpackage: Theme
 */
?>

<?php
include("wp-load.php");
$id = $_POST['id'];	
    if( have_rows('posts', $id) ):
      echo '<br /><br /><h3>On My Mind</h3>';
      echo '<div class="items">';
     while( have_rows('posts', $id) ): the_row(); 
      $text   = get_sub_field("text");
      $size   = get_sub_field("size");
      $thumb  = get_sub_field("image");
      $thumb = $thumb['sizes']['sq2'];
      if ($thumb || $text) {
        if ($size == "Big"){ $size = 'partner'; } else { $size = ''; }
        echo '<div class="item fourcol ' . $size . '">';
        if ($thumb){ 
          echo '<img src="' . $thumb .'" />';}
        if ($text){
          echo '<p>' . $text . '</p>';
        }
        echo '</div>';
      }
    endwhile;
	echo '</div>';
endif; ?> 