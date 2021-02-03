<?php

class Video_Popup_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Video PopUp';
  public static $description = 'Video popup ';
  public static $template = 'template-parts/elements/video-popup';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft PopUps',
      'params' => array(
        array(
          'type' => 'textfield',
          'holder' => 'h3',
          'class' => 'title-class',
          'heading' => __( 'Id', 'text-domain' ),
          'param_name' => 'id',
          'value' => __( 'video-popup-'.wp_rand(0,10000), 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'group' => 'Listing',
        ),
        array(
          'type' => 'textarea_raw_html',
          'holder' => 'div',
          'class' => 'wpc-text-class',
          'heading' => __( 'External video', 'text-domain' ),
          'param_name' => 'video_iframe',
          'value' => __( '', 'text-domain' ),
          'group' => 'Listing',
        ),
        array(
          'type'       => 'attach_video',
          'holder' => 'div',
          'heading' => __( 'Video', 'text-domain' ),
            'param_name' => 'video',
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Listing',
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Seconds to show', 'text-domain' ),
          'param_name' => 'time',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'group' => 'Listing',
        ),
      ),
    );
  }  
}

new Video_Popup_Element;
