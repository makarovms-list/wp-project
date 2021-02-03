<?php

class Related_Products_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Related products';
  public static $description = 'Related products';
  public static $fields = array(
    'related_products'
  );
  public static $template = 'template-parts/elements/related-products';
}

new Related_Products_Element;
