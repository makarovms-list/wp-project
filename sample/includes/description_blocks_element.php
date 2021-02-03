<?php

class Description_Blocks_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Description blocks';
  public static $description = 'Description blocks';
  public static $fields = array(
    'description_blocks'
  );
  public static $template = 'template-parts/elements/description-blocks';
  
}

new Description_Blocks_Element;
