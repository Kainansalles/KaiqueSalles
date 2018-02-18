jQuery(document).ready(function(){
        var meta_image_frame;
      // Runs when the image button is clicked.
      var qnt = jQuery( "#dynamic_field tr" ).length;

      for(i=0; i <= qnt; i++){
        $('.image-upload'+i+'').click(function (e) {     
          // Get preview pane
          var meta_image_preview = $(this).parent().parent().children('.image-preview');
          // Prevents the default action from occuring.
          e.preventDefault();
          var meta_image = $(this).parent().children('.meta-image');
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
    }

      jQuery('a#addimagenew').click(function(e){
        e.preventDefault();
        var qnt = jQuery( "#dynamic_field tr" ).length;

        jQuery('#dynamic_field').append('<tr id="row'+qnt+'"><td><input type="text" name="post_portfolio[image'+qnt+']" id="post_portfolio[image'+qnt+']" value="" class="meta-image regular-text"/><input type="button" class="button-primary image-upload'+qnt+'" value="Add image"><input type="button" class="button btn_remove" name="remover" id="image-upload'+qnt+'" value="Remover"></input></td></tr>').off('click').click(function(){

               var meta_image_frame;
                  // Get preview pane
                  var meta_image_preview = jQuery('.image-upload'+qnt+'');

                  // Prevents the default action from occuring.
                  //e.preventDefault();
                  var meta_image = jQuery('.image-upload'+qnt+'').parent().children('.meta-image');
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

        jQuery('.btn_remove').click(function(){  
             var button_id = jQuery(this).attr("id");
             console.log(button_id);
            jQuery('#row-'+button_id+'').remove();  
        });  
    });