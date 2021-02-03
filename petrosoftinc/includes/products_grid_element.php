<?php

class Products_Grid_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Products grid';
  public static $description = 'Products grid';
  public static $fields = array(
    'products_grid'
  );
  public static $template = 'template-parts/elements/products-grid';
}

new Products_Grid_Element;
