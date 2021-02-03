<?php

class Resource_Block_Horizontal_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Resource block horizontal';
  public static $description = 'Resource block horizontal';
  public static $template = 'template-parts/elements/resource-block-horizontal';
  
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft text',
      'params' => array(
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
          'heading' => __( 'Category', 'text-domain' ),
          'param_name' => 'category',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Category link', 'text-domain' ),
          'param_name' => 'category_link',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
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
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Link text', 'text-domain' ),
          'param_name' => 'link_text',
          'value' => __( 'DOWNLOAD', 'text-domain' ),
          'admin_label' => false,
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

new Resource_Block_Horizontal_Element;