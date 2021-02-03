<?php

class Our_Mission_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Our Mission';
  public static $description = 'Our Mission';
  public static $fields = array(
    'our_mission'
  );
  public static $template = 'template-parts/elements/our-mission';
  
}

new Our_Mission_Element;
