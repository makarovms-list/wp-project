<?php

class Header_Row_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Header row';
  public static $description = 'Header row';
  public static $fields = array(
    'header_row'
  );
  public static $template = 'template-parts/elements/header-row';
}

new Header_Row_Element;
