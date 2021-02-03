<?php 
  $newsletters_fields = get_field('newsletters_fields');
?> 
  <div class="wpb_wrapper vc_row wpb_row vc_inner vc_row-fluid newsletters-archive-post archive-post post-<?php print get_the_ID()?>">
      <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-12 vc_col-xs-12">
        <div class="vc_column-inner">
          <div class="wpb_wrapper">
            <div class="p-image">
              <a class="p-image-link" href="<?php print the_permalink(get_the_ID()) ?>">
                <img alt="<?php print $newsletters_fields['catalog_image']['alt'];?>" src="<?php print kama_thumb_src(array('src' => $newsletters_fields['catalog_image']['url'],'w' => 170,'h' => 232))?>" srcset="<?php print kama_thumb_src(array('src' =>  $newsletters_fields['catalog_image']['url'],'w' => 340,'h' => 464));?> 2x">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-8 vc_col-md-12 vc_col-xs-12" >
        <div class="vc_column-inner">
          <div class="wpb_wrapper">
            <div class="post-content">
              <a href="<?php print isset($term_list[0]->slug) ? '/toolkits?taxonomy=newsletters_category&taxonomy_terms='.$term_list[0]->slug.'&taxonomy_operator=IN' : the_permalink(get_the_ID());?>" class="p-type"><?php print isset($term_list[0]->slug) ? $term_list[0]->name : 'Newsletters';?></a>
              <a href="<?php print the_permalink(get_the_ID()) ?>" class='p-title'><?php the_title(); ?></a>
              <a href="<?php print the_permalink(get_the_ID()) ?>" class='p-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('')), 98, '...' );?></a>
              <a class="p-more-link" href="<?php print the_permalink(get_the_ID()) ?>"><span>DOWNLOAD</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
            </div>  
          </div>
        </div>  
      </div>
  </div>