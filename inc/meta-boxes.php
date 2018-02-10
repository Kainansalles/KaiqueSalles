<?php

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