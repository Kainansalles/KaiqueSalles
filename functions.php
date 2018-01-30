<?php

function carrega_scripts(){
	// Enfileirando Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '3.3.7', 'all');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.js", array('jquery'), null, true);
	// Enfileirando estilos e scripts próprios
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), '1.0', 'all');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.css', array(), '1.0', 'all');

	//wp_enqueue_script( 'modernizr.custom', get_template_directory_uri(). '/assets/js/modernizr.custom.js', array(), null, true);
	wp_enqueue_script( 'jquery.1.11.1', get_template_directory_uri(). '/assets/js/jquery.1.11.1.js', array(), null, true);
	wp_enqueue_script( 'SmoothScroll', get_template_directory_uri(). '/assets/js/SmoothScroll.js', array(), null, true);
	wp_enqueue_script( 'jquery.prettyPhoto', get_template_directory_uri(). '/assets/js/jquery.prettyPhoto.js',array(), null, true);
	wp_enqueue_script( 'jquery.isotope', get_template_directory_uri(). '/assets/js/jquery.isotope.js',array(), null, true);
	wp_enqueue_script( 'jquery.parallax', get_template_directory_uri(). '/assets/js/jquery.parallax.js',array(), null, true);
	wp_enqueue_script( 'jqBootstrapValidation', get_template_directory_uri(). '/assets/js/jqBootstrapValidation.js',array(), null, true);
	wp_enqueue_script( 'contact_me', get_template_directory_uri(). '/assets/js/contact_me.js',array(), null, true);
	wp_enqueue_script( 'main', get_template_directory_uri(). '/assets/js/main.js',array(), null, true);

}
add_action( 'wp_enqueue_scripts', 'carrega_scripts' );

// Função para registro de nossos menus
register_nav_menus(
	array(
		'meu_menu_principal' => 'Menu Principal'
	)
);

function wpsites_child_theme_posts_formats(){
		add_theme_support( 'post-thumbnails', array( 'page' ) );
}
add_action( 'after_setup_theme', 'wpsites_child_theme_posts_formats', 11 );
?>
