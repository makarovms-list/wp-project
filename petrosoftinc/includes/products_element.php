<?php

class Products_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Products';
  public static $description = 'Products';
  public static $fields = array(
    'products'
  );
  public static $template = 'template-parts/elements/products';
  /**
   * get custom styles to block
   * @return boolean|string
   */
  public static function get_custom_styles() {
    $template_data = array('fields' => static::get_fields());
    $custom_styles = '';
    if(isset($template_data['fields']['products']['products_list'])) {
      foreach($template_data['fields']['products']['products_list'] as $index => $product) {
        $custom_styles.= ".products-block .products-slider .product-wrapper-{$index}:hover { box-shadow: 0 0px 13px ". hex2rgba($product['hover_color'],0.36)."} ";
      }
      return $custom_styles;
    } else {
      return false;
    }
  }
}

new Products_Element;

function petrosoft_products_element_styles() {
  $styles = Products_Element::get_custom_styles();
  if ($styles) {
    wp_add_inline_style('styles', $styles);
  }
}

add_action( 'wp_enqueue_scripts', 'petrosoft_products_element_styles' );