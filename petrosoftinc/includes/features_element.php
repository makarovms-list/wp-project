<?php

class Features_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Features';
  public static $description = 'Features';
  public static $template = 'template-parts/elements/features';
  public static $shortcodeSuffix = '_shortcode';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'Features_Element_shortcode',
      'category' => 'Petrosoft text',
      'as_parent' => array('only' => 'Feature_Element_shortcode'),
      //  'as_parent' => array('except'),
      'is_container' => true,
      "js_view" 		=> 'VcColumnView',
      "content_element" => true,
      'params' => array(
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => 'Title',
          'param_name' => 'title',
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

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Features_Element_shortcode extends WPBakeryShortCodesContainer {
  }
}

new Features_Element;



