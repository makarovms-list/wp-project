<?php

class Product_Features_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Product features';
  public static $description = 'Product features';
  public static $fields = array(
    'product_features'
  );
  public static $template = 'template-parts/elements/product-features';
}

new Product_Features_Element;
