<?php

class Custom_Popup_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Custom PopUp';
  public static $description = 'PopUp with custom content ';
  public static $template = 'template-parts/elements/custom-popup';
  
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
          'value' => __( 'custom-popup-'.wp_rand(0,10000), 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'group' => 'Listing',
        ),
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'class' => 'wpc-text-class',
          'heading' => __( 'Popup Content', 'text-domain' ),
          'param_name' => 'content',
          'value' => __( '', 'text-domain' ),
          'description' => __( 'Popup content', 'text-domain' ),
          'group' => 'Listing',
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Seconds to show', 'text-domain' ),
          'param_name' => 'time',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
          'group' => 'Listing',
        ),
      ),
    );
  }  
}

new Custom_Popup_Element;
