<?php
$post_categories = wp_get_post_categories(get_the_ID());
$args = array(
  'post_type' => 'news',
  'post_status' => 'publish',
  'exclude' => get_the_ID(),
  'category' => $post_categories,
  'numberposts' => 3,  
);
$related_posts = get_posts($args);
$related_posts_title = 'Related News';
set_query_var( 'related_posts', $related_posts );
set_query_var( 'related_posts_title', $related_posts_title );

get_template_part('template-parts/single','related-posts' );
?>
