<?php
  $cat = get_query_var('cat');
  $category = get_category ($cat);
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => 2,  
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
  );
  if ($cat != 1) {
    $args['category'] = $cat;
    $page_title = $category->name;
  } else {
    $page_title = 'All Posts';
  }
  $featured_posts = get_posts($args);
?>
<?php if (count($featured_posts) > 0): ?>
  <h2 data-aos="fade-top" class="blog-line-title featured-title">Featured Posts</h2>
  <div class="featured-posts">
    <?php foreach ($featured_posts as $featured_post): ?>
      <?php 
        $post__not_in[] = $featured_post->ID;
        $post_categories = wp_get_post_categories($featured_post->ID);
        $current_category = $post_categories[0];
        $category_data = get_category($post_categories[0]);
        $category_color = get_term_meta($post_categories[0], 'cc_color', true);
      ?>
      <div class="featured-post">
        <div data-aos="fade-right"  class="fp-image" href="<?php print the_permalink($featured_post->ID) ?>">
          <a href="<?php print the_permalink($featured_post->ID) ?>">
            <picture>
              <source srcset="<?php print kama_thumb_src('w=1159&h=805&post_id='.$featured_post->ID);?>" media="(min-width: 481px) and (max-width: 1199px)">
              <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.$featured_post->ID);?>" media="(max-width: 480px)">
              <img alt="<?php print petrosoft_get_post_image_alt($featured_post->ID);?>" src="<?php print kama_thumb_src('w=555&h=385&post_id='.$featured_post->ID);?>" srcset="<?php print kama_thumb_src('w=1110&h=770&post_id='.$featured_post->ID);?> 2x">
            </picture>
          </a>   
          <a href="<?php print get_category_link($category_data->cat_ID); ?>" style="background-color: <?php print $category_color;?>" class="img-category-banner"><?php print $category_data->name;?></a>
        </div>
        <div data-aos="fade-left" class="fp-content">
          <div class="fp-date"><?php print get_the_date('M d, Y g:i a', $featured_post->ID);?></div>
          <div class="fp-title"><?php print $featured_post->post_title;?></div>
          <div class='fp-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('',false,$featured_post->ID)), 100, '...');?></div>
          <a class="fp-more-link" href="<?php print the_permalink($featured_post->ID) ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
        </div>
      </div>
    <?php endforeach;?>
  </div>
<?php endif; ?>
<h1 data-aos="fade-left" class="blog-line-title"><?php print $page_title ?></h1>
<div data-aos="fade-up" class="all-posts">
<?php 
  if (count($post__not_in) > 0) {
    $post__not_in = implode(',', $post__not_in);
  } else {
    $post__not_in = '';
  }
  print do_shortcode('[ajax_load_more seo="true" container_type="div" post_type="post" custom_args="alm_template:blog" posts_per_page="6" category="'.$category->slug.'" scroll="false" post__not_in="'. $post__not_in .'" button_label="Show More"]');
?>
</div>