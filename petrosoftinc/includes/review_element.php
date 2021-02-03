<?php

class Review_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Review';
  public static $description = 'Review';
  public static $template = 'template-parts/elements/review';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft text',
      'params' => array(
        array(
          'type' => 'textarea',
          'holder' => 'div',
          'class' => 'wpc-text-class',
          'heading' => __( 'Review', 'text-domain' ),
          'param_name' => 'review',
          'value' => __( '', 'text-domain' ),
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Name', 'text-domain' ),
          'param_name' => 'name',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Post', 'text-domain' ),
          'param_name' => 'post',
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

new Review_Element;
