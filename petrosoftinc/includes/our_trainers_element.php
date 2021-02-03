<?php

class Our_Trainers_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Our Trainers';
  public static $description = 'Our Trainers';
  public static $fields = array(
    'our_trainers'
  );
  public static $template = 'template-parts/elements/our-trainers';
}

new Our_Trainers_Element;
