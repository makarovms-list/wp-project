<?php

class News_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'News';
  public static $description = 'News';
  public static $fields = array();
  public static $template = 'template-parts/elements/news';
  
  public static function modify_template_data(&$template_data) {
    $args = array(
      'post_type' => 'news',
      'post_status' => 'publish',
      'numberposts' => 4,  
    );
    $template_data['news'] = get_posts($args);
  }
}

new News_Element;
