<div id="news-block" class="news-block">
  <div data-aos="fade-up" class="n-header">
    <h2 class="line-title dark-blue">News</h2>
    <a href="/news" class="n-link"><span>Read More</span><svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
  </div>
  <div class="vc_row wpb_row vc_inner vc_row-fluid flex-row n-posts">
    <?php foreach($template_data['news'] as $news_post): ?>
      <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-3 vc_col-md-4 vc_col-xs-12">
        <div class="vc_column-inner">
          <div data-aos="flip-right" data-aos-duration="500" class="post wpb_wrapper post-<?php print $news_post->ID?>">
            <div class="p-image">
              <a class="p-image-link" href="<?php print the_permalink($news_post->ID) ?>">
                <picture>
                  <source srcset="<?php print kama_thumb_src('w=767&h=431&post_id='.$news_post->ID);?>" media="(min-width: 481px) and (max-width: 767px)">
                  <source srcset="<?php print kama_thumb_src('w=440&h=248&post_id='.$news_post->ID);?>" media="(max-width: 480px)">
                  <img alt="<?php print petrosoft_get_post_image_alt($news_post->ID);?>" src="<?php print kama_thumb_src('w=296&h=166&post_id='.$news_post->ID);?>" srcset="<?php print kama_thumb_src('w=592&h=332&post_id='.$news_post->ID);?> 2x">
                </picture>
              </a>
            </div>
            <div class="p-date"><?php print get_the_date('M d, Y g:i a', $news_post->ID);?></div>
            <a href="<?php print the_permalink($news_post->ID) ?>" class='p-title'><?php print $news_post->post_title; ?></a>
            <div class='p-text'><?php print wp_trim_words(strip_shortcodes($news_post->post_content), 20, '...' );?></div>
            <a class="p-more-link" href="<?php print the_permalink($news_post->ID) ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
