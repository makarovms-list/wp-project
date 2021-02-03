<?php

class Petrosoft_Popup_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Petrosoft PopUp';
  public static $description = 'Petrosoft PopUp';
  public static $template = 'template-parts/elements/popup';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft PopUps',
      'params' => array(
        array(
          'type' => 'textfield',
          'holder' => 'h3',
          'class' => 'title-class',
          'heading' => __( 'Id', 'text-domain' ),
          'param_name' => 'id',
          'value' => __( 'popup-'.wp_rand(0,10000), 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),          
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Seconds to show', 'text-domain' ),
          'param_name' => 'time',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type'       => 'attach_image',
          'holder' => 'img',
          'heading' => __( 'Image', 'text-domain' ),
          'param_name' => 'image',
          'admin_label' => false,
          'weight' => 0,
        ),  
        array(
          'type'       => 'attach_image',
          'holder' => 'img',
          'heading' => __( 'Retina image', 'text-domain' ),
          'param_name' => 'retina_image',
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type'       => 'attach_image',
          'holder' => 'img',
          'heading' => __( 'Background image', 'text-domain' ),
          'param_name' => 'background_image',
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
          "type" => "colorpicker",
          'holder' => 'div',
          "heading" => __( "Close button color", "text-domain" ),
          "param_name" => "close_color",
          "value" => '#3E74E7', 
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Title', 'text-domain' ),
          'param_name' => 'title',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'save_always' => true,
        ),
        array(
          "type" => "colorpicker",
          'holder' => 'div',
          "heading" => __( "Title color", "text-domain" ),
          "param_name" => "title_color",
          "value" => '#282e37', 
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Button label', 'text-domain' ),
          'param_name' => 'button_label',
          'value' => __( 'Download', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'save_always' => true,
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
            __( 'Transparent',  "text-domain"  ) => 'transparent',
          ),
          'std' => 'dark-blue',
          'weight' => 0,
          'save_always' => true,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Link', 'text-domain' ),
          'param_name' => 'link',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'save_always' => true,
        ),
      ),
    );
  }  
}

new Petrosoft_Popup_Element;