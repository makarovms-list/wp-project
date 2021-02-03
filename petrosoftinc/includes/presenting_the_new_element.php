<?php

class Presenting_The_New_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Presenting the new';
  public static $description = 'Presenting the new';
  public static $fields = array(
    'presenting_the_new',
  );
  public static $template = 'template-parts/elements/presenting-the-new';
}

new Presenting_The_New_Element;
