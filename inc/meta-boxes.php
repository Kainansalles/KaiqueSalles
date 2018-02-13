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
		//print_r($meta);die;
	?>
	<script type="">
		jQuery(document).ready(function(){
			var i = 0;
			<?php $count = 0; ?>
			jQuery('a#addimagenew').click(function(e){
				i++;
				e.preventDefault();
				//alert('to aqui');
				jQuery('#dynamic_field').append('<tr><td><input type="text" name="post_portfolio[image'+i+']" class="meta-image regular-text"/><input type="button" class="button image-upload" value="Add image"></td></tr>').off('click').click(function(){
					     <?php $count ++;?>
					     var meta_image_frame;
					        // Get preview pane
					        var meta_image_preview = jQuery(this).parent().parent().children('.image-preview');
					        // Prevents the default action from occuring.
					        e.preventDefault();
					        var meta_image = jQuery(this).parent().children('.meta-image');
					        // If the frame already exists, re-open it.
					        if (meta_image_frame) {
					          meta_image_frame.open();
					          return;
					        }
					        // Sets up the media library frame
					        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
					          title: meta_image.title,
					          button: {
					            text: meta_image.button
					          }
					        });
					        // Runs when an image is selected.
					        meta_image_frame.on('select', function () {
					          // Grabs the attachment selection and creates a JSON representation of the model.
					          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
					          // Sends the attachment URL to our custom image input field.
					          meta_image.val(media_attachment.url);
					          meta_image_preview.children('img').attr('src', media_attachment.url);
					        });
					        // Opens the media library frame.
					        meta_image_frame.open();
					      });
				});
		});

	</script>

	<table id="dynamic_field">
	<?php if($meta[0] =! ""): ?>
		<?php $count = 1; ?>
		<?php foreach ($meta as $image):?>
			<tr>
				<td>
					<input type="text" name="post_portfolio[image<?=$count?>]" id="post_portfolio[image<?=$count?>]" class="meta-image regular-text" value="<?php echo $image; ?>">
					<input type="button" class="button image-upload-obrigatorio" value="Add image">
				</td>
			</tr>
			<?php //echo $image["image1"]; ?>
		<?php $count ++; ?>
		<?php endforeach ?>
	<?php endif; ?>
	</table>

	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

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