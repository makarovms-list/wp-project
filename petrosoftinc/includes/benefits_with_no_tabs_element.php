<?php

class Benefits_With_No_Tabs_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Benefits with no tabs';
  public static $description = 'Benefits with no tabs';
  public static $fields = array(
    'benefits_with_no_tabs'
  );
  public static $template = 'template-parts/elements/benefits-with-no-tabs';
}

new Benefits_With_No_Tabs_Element;
