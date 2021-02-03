<div class="popular-posts">
    <div class="wpb-margin-bottom-32">
      <h2><?php print $popular_posts_title ?></h2>
    </div>
    <?php foreach ($popular_posts as $popular_post): ?>
      <div class="popular-post-wrapper">
        <div class="popular-post">
          <div class="p-image">
            <a class="p-image-link" href="<?php print the_permalink($popular_post->ID) ?>">
              <img alt="<?php print petrosoft_get_post_image_alt($popular_post->ID);?>" src="<?php print kama_thumb_src('w=296&h=180&post_id='.$popular_post->ID);?>" srcset="<?php print kama_thumb_src('w=592&h=360&post_id='.$popular_post->ID);?> 2x">
            </a>
          </div>
          <div class="p-content">
              <a href="<?php print the_permalink($popular_post->ID) ?>" class="p-date"><?php print get_the_date('M d, Y', $popular_post->ID);?></a>
              <a href="<?php print the_permalink($popular_post->ID) ?>" class='p-title'><?php print $popular_post->post_title; ?></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>