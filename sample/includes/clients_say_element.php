<?php

class Clients_Say_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Clients say';
  public static $description = 'Clients say';
  public static $fields = array(
    'clients_say'
  );
  public static $template = 'template-parts/elements/clients-say';
}

new Clients_Say_Element;
