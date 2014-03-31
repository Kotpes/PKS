<?php

if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

add_filter('show_admin_bar', '__return_false');

// Load the Theme CSS
function theme_styles() {

	wp_enqueue_style( 'social', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );	
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

// Load the Theme JS
function theme_js() {		

	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.0.3.min.js', array('jquery'), '', true );


	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap');

	wp_register_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bxslider');

	wp_enqueue_script( 'article_onload', get_template_directory_uri() . '/js/article_onload.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );	


}
add_action( 'wp_enqueue_scripts', 'theme_js' );


// Enable custom menus


add_theme_support( 'post-thumbnails' ); 


function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Enable custom fields to categories



?>