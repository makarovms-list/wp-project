<?php

class Social_Networks_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Social networks';
  public static $description = 'Social networks';
  public static $fields = array();
  public static $template = 'template-parts/elements/social-networks';
}

new Social_Networks_Element;
