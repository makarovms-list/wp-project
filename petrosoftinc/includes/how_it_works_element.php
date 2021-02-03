<?php

class How_It_Works_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'How It Works';
  public static $description = 'How It Works';
  public static $fields = array(
    'how_it_works'
  );
  public static $template = 'template-parts/elements/how-it-works';
}

new How_It_Works_Element;
