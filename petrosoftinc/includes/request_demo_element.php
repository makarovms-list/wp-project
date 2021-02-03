<?php

class Request_Demo_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Request a Demo';
  public static $description = 'Request a Demo';
  public static $template = 'template-parts/elements/request-demo';
   public static $fields = array(
    'request_demo'
  );
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft',
      'params' => array(         
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'First name label', 'text-domain' ),
          'param_name' => 'firstname_label',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'First name error', 'text-domain' ),
          'param_name' => 'firstname_error',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Last name label', 'text-domain' ),
          'param_name' => 'lastname_label',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Last name error', 'text-domain' ),
          'param_name' => 'lastname_error',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Phone label', 'text-domain' ),
          'param_name' => 'phone_label',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Phone error', 'text-domain' ),
          'param_name' => 'phone_error',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Email label', 'text-domain' ),
          'param_name' => 'email_label',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Email error', 'text-domain' ),
          'param_name' => 'email_error',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'heading' => __( 'Agree text', 'text-domain' ),
          'param_name' => 'agree_text',
          'value' => __( '', 'text-domain' ),
          'admin_label' => false,
          'weight' => 0,
        ),
      ),
    );
  }  
}

new Request_Demo_Element;