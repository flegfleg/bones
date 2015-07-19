<?php 

// Some Wordpress helper functions



/*
 * Get the featured image of the current page.
 * If no image is defined, use the fallback (front page image)
 *
 *@return path to image
 */ 
function get_featured_img() {
  // get current page id
  $page_id = get_queried_object_id();
  $frontpage_id = get_option('page_on_front');

  if (has_post_thumbnail( $page_id ) ) {
    // get thumbnail
    $pic = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ),  'full');
  } else {
    $pic = wp_get_attachment_image_src( get_post_thumbnail_id( $frontpage_id ), 'full'); // home page pic as fallback
  }
  return $pic[0];
}

?>