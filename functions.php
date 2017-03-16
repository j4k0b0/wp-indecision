<?php
require_once('inc/acf-fields.php');

//LOAD ASSETS
function load_scripts() {

	// Load styles
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'loading-bar-css', get_template_directory_uri() . '/assets/css/loading-bar.css' );

	// Load Javascripts
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-1.11.1.min.js', array(), '1.11.1', true );

	if(is_page_template( 'templates/template-indecision-angular.php' )):
		//Angular Dependencies
		wp_enqueue_script( 'angular', get_template_directory_uri() .'/assets/js/angular.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'angular-cookies', get_template_directory_uri() .'/assets/js/angular-cookies.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'angular-loading-bar', get_template_directory_uri() .'/assets/js/angular-loading-bar.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'angular-ui-router', get_template_directory_uri() .'/assets/js/angular-ui-router.min.js', array('jquery'), '', true );

		//Angular App
		wp_enqueue_script( 'indecisions-main', get_template_directory_uri() .'/assets/app/main.js', array('jquery'), '', true );
		wp_enqueue_script( 'indecisions-ctrl', get_template_directory_uri() .'/assets/app/controllers/mainCtrl.js', array('jquery'), '', true );
	else:
		wp_enqueue_script( 'theme-js',  get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '1.0', true );
	endif;


}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

//MENUS
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Navigation' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
?>