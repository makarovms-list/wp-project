<?php

class Product_Features_V2_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Product features v2';
  public static $description = 'Product features v2';
  public static $fields = array(
    'product_features'
  );
  public static $template = 'template-parts/elements/product-features-v2';
}

new Product_Features_V2_Element;
