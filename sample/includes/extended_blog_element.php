<?php

class Extended_Blog_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Extended blog';
  public static $description = 'Extended blog';
  public static $fields = array();
  public static $template = 'template-parts/elements/extended-blog';
  
  public static function modify_template_data(&$template_data) {
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'numberposts' => 4,  
    );
    $template_data['blog_posts'] = get_posts($args);
  }
}

new Extended_Blog_Element;
