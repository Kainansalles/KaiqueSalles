<?php

// Incluindo nosso arquivo customizer
require get_template_directory() . '/inc/customizer.php';

remove_action('wp_head','wp_generator');

function carrega_scripts(){
	// Enfileirando Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '3.3.7', 'all');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.js", array('jquery'), null, true);
	// Enfileirando estilos e scripts próprios
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), '1.0', 'all');
	wp_enqueue_style( 'jquery.fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', array(), '1.0', 'all');	
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
	wp_enqueue_script( 'jquery.fancybox', get_template_directory_uri(). '/assets/js/jquery.fancybox.js',array(), null, true);

}
add_action( 'wp_enqueue_scripts', 'carrega_scripts' );

function carregar_script_admin(){
	wp_enqueue_script( 'template', get_template_directory_uri(). '/assets/js/template.js',array(), null, true);
	wp_enqueue_script( 'jquery.sumoselect.min', get_template_directory_uri(). '/assets/js/jquery.sumoselect.min.js',array());
	wp_enqueue_script( 'media-uploads', get_template_directory_uri(). '/assets/js/media-uploads.js',array());
}
add_action('admin_enqueue_scripts', 'carregar_script_admin');

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
//add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_post_type_support( 'page', 'post-formats' );


// Register Custom Post Type Serviços
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

function post_portfolio() {

	$labels = array(
		'name'                  => _x( 'Portifólio', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portifólio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portifólio', 'text_domain' ),
		'name_admin_bar'        => __( 'Portifólio', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os Portifólios', 'text_domain' ),
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
		'label'                 => __( 'Portifólio', 'text_domain' ),
		'description'           => __( 'Portifólio do tema', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'portfolios', ' post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'menu_icon'   => 'dashicons-universal-access',
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'post_portfolio', $args );

}
add_action( 'init', 'post_portfolio', 0 );

function register_category_portfolio() {
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
				'rewrite' => array('slug' => 'porfolio')
		);

		register_taxonomy('ks_potfolio', array('post_portfolio'), $args);
}

add_action('init', 'register_category_portfolio');



function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Campos necessários do tema', // $title
		'show_your_fields_meta_box', // $callback
		'post_portfolio', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );

function show_your_fields_meta_box() {
	global $post;
		$meta = get_post_meta( $post->ID, 'post_portfolio', true );
	?>

	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <!-- All fields will go here -->
	<!-- <p>
		<label for="post_portfolio[textarea]"></label>
		<br>
		<textarea name="post_portfolio[textarea]" id="post_portfolio[textarea]" rows="5" cols="30" style="width:500px;"><?php //echo $meta['textarea']; ?></textarea>
	</p> -->
	<!-- <p>
		<label for="post_portfolio[image]">Image Upload</label><br>
		<input type="text" name="post_portfolio[image]" id="post_portfolio[image]" class="meta-image regular-text" value="<?php //echo $meta['image']; ?>">
		<input type="button" class="button image-upload" value="Browse">
	</p> -->

	<div>
			<label for="swift_informa_arquivos" class="text_title"><?php _e('Imagens do Portifólio', 'textdomain'); ?></label>
			<?php
			$downloads = get_post_meta($post->ID, 'post_portfolio', true);

			$current = get_current_link($downloads);
			$next = get_next_link($downloads);
			?>
			<div class="div-pai-swiftinforma">
					<input class="descricao_arquivo" type="text" maxlength="32" name="post_portfolio[title][<?php echo $current->key ?>]" value="<?php echo $current->title ?>" placeholder="Descrição" style="width: 20%;"/>
					<input readonly="true" name="post_portfolio[url][<?php echo $current->key ?>]" type="text"  value="<?php echo $current->url ?>" class="input-clone link input-preview-<?=$current->key?>">
					<button type="button" class="button button-primary button-large btn-service-media-swiftinforma" data-arquivo="<?=$current->key?>"><?php _e('Selecionar', 'textdomain'); ?></button>
					<a style="display:none" class="button btn-download-more"><span class="dashicons dashicons-plus"></span></a>
			</div>


			<div id="download-clones-swiftinforma">
					<?php
					if (count($next)):
							foreach ($next['title'] as $key => $value):
									?>
									<div class="div-pai-swiftinforma">
											<input class="descricao_arquivo" type="text" maxlength="32" name="post_portfolio[title][<?php echo $key ?>]" value="<?php echo $next['title'][$key] ?>" placeholder="Descrição" style="width: 20%;"/>
											<input readonly="true" name="post_portfolio[url][<?php echo $key ?>]" type="text"  value="<?php echo $next['url'][$key] ?>" class="input-clone link input-preview-<?= $key ?>">
<!--                                        <button type="button" class="button button-primary button-large btn-service-media"><?php _e('Selecionar', 'textdomain'); ?></button>-->
											<a  class="button btn-download-less-swiftinforma"><span class="dashicons dashicons-minus"></span></a>
									</div>
									 <div class="image-preview"><img src="<?php echo $next['url'][$key]; ?>" style="max-width: 250px;"></div>
									<?php
							endforeach;
					endif;
					?>
			</div>
	</div>
	<?php
}

function save_your_fields_meta( $post_id ) {
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
		return $post_id;
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'post_portfolio' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}

	$old = get_post_meta( $post_id, 'post_portfolio', true );
	$new = $_POST['post_portfolio'];

	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'post_portfolio', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'post_portfolio', $old );
	}
}
add_action( 'save_post', 'save_your_fields_meta' );



function get_current_link($dataArray) {
		if (is_array($dataArray)) {
				$current_title = array_slice($dataArray['title'], 0, 1, true);
				$current_url = array_slice($dataArray['url'], 0, 1, true);
				$key = key($current_title);
				$title = $current_title[$key];
				$url = $current_url[$key];
		} else {
				$key = 0;
				$title = null;
				$url = null;
		}

		return (object) array(
								'key' => $key,
								'title' => $title,
								'url' => $url
		);
}

function get_next_link($dataArray) {
		if (is_array($dataArray)) {
				$slice = array();
				foreach ($dataArray as $key => $sub_array)
						$slice[$key] = array_slice($sub_array, 1, null, true);
				return $slice;
		}
		return array();
}


function save_uploaded_archive_swift($post_id, $filename) {
		// Locate the file in a subdirectory of the root of the installation
		$file = trailingslashit(ABSPATH) . 'my-files/' . $filename;
		// If the file doesn't exist, then write to the error log and duck out
		if (!file_exists($file) || 0 === strlen(trim($filename))) {
				error_log('The file you are attempting to upload, ' . $file . ', does not exist.');
				return;
		}
		/* Read the contents of the upload directory. We need the
		 * path to copy the file and the URL for uploading the file.
		 */
		$uploads = wp_upload_dir();
		$uploads_dir = $uploads['path'];
		$uploads_url = $uploads['url'];
		// Copy the file from the root directory to the uploads directory
		copy($file, trailingslashit($uploads_dir) . $filename);
		/* Get the URL to the file and grab the file and load
		 * it into WordPress (and the Media Library)
		 */
		$url = trailingslashit($uploads_url) . $filename;
		$result = media_sideload_image($url, $post_id, $filename);
		// If there's an error, then we'll write it to the error log.
		if (is_wp_error($$result)) {
				error_log(print_r($result, true));
		}
}

?>
