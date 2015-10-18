<?php
/**
 * Set up admin columns for custom post meta
 *
 * via: http://justintadlock.com/archives/2011/06/27/custom-columns-for-custom-post-types
 *
 * @category flegfleg-fleg2015
 */


add_filter( 'manage_edit-works_columns', 'my_edit_works_columns' ) ;

function my_edit_works_columns( $columns ) {

  $columns = array(
    'cb' => '<input type="checkbox" />', //wp standard
    'image' => __( 'Image' ),
    'title' => __( 'Work title' ),
    'year' => __( 'Year' ),
    'description' => __( 'Description' ),
    'categories' => __( 'Categories' ), //wp standard
    'tags' => __( 'Tags' ), //wp standard
    'date' => __( 'Date' ) //wp standard
  );

  return $columns;
}


add_action( 'manage_works_posts_custom_column', 'my_manage_works_columns', 10, 2 );

function my_manage_works_columns( $column, $post_id ) {
  global $post;

  switch( $column ) {

    /* If displaying the 'year' column. */
    case 'year' :

      /* Get the post meta. */
      $year = get_post_meta( $post_id, 'meta_works_year', true );

      /* If no year is found, output a default message. */
      if ( empty( $year ) )
        echo __( 'Unknown' );

      else
        echo $year;

      break;    

    /* If displaying the 'description' column. */
    case 'description' :

      /* Get the post meta. */
      $description = get_post_meta( $post_id, 'meta_works_description', true );

      /* If no description is found, output a default message. */
      if ( empty( $description ) )
        echo __( 'Unknown' );

      else
        echo $description;

      break;    

    /* If displaying the 'image' column. */
    case 'image' :

      /* Get the post meta. */
      $image = the_post_thumbnail();

      echo $image;

      break;


    /* Just break out of the switch statement for everything else. */
    default :
      break;
  }
}


// ADD Sorting 

add_filter( 'manage_edit-works_sortable_columns', 'my_works_sortable_columns' );

function my_works_sortable_columns( $columns ) {

  $columns['year'] = 'year';

  return $columns;
}


/* Only run our customization on the 'edit.php' page in the admin. */
add_action( 'load-edit.php', 'my_edit_works_load' );

function my_edit_works_load() {
  add_filter( 'request', 'my_sort_works' );
}

/* Sorts the workss. */
function my_sort_works( $vars ) {

  /* Check if we're viewing the 'movie' post type. */
  if ( isset( $vars['post_type'] ) && 'works' == $vars['post_type'] ) {

    /* Check if 'orderby' is set to 'year'. */
    if ( isset( $vars['orderby'] ) && 'year' == $vars['orderby'] ) {

      /* Merge the query vars with our custom variables. */
      $vars = array_merge(
        $vars,
        array(
          'meta_key' => 'meta_works_year',
          'orderby' => 'meta_value_num'
        )
      );
    }
  }

  return $vars;
}




?>