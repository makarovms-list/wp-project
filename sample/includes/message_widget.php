<?php
if(!class_exists('PetrosoftMessageWidget')) {

  class PetrosoftMessageWidget extends WP_Widget {

    /**
    * Sets up the widgets name etc
    */
    public function __construct() {
      $widget_ops = array(
        'classname' => 'petrosoft_message_widget',
        'description' => 'Petrosoft message widget',
      );
      parent::__construct( 'petrosoft_message_widget', 'Petrosoft Message Widget', $widget_ops );
    }

    /**
    * Outputs the content of the widget
    *
    * @param array $args
    * @param array $instance
    */
    public function widget( $args, $instance ) {
      // outputs the content of the widget
       if ( ! isset( $args['widget_id'] ) ) {
        $args['widget_id'] = $this->id;
      }
      
      // widget ID with prefix for use in ACF API functions
      $widget_id = 'widget_' . $args['widget_id'];
      

      $fields = get_field( 'message_widget', $widget_id );
      $fields['title'] = str_replace(" ","-", $fields['title']);
      
      ob_start();
      set_query_var('widget_data', array('args' => $args, 'fields' => $fields));
      get_template_part('template-parts/widgets/petrosoft-message-widget');
      $content = ob_get_contents();
      ob_end_clean();
      
      print $content;
    }
    
        /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
    	// outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
    	// processes widget options to be saved
    }
  }

}

/**
 * Register Widget
 */
function register_petrosoft_message_widget()
{
  register_widget( 'PetrosoftMessageWidget' );
}
add_action( 'widgets_init', 'register_petrosoft_message_widget' );

