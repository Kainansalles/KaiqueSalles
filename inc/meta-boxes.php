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

     $value = get_post_meta($post->ID, 'post_portfolio', true);
     $image_gallery = unserialize($value);
     ?>
<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>"> <style type="text/css">
    
.objectImage {
    
    height: 260px;
    object-fit: cover;
    object-position: center;
}

</style>
     <div class="inf-metabox-fields">
         <div class="list-image-gallery">
             <?php
             if ($image_gallery):
                 foreach ($image_gallery as $item) :
                 $img = wp_get_attachment_image_src($item,'large');
                     ?>
                     <div class="iw-image-item">
                         <div class="action-overlay">
                             <span class="remove-image">x</span>
                         </div>
                         <img class="objectImage" src="<?php echo esc_url($img[0]); ?>"/>
                         <input type="hidden" name="post_portfolio[image_gallery][]" value="<?php echo esc_attr($item); ?>"/>
                     </div>
                     <?php
                 endforeach;
             endif;
             ?>
         </div>
         <div style="clear: both;"></div>
         <div class="button-add-image">
             <span class="button add-new-image"><?php echo __('Add novas imagens', 'kaiquesalles'); ?></span>
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
    //Image gallery
    $image_gallery = isset($new['image_gallery']) ? serialize($new['image_gallery']) : serialize(array());
    $image_gallery_old = isset($old['image_gallery']) ? serialize($old['image_gallery']) : serialize(array());    
    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'post_portfolio', $image_gallery );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'post_portfolio', $image_gallery_old );
    }

}
add_action( 'save_post', 'save_your_fields_meta' );

