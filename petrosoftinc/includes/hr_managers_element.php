<?php

class Hr_Managers_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'HR managers';
  public static $description = 'HR managers';
  public static $fields = array(
    'hr_managers'
  );
  public static $template = 'template-parts/elements/hr-managers';
}

new Hr_Managers_Element;
