<?php

class Features_Links_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Features links';
  public static $description = 'Features links';
  public static $template = 'template-parts/elements/features-links';
  public static $shortcodeSuffix = '_shortcode';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'Features_Links_Element_shortcode',
      'category' => 'Petrosoft text',

      'params' => array(
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => 'Title',
          'param_name' => 'title',
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
            // params group
        array(
          'type' => 'param_group',
          'value' => '',
          'param_name' => 'features',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => 'Title',
              'param_name' => 'title',
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
              'type' => 'textfield',
              'value' => '',
              'heading' => 'Link',
              'param_name' => 'link',
            ),
            array(
              'type' => 'attach_image',
              'holder' => 'img',
              'heading' => __( 'Icon', 'text-domain' ),
              'param_name' => 'icon',
              'admin_label' => false,
              'weight' => 0,
            ),
          )
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


new Features_Links_Element;



