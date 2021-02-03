<?php
$term_list = wp_get_post_terms(get_the_ID(),'news_category');
$args = array(
  'post_type' => 'news',
  'post_status' => 'publish',
  'exclude' => get_the_ID(),
  'numberposts' => 3,  
);
if (isset($term_list[0]->slug)) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'news_category',
      'field' => 'id',
      'terms' => $term_list[0]->term_id
    )
  );
}
$related_posts = get_posts($args);
$related_posts_title = 'Related News';
set_query_var( 'related_posts', $related_posts );
set_query_var( 'related_posts_title', $related_posts_title );

get_template_part('template-parts/single','related-posts-vertical' );
?>
