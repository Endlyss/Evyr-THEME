<?php

/*-----------------------------------------------
    Set up the Custom Preview Input Box.
-------------------------------------------------
    *This inserts a custom input box for 
    the option to add a Custom Preview on posts
------------------------------------------------*/
function custom_preview_add_custom_box() {

    $screens = array( 'post', 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'custom_preview_sectionid',
            __( 'Custom Preview', 'custom_preview_textdomain' ),
            'custom_preview_inner_custom_box',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'custom_preview_add_custom_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function custom_preview_inner_custom_box( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'custom_preview_inner_custom_box', 'custom_preview_inner_custom_box_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $value = get_post_meta( $post->ID, '_custom_preview_meta_value_key', true );

  echo '<label for="custom_preview_new_field">';
       _e( "If applicable", 'custom_preview_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="custom_preview_new_field" name="custom_preview_new_field" value="' . esc_attr( $value ) . '" size="25" />';

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function custom_preview_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['custom_preview_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['custom_preview_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'custom_preview_inner_custom_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  $mydata = sanitize_text_field( $_POST['custom_preview_new_field'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, '_custom_preview_meta_value_key', $mydata );
}
add_action( 'save_post', 'custom_preview_save_postdata' );

/**

**/