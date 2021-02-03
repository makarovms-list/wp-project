<?php

class History_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'History';
  public static $description = 'History';
  public static $fields = array(
    'history'
  );
  public static $template = 'template-parts/elements/history';
  
}

new History_Element;
