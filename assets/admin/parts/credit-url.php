<?php

/*-----------------------------------------------
    Set up the Photo Credit URL Input Box.
-------------------------------------------------
    *This inserts a custom input box for 
    the option to add a Photo Credit URL on posts
------------------------------------------------*/
function photo_credit_url_add_custom_box() {

    $screens = array( 'post', 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'photo_credit_url_sectionid',
            __( 'Photo Credit URL', 'photo_credit_url_textdomain' ),
            'photo_credit_url_inner_custom_box',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'photo_credit_url_add_custom_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function photo_credit_url_inner_custom_box( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'photo_credit_url_inner_custom_box', 'photo_credit_url_inner_custom_box_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $value = get_post_meta( $post->ID, '_photo_credit_url_meta_value_key', true );

  echo '<label for="photo_credit_url_new_field">';
       _e( "If applicable", 'photo_credit_url_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="photo_credit_url_new_field" name="photo_credit_url_new_field" value="' . esc_attr( $value ) . '" size="25" />';

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function photo_credit_url_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['photo_credit_url_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['photo_credit_url_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'photo_credit_url_inner_custom_box' ) )
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
  $mydata = sanitize_text_field( $_POST['photo_credit_url_new_field'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, '_photo_credit_url_meta_value_key', $mydata );
}
add_action( 'save_post', 'photo_credit_url_save_postdata' );

/**

**/