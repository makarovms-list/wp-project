<?php
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'exclude' => get_the_ID(),
  'numberposts' => 3,  
  'meta_key' => 'post_views_count',
  'orderby' => 'meta_value_num',
  'order' => 'DESC'
);
$popular_posts = get_posts($args);
$popular_posts_title = 'Popular posts';
set_query_var( 'popular_posts', $popular_posts );
set_query_var( 'popular_posts_title', $popular_posts_title );

get_template_part('template-parts/single','popular-posts' );
?>
