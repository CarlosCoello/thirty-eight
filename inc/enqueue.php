<?php

/*
ENQUEUE STYLESHEETS AND SCRIPTS FOR BACKEND ADMIN
___________________________________________________
*/

function thirty_eight_admin_enqueue_style_scripts( $hook ){

   if( 'toplevel_page_thirty_eight' == $hook ){
  wp_enqueue_style( 'thirty-eight-admin', get_template_directory_uri() . '/css/thirty.eight.admin.css', array(), '1.0', 'all' );

  wp_enqueue_media();
  wp_enqueue_script( 'thirty-eight-admin-js', get_template_directory_uri() . '/js/thirty.eight.admin.js', array('jquery'), '1.0', true );
}

}

add_action( 'admin_enqueue_scripts', 'thirty_eight_admin_enqueue_style_scripts' );

/*
ENQUEUE STYLESHEETS AND SCRIPTS FOR FRONTEND
________________________________________________
*/

function thirty_eight_enqueue_style_scripts(){

wp_enqueue_style( 'dashicons' );
wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array(), '3.5.1', 'all' );
wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all' );

wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.12.4', true);
wp_enqueue_script( 'jquery' );

wp_deregister_script( 'jquery-migrate' );
wp_register_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js', array( 'jquery' ), '1.4.1', true);
wp_enqueue_script( 'jquery-migrate' );

wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true);
wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );

}

add_action( 'wp_enqueue_scripts', 'thirty_eight_enqueue_style_scripts' );
