<?php

function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Imagens do Portfólio', // $title
		'show_your_fields_meta_box', // $callback
		'post_portfolio', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );

function show_your_fields_meta_box() {
	global $post;
		$meta = get_post_meta( $post->ID, 'post_portfolio', true);
	?>
	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
	<table id="dynamic_field">
		<?php if($meta): ?>
			<?php $count = 0; ?>
			<?php foreach ($meta as $image):?>
				<tr id="row-image-upload<?=$count?>">	
					<td>			
						<input type="text" name="post_portfolio[image<?=$count?>]" id="post_portfolio[image<?=$count?>]" class="meta-image regular-text" value="<?php echo isset($image) ? $image : ''; ?>">
						<input type="button" class="button-primary image-upload<?=$count?>" value="Add image">
						<input type="button" class="button btn_remove" name="remove" id="image-upload<?=$count?>" value="Remover"></input>
					</td>
				</tr>
			<?php $count ++; ?>
			<?php endforeach ?>
		<?php endif; ?>
	</table>	

	<a href="#" id="addimagenew">Adicionar novo</a>
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