<?php

class Partners_Catalog_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Partners catalog';
  public static $description = 'Partners catalog';
  public static $fields = array(
    'partners_catalog'
  );
  public static $template = 'template-parts/elements/partners-catalog';
}

new Partners_Catalog_Element;
