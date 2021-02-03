<?php

class Petrosoft_H2_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Petrosoft H2';
  public static $description = 'Petrosoft H2 with description';
  public static $template = 'template-parts/elements/petrosoft_h2';
  
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
          'heading' => __( 'Subtitle', 'text-domain' ),
          'param_name' => 'subtitle',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Color',  "text-domain" ),
          'param_name' => 'color',
          'value' => array(
            __( 'Dark blue',  "text-domain"  ) => 'dark-blue',
            __( 'Blue',  "text-domain"  ) => 'blue',
            __( 'Red',  "text-domain"  ) => 'red',
            __( 'Lilac',  "text-domain"  ) => 'lilac',
            __( 'Green',  "text-domain"  ) => 'green',
            __( 'Orange',  "text-domain"  ) => 'orange',
            __( 'Transparent',  "text-domain"  ) => 'transparent',
          ),
          'std' => 'dark-blue',
          'weight' => 0,
          'save_always' => true,
        ),
      ),
    );
  }  
}

new Petrosoft_H2_Element;