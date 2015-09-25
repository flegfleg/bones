<?php 

/*
 * Fleg´s Wordpress Helper functions 150925 
 * 
 * GETTING
 * 
 * get_featured_img
 * get_current_page_depth
 * get_parent_id
 *
 * RENDERING
 *
 * render_subnav
 * render_parent_title
 *
 */ 





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
<<<<<<< HEAD
    $pic = wp_get_attachment_image_src( get_post_thumbnail_id( $frontpage_id ), 'full'); // home page pic as fallback
=======
    $pic = wp_get_attachment_image_src( get_post_thumbnail_id( $frontpage_id ), $size); // home page pic as fallback
  }
  return 'style="background-image: url('.$pic[0].'); background-size: cover"';
}


/**
 * Get current page depth
 *
 * @return integer
 */
function get_current_page_depth(){
  global $wp_query;
  
  $object = $wp_query->get_queried_object();
  $parent_id  = $object->post_parent;
  $depth = 0;
  while($parent_id > 0){
    $page = get_page($parent_id);
    $parent_id = $page->post_parent;
    $depth++;
  }
 
  return $depth;
}

/**
 * Return the parent id or current page id if no parent  
 *
 * @return int
 */
function get_parent_id ( ) {

  $current = get_the_ID();
  $ancestors = get_post_ancestors( $current );

  if ( $ancestors ) { // there are parent pages 
    $id = $ancestors[0];
  } else { // no parent pages 
    $id = $current;
>>>>>>> 8876b36... added / formatted standard helpers
  }
  return $pic[0];
}
<<<<<<< HEAD
=======
/**
 * Sub Page navigation  
 *
 * @return html
 */

function render_subnav( ) {

  $id = get_parent_id();
  $items = wp_list_pages( "post_type=page&title_li=&echo=0&child_of=".$id );

  return '<ul class="sub-nav nav">' . $items . '</ul>';
}
/**
 * Returns the parent page title (or current, if no parent page)  
 *
 * @return html
 */

function render_parent_title( ) {

  $id = get_parent_id();
  return get_the_title($id);

}

>>>>>>> 8876b36... added / formatted standard helpers

?>