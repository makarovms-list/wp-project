<?php $term_list = wp_get_post_terms(get_the_ID(),'blog_category'); ?>
  <div class="wpb_wrapper vc_row wpb_row vc_inner vc_row-fluid blog-archive-post archive-post post-<?php print get_the_ID()?>">
      <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-12 vc_col-xs-12">
        <div class="vc_column-inner">
          <div class="wpb_wrapper">
            <div class="p-image">
              <a class="p-image-link" href="<?php print the_permalink(get_the_ID()) ?>">
                <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" src="<?php print kama_thumb_src('w=296&h=180&post_id='.get_the_ID());?>" srcset="<?php print kama_thumb_src('w=592&h=360&post_id='.get_the_ID());?> 2x">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-8 vc_col-md-12 vc_col-xs-12" >
        <div class="vc_column-inner">
          <div class="wpb_wrapper">
            <div class="post-content">
              <div class="p-status">
                <a href="<?php print the_permalink(get_the_ID()) ?>" class="p-date"><?php print get_the_date('M d, Y', get_the_ID());?></a>
                <?php if(isset($term_list[0]->slug)):?>
                 <div class="seperator">|</div> <a href="<?php print '/blog?taxonomy=blog_category&taxonomy_terms='.$term_list[0]->slug.'&taxonomy_operator=IN'?>" class="p-category"><?php print $term_list[0]->name; ?></a>
                <?php endif; ?>  
              </div>
              <a href="<?php print the_permalink(get_the_ID()) ?>" class='p-title'><?php the_title(); ?></a>
              <a href="<?php print the_permalink(get_the_ID()) ?>" class='p-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('')), 38, '...' );?></a>
              <a class="p-more-link" href="<?php print the_permalink(get_the_ID()) ?>"><span>Read more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
            </div>  
          </div>
        </div>  
      </div>
  </div>