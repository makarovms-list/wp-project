<?php

class Feature_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Feature';
  public static $description = 'Feature';
  public static $template = 'template-parts/elements/Feature';
  public static $shortcodeSuffix = '_shortcode';
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'Feature_Element_shortcode',
      'category' => 'Petrosoft text',
      'as_child' => array('only' => 'Features_Element_shortcode'),
      'content_element' => true,
      'custom_markup' => '<div class="vc_custom-element-container">Feature</div>',
      'params' => array(
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => 'Title',
          'param_name' => 'title',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => 'Tab title',
          'param_name' => 'tab_title',
        ),
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'class' => 'wpc-text-class',
          'heading' => __( 'Content', 'text-domain' ),
          'param_name' => 'content',
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
      ),
    );
  }
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Feature_Element_shortcode extends WPBakeryShortCode {
  }
}

new Feature_Element;