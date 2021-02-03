<?php

class Main_Page_Banner_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Main Page Banner';
  public static $description = 'Main Page Banner Element';
  public static $fields = array(
    'main_page_banner'
  );
  public static $template = 'template-parts/elements/main-page-banner';
}

new Main_Page_Banner_Element;
