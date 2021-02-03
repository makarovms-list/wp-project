<?php

class Map_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Map';
  public static $description = 'Map';
  public static $fields = array(
    'map'
  );
  public static $template = 'template-parts/elements/map';
  
}

new Map_Element;
