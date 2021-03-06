<?php

class Side_Callout_Mobile_App_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Side Callout Mobile App';
  public static $description = 'Side Callout Mobile App';
  public static $template = 'template-parts/elements/side-callout-mobile-app';
  
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
          'heading' => __( 'Link title', 'text-domain' ),
          'param_name' => 'link_title',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Link App Store', 'text-domain' ),
          'param_name' => 'link_app_store',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Link Google Play', 'text-domain' ),
          'param_name' => 'link_google_play',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Link color',  "text-domain" ),
          'param_name' => 'link_color',
          'value' => array(
            __( 'Blue',  "text-domain"  ) => 'blue',
            __( 'Red',  "text-domain"  ) => 'red',
            __( 'Green',  "text-domain"  ) => 'green',
            __( 'Orange',  "text-domain"  ) => 'orange',
          ),
          'std' => 'blue',
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

new Side_Callout_Mobile_App_Element;