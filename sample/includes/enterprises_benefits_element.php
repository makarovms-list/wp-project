<?php

class Enterprises_Benefits_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Enterprises benefits';
  public static $description = 'Enterprises benefits';
  public static $fields = array(
    'enterprises_benefits'
  );
  public static $template = 'template-parts/elements/enterprises-benefits';
}

new Enterprises_Benefits_Element;
