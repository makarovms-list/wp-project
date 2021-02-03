<div id="blog-block" class="blog-block">
  <div class="b-header">
    <h2 class="line-title <?php print $template_data['fields']['blog']['title_color']?>"><?php print $template_data['fields']['blog']['title']?></h2>
    <a href="<?php print $template_data['fields']['blog']['read_more_link']?>" class="b-link"><span>Read More</span><svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
  </div>
  <div class="b-posts">
    <?php foreach($template_data['blog_posts'] as $blog_post): ?>
      <div data-aos-duration="500" class="post post-<?php print $blog_post->ID?>">
        <div class="p-image">
          <a class="p-image-link" href="<?php print the_permalink($blog_post->ID) ?>">
            <picture>
              <source srcset="<?php print kama_thumb_src('w=767&h=533&post_id='.$blog_post->ID);?>" media="(min-width: 481px) and (max-width: 767px)">
              <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.$blog_post->ID);?>" media="(max-width: 480px)">
              <img alt="<?php print petrosoft_get_post_image_alt($blog_post->ID);?>" src="<?php print kama_thumb_src('w=360&h=250&post_id='.$blog_post->ID);?>" srcset="<?php print kama_thumb_src('w=720&h=500&post_id='.$blog_post->ID);?> 2x">
            </picture>
          </a>
        </div>
        <div class="p-date"><?php print get_the_date('M d, Y g:i a', $blog_post->ID);?></div>
        <a href="<?php print the_permalink($blog_post->ID) ?>" class='p-title'><?php print $blog_post->post_title; ?></a>
        <div class='p-text'><?php print wp_trim_words(strip_shortcodes($blog_post->post_content), 40, '...' );?></div>
        <a class="p-more-link" href="<?php print the_permalink($blog_post->ID) ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
      </div> 
    <?php endforeach; ?>
  </div>
</div>
