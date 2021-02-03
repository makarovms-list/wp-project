<?php

class Pages_Catalog_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Pages Catalog';
  public static $description = 'Pages Catalog';
  public static $fields = array(
    'pages_catalog'
  );
  public static $template = 'template-parts/elements/pages-catalog';
  
}

new Pages_Catalog_Element;
