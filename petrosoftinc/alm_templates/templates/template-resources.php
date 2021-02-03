
<?php $resource_tags = wp_get_post_terms(get_the_ID(), 'resource_tag'); ?>
<div class="archive-post-wrapper wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
  <div class="vc_column-inner">
    <div class="wpb_wrapper archive-post post-<?php print get_the_ID()?>">
      <div class="p-image">
        <a class="p-image-link" href="<?php print the_permalink(get_the_ID()) ?>">
          <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" src="<?php print kama_thumb_src('w=296&h=166&post_id='.get_the_ID());?>" srcset="<?php print kama_thumb_src('w=592&h=332&post_id='.get_the_ID());?> 2x">
        </a>
      </div>
      <a href="<?php print the_permalink(get_the_ID()) ?>" class="p-date"><?php print get_the_date('M d, Y g:i a', get_the_ID());?></a>
      <a href="<?php print the_permalink(get_the_ID()) ?>" class='p-title'><?php the_title(); ?></a>
      <?php if(count($resource_tags) > 0): ?>
        <div class="p-resource-tags">
          <?php foreach($resource_tags as $tag): ?>
            <a href="#" class="p-resource-tag">#<?php print $tag->name; ?></a> 
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <a href="<?php print the_permalink(get_the_ID()) ?>" class='p-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('')), 22, '...' );?></a>
     <a class="p-more-link" href="<?php print the_permalink(get_the_ID()) ?>"><span>Reed more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
    </div>
  </div>
</div> 