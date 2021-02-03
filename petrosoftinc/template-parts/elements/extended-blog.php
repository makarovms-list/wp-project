<div id="extended-blog-block" class="extended-blog-block">
  <div data-aos="fade-up" class="b-header">
    <h2 class="line-title dark-blue">Blog</h2>
    <a href="/blog" class="b-link"><span>Read More</span><svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
  </div>
  <div class="b-posts vc_row wpb_row vc_inner vc_row-fluid flex-row">
    <?php foreach($template_data['blog_posts'] as $blog_post): ?>
      <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-3 vc_col-md-4 vc_col-xs-12">
        <div class="vc_column-inner">
      <?php 
        $post_categories = wp_get_post_categories($blog_post->ID);
        $current_category = $post_categories[0];
        $category_data = get_category($post_categories[0]);
        $category_color = get_term_meta($post_categories[0], 'cc_color', true);
      ?>
          <div data-aos="flip-right" data-aos-duration="500" class="wpb_wrapper post post-<?php print $blog_post->ID?>">
            <div class="p-image">
              <a class="p-image-link" href="<?php print the_permalink($blog_post->ID) ?>">
                <picture>
                  <source srcset="<?php print kama_thumb_src('w=767&h=431&post_id='.$blog_post->ID);?>" media="(min-width: 481px) and (max-width: 767px)">
                  <source srcset="<?php print kama_thumb_src('w=440&h=248&post_id='.$blog_post->ID);?>" media="(max-width: 480px)">
                  <img alt="<?php print petrosoft_get_post_image_alt($blog_post->ID);?>" src="<?php print kama_thumb_src('w=296&h=166&post_id='.$blog_post->ID);?>" srcset="<?php print kama_thumb_src('w=592&h=332&post_id='.$blog_post->ID);?> 2x">
                </picture>
              </a>
              <a href="<?php print get_category_link($category_data->cat_ID); ?>" style="background-color: <?php print $category_color;?>" class="img-category-banner"><?php print $category_data->name;?></a>
            </div>
            <div class="p-date"><?php print get_the_date('M d, Y g:i a', $blog_post->ID);?></div>
            <a href="<?php print the_permalink($blog_post->ID);?>" class='p-title'><?php print $blog_post->post_title; ?></a>
            <div class='p-text'><?php print wp_trim_words(strip_shortcodes($blog_post->post_content), 20, '...' );?></div>
            <a class="p-more-link" href="<?php print the_permalink($blog_post->ID); ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
          </div> 
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
