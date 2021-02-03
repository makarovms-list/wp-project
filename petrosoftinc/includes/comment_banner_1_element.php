<?php

class Comment_Banner_1_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Comment banner 1';
  public static $description = 'Comment banner 1 image on left side + name';
  public static $template = 'template-parts/elements/comment-banner-1';
  
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
          'type' => 'attach_image',
          'holder' => 'img',
          'heading' => __( 'Image', 'text-domain' ),
          'param_name' => 'image',
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'attach_image',
          'holder' => 'img',
          'heading' => __( 'Mobile Image', 'text-domain' ),
          'param_name' => 'mobile_image',
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Name', 'text-domain' ),
          'param_name' => 'name',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
      ),
    );
  }  
}

new Comment_Banner_1_Element;