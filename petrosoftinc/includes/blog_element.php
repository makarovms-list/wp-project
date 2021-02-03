<?php

class Blog_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Blog';
  public static $description = 'Blog';
  public static $fields = array('blog');
  public static $template = 'template-parts/elements/blog';
  public static function modify_template_data(&$template_data) {
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'numberposts' => $template_data['fields']['blog']['number'],  
    );
    if ($template_data['fields']['blog']['order'] !== 'rand') {
      $args['orderby'] = 'date';
      $args['order'] = $template_data['fields']['blog']['order'];
    } else {
      $args['orderby'] = 'rand';
      $args['order'] = 'ASC';
    }
    if ($template_data['fields']['blog']['category'] != 'all') {
      $args['category'] = $template_data['fields']['blog']['category'];
    }
    $template_data['blog_posts'] = get_posts($args);
  }
}

new Blog_Element;
