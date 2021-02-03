<?php

class Hear_From_Our_Employees_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Hear From Our Employees';
  public static $description = 'Hear From Our Employees';
  public static $fields = array(
    'hear_from_our_employees'
  );
  public static $template = 'template-parts/elements/hear-from-our-employees';
}

new Hear_From_Our_Employees_Element;
