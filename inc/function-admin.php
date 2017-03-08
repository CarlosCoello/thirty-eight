<?php

/*
ADMIN PAGE
______________________________
*/

function thirty_eight_add_admin_page(){

  //Generate Admin Page
  add_menu_page( 'thirty eight Options', 'thirty', 'manage_options', 'thirty_eight', 'thirty_eight_website_menu_page', 'dashicons-analytics', 101);

  //Generat Admin Subpages
  add_submenu_page( 'thirty_eight', 'Sidebar Options', 'Sidebar', 'manage_options', 'thirty_eight', 'thirty_eight_website_menu_page' );
  add_submenu_page( 'thirty_eight', 'Theme Options', 'Theme Options', 'manage_options', 'thirty_eight_theme', 'thirty_eight_theme_sub_page' );
  add_submenu_page( 'thirty_eight', 'Contact Form', 'Contact Form', 'manage_options', 'thirty_eight_contact', 'thirty_eight_contact_sub_page' );

  //Activate Custom script_concat_settings
  add_action( 'admin_init', 'thirty_eight_custom_Settings' );
}

add_action( 'admin_menu', 'thirty_eight_add_admin_page' );

function thirty_eight_custom_Settings(){

  //Sidebar Options Regiter Setting
  register_setting( 'thirty-eight-settings-group', 'profile_picture' );
  register_setting( 'thirty-eight-settings-group', 'first_name' );
  register_setting( 'thirty-eight-settings-group', 'last_name' );
  register_setting( 'thirty-eight-settings-group', 'user_description' );
  register_setting( 'thirty-eight-settings-group', 'twitter_handler', 'thirty_eight_sanitize_twitter_handler' );
  register_setting( 'thirty-eight-settings-group', 'facebook_handler' );

  //Sidebar Options Section and Field
  add_settings_section( 'thirty-eight-sidebar-option', 'Sidebar Options', 'thirty_eight_sidebar_options', 'thirty_eight' );
  add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'thirty_eight_profile_picture', 'thirty_eight', 'thirty-eight-sidebar-option' );
  add_settings_field( 'sidebar-name', 'Full Name', 'thirty_sidebar_name', 'thirty_eight', 'thirty-eight-sidebar-option' );
  add_settings_field( 'sidebar-description', 'Description', 'thirty_eight_sidebar_description', 'thirty_eight', 'thirty-eight-sidebar-option' );
  add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'thirty_eight_sidebar_twitter', 'thirty_eight', 'thirty-eight-sidebar-option' );
  add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'thirty_eight_sidebar_facebook', 'thirty_eight', 'thirty-eight-sidebar-option' );

  //Theme Support Options Register Settings
  register_setting( 'thirty-eight-theme-support', 'post_formats' );
  register_setting( 'thirty-eight-theme-support', 'custom_logo' );
  register_setting( 'thirty-eight-theme-support', 'custom_header' );
  register_setting( 'thirty-eight-theme-support', 'custom_background' );

  //Theme Support Options Section and Field
  add_settings_section( 'thirty-eight-theme', 'Theme Support Options', 'thirty_eight_theme_support_options', 'thirty_eight_theme' );
  add_settings_field( 'post-formats', 'Post Formats', 'thirty_eight_post_formats', 'thirty_eight_theme', 'thirty-eight-theme' );
  add_settings_field( 'custom-logo', 'Custom Logo', 'thirty_eight_custom_logo', 'thirty_eight_theme', 'thirty-eight-theme' );
  add_settings_field( 'custom-header', 'Custom Header', 'thirty_eight_custom_header', 'thirty_eight_theme', 'thirty-eight-theme' );
  add_settings_field( 'custom-background', 'Custom Background', 'thirty_eight_cutom_background', 'thirty_eight_theme', 'thirty-eight-theme' );

  //Contact Form Register Settings
  register_setting( 'thirty-eight-contact-options', 'activate_contact' );

  //Contact Form Section and Field
  add_settings_section( 'thirty-eight-contact-section', 'Contact Form', 'thirty_eight_contact_section', 'thirty_eight_contact' );
  add_settings_field( 'activate-form', 'Activate Contact Form', 'thirty_eight_activate_contact', 'thirty_eight_contact', 'thirty-eight-contact-section' );

}

/* Add Admin Page Functions */

function thirty_eight_website_menu_page(){

  require_once( get_template_directory() . '/inc/templates/thirty-eight-admin.php' );

}

function thirty_eight_theme_sub_page(){

  require_once( get_template_directory() . '/inc/templates/thirty-eight-theme-support.php' );

}

function thirty_eight_contact_sub_page(){

  require_once( get_template_directory() . '/inc/templates/thirty-eight-contact-form.php' );

}

/* Custom Settings Functions */

function thirty_eight_sidebar_options(){

  echo 'Customize your sidebar!';

}

function thirty_eight_profile_picture(){

  $picture = esc_attr( get_option( 'profile_picture' ) );

  if( empty( $picture ) ){
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="" />';
  } else {
    echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
  }

}

function thirty_sidebar_name(){

  $firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/>';

}

function thirty_eight_sidebar_description(){

  $description = esc_attr( get_option( 'user_description' ) );
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /> <p class="description">Type a brief description of yourself</p>';

}

function thirty_eight_sidebar_twitter(){

  $twitter = esc_attr( get_option( 'twitter_handler' ) );
  echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter Handler" /> <p class="description">Type your Twitter Handler without the @ character</p>';

}

function thirty_eight_sidebar_facebook(){

  $facebook = esc_attr( get_option( 'facebook_handler' ) );
  echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook Handler" />';

}

function thirty_eight_theme_support_options(){

  echo 'Activate and Deactivate specific Theme Support Options';

}

function thirty_eight_post_formats(){

  $options = get_option( 'post_formats' );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
  $output = '';
  foreach ( $formats as $format ) {
    $checked = ( @$options[ $format ] == 1 ? 'checked' : '' );
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' />'.$format.'</label><br>';
  }

  echo $output;

}

function thirty_eight_custom_logo(){

  $options = get_option( 'custom_logo' );
  $checked =( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_logo" name="custom_logo" value="1" '.$checked.'/> Activate the custom logo</label>';

}

function thirty_eight_custom_header(){

  $options = get_option( 'custom_header' );
  $checked =( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'/> Activate the custom header</label>';

}

function thirty_eight_cutom_background(){

  $options = get_option( 'custom_background' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'/> Activate the custom background</label>';

}

/* Sanitize Settings */

function thirty_eight_sanitize_twitter_handler( $input ){

  $output = sanitize_text_field( $input );
  $output = str_replace( '@', '', $output );
  return $output;

}

function thirty_eight_contact_section(){

  echo '<p>By clicking the input field and saving the the page you will activate a contact form custom post type</p>';

}

function thirty_eight_activate_contact(){

  $options = get_option( 'activate_contact' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.'/>';

}
