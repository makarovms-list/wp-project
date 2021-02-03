<?php

class Clients_Slider_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Clients slider';
  public static $description = 'Clients slider';
  public static $fields = array(
    'clients_slider'
  );
  public static $template = 'template-parts/elements/clients-slider';
}

new Clients_Slider_Element;
