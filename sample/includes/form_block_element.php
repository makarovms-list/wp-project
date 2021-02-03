<?php

class Form_Block_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Form block';
  public static $description = 'Form block';
  public static $fields = array(
    'form_block'
  );
  public static $template = 'template-parts/elements/form-block';
}

new Form_Block_Element;