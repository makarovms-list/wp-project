<?php

class Need_Help_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Need Help';
  public static $description = 'Need Help';
  public static $fields = array(
    'need_help'
  );
  public static $template = 'template-parts/elements/need-help';
}

new Need_Help_Element;
