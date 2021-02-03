<?php

class Video_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Video';
  public static $description = 'Video';
  public static $template = 'template-parts/elements/video';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft text',
      'params' => array(
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
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Type', 'text-domain' ),
          'param_name' => 'type',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textarea',
          'holder' => 'div',
          'class' => 'wpc-text-class',
          'heading' => __( 'Description', 'text-domain' ),
          'param_name' => 'description',
          'value' => __( '', 'text-domain' ),
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
          'type' => 'attach_video',
          'holder' => 'div',
          'heading' => __( 'Video', 'text-domain' ),
            'param_name' => 'video',
            'admin_label' => false,
            'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Extra class name', 'text-domain' ),
          'param_name' => 'extra_class',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'group' => __( 'Design options', 'my-text-domain' ),
        ),
      ),
    );
  }  
}

new Video_Element;
