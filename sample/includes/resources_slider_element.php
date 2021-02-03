<?php

class Resources_Slider_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Resources slider';
  public static $description = 'Resources slider';
  public static $fields = array(
    'resources_slider'
  );
  public static $template = 'template-parts/elements/resources-slider';
}

new Resources_Slider_Element;
