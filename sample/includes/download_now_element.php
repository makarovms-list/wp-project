<?php

class Download_Now_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Download now';
  public static $description = 'Download now';
  public static $template = 'template-parts/elements/download-now';
  
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
          'type' => 'textarea',
          'holder' => 'div',
          'heading' => __( 'Description', 'text-domain' ),
          'param_name' => 'description',
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
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Link', 'text-domain' ),
          'param_name' => 'link',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
      ),
    );
  }  
}

new Download_Now_Element;