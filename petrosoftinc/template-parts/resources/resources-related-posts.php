<?php
$post_categories = wp_get_post_categories(get_the_ID());
$args = array(
  'post_type' => 'resources',
  'post_status' => 'publish',
  'exclude' => get_the_ID(),
  'category' => $post_categories,
  'numberposts' => 1,  
);
$related_posts = get_posts($args);
$related_posts_title = 'Related Resources';
$categories = get_the_category();
?>
<div class="related-posts resources-related-posts">
  <div class="rp-title"><?php print $related_posts_title ?></div>
  <div class="rp-container">
    <?php foreach ($related_posts as $related_post): ?>
      <div class="rp-block">
        <a class="rp-image-link" href="<?php print the_permalink($related_post->ID) ?>">
          <picture>
            <source srcset="<?php print kama_thumb_src('w=360&h=465&post_id='.$related_post->ID);?>" media="(max-width: 1199px)">
            <img alt="<?php print petrosoft_get_post_image_alt($related_post->ID);?>" src="<?php print kama_thumb_src('w=270&h=349&post_id='.$related_post->ID);?>" srcset="<?php print kama_thumb_src('w=540&h=698&post_id='.$related_post->ID);?> 2x">
          </picture>
        </a>
        <a class='rp-block-title' href="<?php print the_permalink($related_post->ID) ?>"><?php print $related_post->post_title;?></a>
          <a href="<?php print get_category_link($categories[0]->cat_ID); ?>" style="background-color: <?php print get_term_meta($categories[0]->cat_ID, 'cc_color', true);?>" class="p-category-link"><?php print $categories[0]->name;?></a>
        <div class='rp-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('',false,$related_post->ID)), 30, '...' );?></div>
        <a class="rp-more-link" href="<?php print the_permalink($related_post->ID) ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
      </div>  
    <?php endforeach; ?>
  </div>
</div>
