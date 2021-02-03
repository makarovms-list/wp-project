<?php

class Our_Values_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Our Values';
  public static $description = 'Our Values';
  public static $fields = array(
    'our_values'
  );
  public static $template = 'template-parts/elements/our-values';
}

new Our_Values_Element;
