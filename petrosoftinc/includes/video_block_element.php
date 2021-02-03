<?php

class Video_Block_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Video Block';
  public static $description = 'Video block';
  public static $template = 'template-parts/elements/video-block';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft text',
      'params' => array(
        array(
            'type' => 'textfield',
            'holder' => 'h3',
            'class' => 'title-class',
            'heading' => __( 'Id', 'text-domain' ),
            'param_name' => 'id',
            'value' => __( 'video-block-'.wp_rand(0,10000), 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Title', 'text-domain' ),
          'param_name' => 'title',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'attach_image',
          'holder' => 'img',
          'heading' => __( 'Image', 'text-domain' ),
          'param_name' => 'image',
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
            'type'       => 'attach_video',
            'holder' => 'div',
            'heading' => __( 'Video', 'text-domain' ),
            'param_name' => 'video',
            'admin_label' => false,
            'weight' => 0,
        ),
      ),
    );
  }  
}

new Video_Block_Element;