<?php

class Banner_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Banner';
  public static $description = 'Banner';
  public static $fields = array(
    'banner'
  );
  public static $template = 'template-parts/elements/banner';
}

new Banner_Element;
