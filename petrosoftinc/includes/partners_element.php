<?php

class Partners_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Partners';
  public static $description = 'Partners';
  public static $fields = array(
    'partners'
  );
  public static $template = 'template-parts/elements/partners';
}

new Partners_Element;
