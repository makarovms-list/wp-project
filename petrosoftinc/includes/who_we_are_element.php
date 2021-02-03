<?php

class Who_We_Are_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Who we are';
  public static $description = 'Who we are';
  public static $fields = array(
    'who_we_are',
  );
  public static $template = 'template-parts/elements/who-we-are';
}

new Who_We_Are_Element;
