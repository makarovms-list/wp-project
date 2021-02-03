<?php

class Test_Single_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Test single';
  public static $description = 'Test single';
  public static $template = 'template-parts/elements/test-single';
  public static $shortcodeSuffix = '_shortcode';
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'Test_Single_Element_shortcode',
      'category' => 'Petrosoft text',
      'as_child' => array('only' => 'Test_Element_shortcode'),
      'content_element' => true,
      'params' => array(
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => 'Title',
          'param_name' => 'title',
          ),
        ),
    );
  }

  public static function modify_template_data(&$template_data) {
   // $template_data['element_fields']['titles'] = vc_param_group_parse_atts($template_data['element_fields']['titles']);
    
    $i = 1;
  } 
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Test_Single_Element_shortcode extends WPBakeryShortCode {
  }
}

new Test_Single_Element;