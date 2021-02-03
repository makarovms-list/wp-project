<?php

class Product_Description_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Product description';
  public static $description = 'Product description';
  public static $fields = array(
    'product_description',
    'product_description_position'
  );
  public static $template = 'template-parts/elements/product-description';
  public static function modify_template_data(&$template_data) {
    foreach ($template_data['fields']['product_description'] as $index => $slider) {
      if (!is_array($slider['slides'])) {
        unset($template_data['fields']['product_description'][$index]);
      }
    }
    if (!isset($template_data['fields']['product_description_position'])) {
      $template_data['fields']['product_description_position'] = 'right-side';
    }
    if ($template_data['fields']['product_description_position'] == 'right-side') {
      $template_data['position_even'] = 'right-side';
      $template_data['position_odd'] = 'left-side';
    } else {
      $template_data['position_even'] = 'left-side';
      $template_data['position_odd'] = 'right-side';
    }
    if ($template_data['fields']['product_description_position'] == 'right-side') {
      $template_data['animation_even'] = 'fade-right';
      $template_data['animation_odd'] = 'fade-left';
    } else {
      $template_data['animation_even'] = 'fade-left';
      $template_data['animation_odd'] = 'fade-right';
    }
  }
}

new Product_Description_Element;
