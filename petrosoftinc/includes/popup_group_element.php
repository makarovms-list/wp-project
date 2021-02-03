<?php

class Popup_Group_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Pop-up group';
  public static $description = 'Pop-up group';
  public static $fields = array('popup_group');
  public static $template = 'template-parts/elements/popup-group';
}

new Popup_Group_Element;
