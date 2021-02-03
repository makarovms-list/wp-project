<?php

class Benefits_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Benefits';
  public static $description = 'Benefits';
  public static $fields = array(
    'benefits'
  );
  public static $template = 'template-parts/elements/benefits';
}

new Benefits_Element;
