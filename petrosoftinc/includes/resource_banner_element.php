<?php

class Resource_Banner_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Resource Banner';
  public static $description = 'Resource download banner';
  public static $template = 'template-parts/elements/resource-banner';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft text',
      'params' => array(         
      array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'class' => 'wpc-text-class',
          'heading' => __( 'Content', 'text-domain' ),
          'param_name' => 'content',
          'value' => __( '', 'text-domain' ),
          'description' => __( 'Content', 'text-domain' ),
        ),
        array(
          "type" => "colorpicker",
          'holder' => 'div',
          "heading" => __( "Background color", "text-domain" ),
          "param_name" => "background_color",
          "value" => '#FFFFFF', 
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
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Button title', 'text-domain' ),
          'param_name' => 'button_title',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),  
        array(
          'type' => 'dropdown',
          'heading' => __( 'Button color',  "text-domain" ),
          'param_name' => 'button_color',
          'value' => array(
            __( 'Dark blue',  "text-domain"  ) => 'dark-blue',
            __( 'Blue',  "text-domain"  ) => 'blue',
            __( 'Red',  "text-domain"  ) => 'red',
            __( 'Lilac',  "text-domain"  ) => 'lilac',
            __( 'Green',  "text-domain"  ) => 'green',
            __( 'Orange',  "text-domain"  ) => 'orange',
          ),
          'std' => 'dark-blue',
          'weight' => 0,
          'save_always' => true,
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

new Resource_Banner_Element;