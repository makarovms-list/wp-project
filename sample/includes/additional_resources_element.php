<?php

class Additional_Resources_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Additional resources';
  public static $description = 'Additional resources';
  public static $fields = array(
    'additional_resources',
  );
  public static $template = 'template-parts/elements/additional-resources';
}

new Additional_Resources_Element;
