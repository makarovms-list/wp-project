<?php if (isset($related_posts) && is_array($related_posts) && count($related_posts) > 0): ?>
<div class="related-posts-vertical">
    <div class="wpb-margin-bottom-32">
      <h3><?php print $related_posts_title ?></h3>
    </div>
    <?php foreach ($related_posts as $related_post): ?>
      <div class="related-post-wrapper">
        <div class="related-post">
          <div class="p-image">
            <a class="p-image-link" href="<?php print the_permalink($related_post->ID) ?>">
              <img alt="<?php print petrosoft_get_post_image_alt($related_post->ID);?>" src="<?php print kama_thumb_src('w=296&h=180&post_id='.$related_post->ID);?>" srcset="<?php print kama_thumb_src('w=592&h=360&post_id='.$related_post->ID);?> 2x">
            </a>
          </div>
          <div class="p-content">
              <a href="<?php print the_permalink($related_post->ID) ?>" class="p-date"><?php print get_the_date('M d, Y', $related_post->ID);?></a>
              <a href="<?php print the_permalink($related_post->ID) ?>" class='p-title'><?php print $related_post->post_title; ?></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>