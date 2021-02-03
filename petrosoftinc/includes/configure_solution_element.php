<?php

class Configure_Solution_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Configure Solution';
  public static $description = 'Configure Solution';
  public static $fields = array(
    'configure_solution',
  );
  public static $template = 'template-parts/elements/configure-solution';
}

new Configure_Solution_Element;
