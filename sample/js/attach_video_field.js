!function($) {
   var custom_uploader;
    $('#vc_ui-panel-edit-element .attach-video-button').click(function(e) {
      var  file_picker_button = $( this ),
      file_remover_button = $( this ).parent().find( '.remove-video-button' ),
      input = $( this ).parent().find( '.attach_video_field' ),
      display = $( this ).parent().find( '.attach_video_display' );
      e.preventDefault();
      //If the uploader object has already been created, reopen the dialog
      if (custom_uploader) {
        custom_uploader.open();
        return;
      }
      //Extend the wp.media object
      custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Select Video',
        button: {
            text: 'Select Video'
        },
        multiple: false,
        library: {
          type: [ 'video' ]
        },
      });
      //When a file is selected, grab the URL and set it as the text field's value
      custom_uploader.on('select', function() {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        display.html( attachment.url );
        input.val( attachment.url );
        file_picker_button.addClass( 'hidden' );
        file_remover_button.removeClass( 'hidden' );
      });

      //Open the uploader dialog
      custom_uploader.open();
    });
  $( '#vc_ui-panel-edit-element .remove-video-button' ).click( function( e ) {
    var file_picker_button = $( this ).parent().find( '.attach-video-button' ),
      file_remover_button = $( this ),
      input = $( this ).parent().find( '.attach_video_field' ),
      display = $( this ).parent().find( '.attach_video_display' );
    display.html( '' );
    input.val( '' );
    file_picker_button.removeClass( 'hidden' );
    file_remover_button.addClass( 'hidden' );
  });
}(window.jQuery);