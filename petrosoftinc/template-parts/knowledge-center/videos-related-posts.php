<?php
$args = array(
  'post_type' => 'videos',
  'post_status' => 'publish',
  'exclude' => get_the_ID(),
  'numberposts' => 3,  
);
$related_posts = get_posts($args);
$related_posts_title = 'Related Materials';
set_query_var( 'related_posts', $related_posts );
set_query_var( 'related_posts_title', $related_posts_title );

get_template_part('template-parts/single','related-videos' );
?>
