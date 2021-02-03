<?php

class Our_Team_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Our Team';
  public static $description = 'Our Team';
  public static $fields = array(
    'our_team'
  );
  public static $template = 'template-parts/elements/our-team';
}

new Our_Team_Element;
