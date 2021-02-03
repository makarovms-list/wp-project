<?php

class Test_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Test';
  public static $description = 'Test';
  public static $template = 'template-parts/elements/test';
  public static $shortcodeSuffix = '_shortcode';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'Test_Element_shortcode',
      'category' => 'Petrosoft text',
      'as_parent' => array('only' => 'Test_Single_Element_shortcode'),
      'is_container' => true,
      "js_view" 		=> 'VcColumnView',
      "content_element" => true,
      "show_settings_on_create" => false,

      'params' => array(
        array(
  'type' => 'textfield',
  'value' => '',
  'heading' => 'Title',
  'param_name' => 'simple_textfield',
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
  // params group
  array(
    'type' => 'param_group',
    'value' => '',
    'param_name' => 'titles',
    // Note params is mapped inside param-group:
    'params' => array(
      array(
      'type' => 'textfield',
      'value' => '',
      'heading' => 'Enter your title(multiple field)',
      'param_name' => 'title',
      ),
      array(
        'type' => 'attach_image',
        'holder' => 'img',
        'heading' => __( 'Image', 'text-domain' ),
        'param_name' => 'image',
        'admin_label' => false,
        'weight' => 0,
      ),
    )
  )
      ),
    );
  }

  public static function modify_template_data(&$template_data) {
   // $template_data['element_fields']['titles'] = vc_param_group_parse_atts($template_data['element_fields']['titles']);
    
    $i = 1;
  } 
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Test_Element_shortcode extends WPBakeryShortCodesContainer {
    public function customAdminBlockParams() {
      return '';
    }
  }
}

new Test_Element;



