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

// Adicionando suporte ao tema
$defaults = array(
    'default-image' => '',
    'random-default' => false,
    'width' => 0,
    'height' => 0,
    'flex-height' => false,
    'flex-width' => false,
    'default-text-color' => '',
    'header-text' => true,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'video' => false,
    'video-active-callback' => 'is_front_page',
);
add_theme_support( 'custom-header', $defaults );
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('video', 'image'));
add_theme_support( 'customize-selective-refresh-widgets' );
$defaults = array(
    'default-image' => '',
    'default-preset' => 'default',
    'default-position-x' => 'left',
    'default-position-y' => 'top',
    'default-size' => 'auto',
    'default-repeat' => 'repeat',
    'default-attachment' => 'scroll',
    'default-color' => '',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-background', $defaults );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


//colocando thumbnail no post de page
function wpsites_child_theme_posts_formats(){
		add_theme_support( 'post-thumbnails', array( 'page' ) );
}
add_action( 'after_setup_theme', 'wpsites_child_theme_posts_formats', 11 );

// Register Custom Post Type
function post_servicos() {

	$labels = array(
		'name'                  => _x( 'Serviços', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Serviços', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Serviços', 'text_domain' ),
		'name_admin_bar'        => __( 'Serviços', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os serviços', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo', 'text_domain' ),
		'add_new'               => __( 'Adicionar', 'text_domain' ),
		'new_item'              => __( 'Novo', 'text_domain' ),
		'edit_item'             => __( 'Editar', 'text_domain' ),
		'update_item'           => __( 'Atualizar', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Serviços', 'text_domain' ),
		'description'           => __( 'Serviços prestados', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'servicos', ' post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'menu_icon'   => 'dashicons-welcome-learn-more',
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'post_servicos', $args );

}
add_action( 'init', 'post_servicos', 0 );

function register_category_servicos() {
		$labels = array(
				'name' => _x('Categorias', 'Categorias', "text_domain"),
				'singular_name' => _x('Categoria', 'Categoria', "text_domain"),
				'search_items' => __('Pesquisar Categoria', "text_domain"),
				'all_items' => __('Todas as Categorias', "text_domain"),
				'parent_item' => __('Parent Categoria', "text_domain"),
				'parent_item_colon' => __('Parent Categoria:', "text_domain"),
				'edit_item' => __('Editar Categoria', "text_domain"),
				'update_item' => __('Atualizar Categoria', "text_domain"),
				'add_new_item' => __('Adicionar novo Categoria', "text_domain"),
				'new_item_name' => __('Novo Categoria', "text_domain"),
				'menu_name' => __('Categorias', "text_domain")
		);

		$args = array(
				'hierarchical' => true, // true =  Category
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => false,
				'query_var' => true,
				'rewrite' => array('slug' => 'servicos')
		);

		register_taxonomy('ks_servicos', array('post_servicos'), $args);
}

add_action('init', 'register_category_servicos');

?>
