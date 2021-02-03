<?php

class Services_Plate_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Services plate';
  public static $description = 'Services plate';
  public static $fields = array(
    'services_plate'
  );
  public static $template = 'template-parts/elements/services-plate';
}

new Services_Plate_Element;

