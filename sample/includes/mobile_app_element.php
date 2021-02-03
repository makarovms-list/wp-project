<?php

class Mobile_App_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Mobile App';
  public static $description = 'Mobile App';
  public static $fields = array(
    'mobile_app',
  );
  public static $template = 'template-parts/elements/mobile-app';
}

new Mobile_App_Element;
