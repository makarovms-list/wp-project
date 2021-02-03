<?php

class Our_Solutions_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Our solutions';
  public static $description = 'Our solutions';
  public static $fields = array(
    'our_solutions'
  );
  public static $template = 'template-parts/elements/our-solutions';
}

new Our_Solutions_Element;
