<?php

class Integrations_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Integrations';
  public static $description = 'Integrations';
  public static $fields = array(
    'integrations',
  );
  public static $template = 'template-parts/elements/integrations';
}

new Integrations_Element;
