<?php

class How_It_Works_2_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'How It Works 2';
  public static $description = 'How It Works version 2 for QwickServe Curbside Pickup page';
  public static $fields = array(
    'how_it_works_2'
  );
  public static $template = 'template-parts/elements/how-it-works-2';
}

new How_It_Works_2_Element;
