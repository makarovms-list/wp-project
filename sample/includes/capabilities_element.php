<?php

class Capabilities_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Capabilities';
  public static $description = 'Capabilities';
  public static $fields = array(
    'capabilities'
  );
  public static $template = 'template-parts/elements/capabilities';
}

new Capabilities_Element;
