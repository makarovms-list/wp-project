<?php

class Contact_Person_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Contact person';
  public static $description = 'Contact person';
  public static $fields = array(
    'contact_person'
  );
  public static $template = 'template-parts/elements/contact-person';
}

new Contact_Person_Element;
