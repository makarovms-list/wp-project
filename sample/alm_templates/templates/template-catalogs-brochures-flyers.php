<?php 
  $catalogs_brochures_flyers_fields = get_field('catalogs_brochures_flyers_fields');
  $term_list = wp_get_post_terms(get_the_ID(),'cbf_category');
?>  
<div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12 archive-post">
  <div class="vc_column-inner">
    <div class="wpb_wrapper">
      <div class="post-content-wrapper">
        <div class="post-content">
          <div class="p-image">
            <a class="p-image-link" href="<?php print the_permalink(get_the_ID()) ?>">
              <img alt="<?php print $catalogs_brochures_flyers_fields['catalog_image']['alt'];?>" src="<?php print kama_thumb_src(array('src' => $catalogs_brochures_flyers_fields['catalog_image']['url'],'w' => 170,'h' => 232))?>" srcset="<?php print kama_thumb_src(array('src' =>  $catalogs_brochures_flyers_fields['catalog_image']['url'],'w' => 340,'h' => 464));?> 2x">
            </a>
          </div>
          <div class="post-fields">
            <?php if(isset($term_list[0]->slug)):?>
              <a href="<?php print '/catalogs-brochures-flyers?taxonomy=cbf_category&taxonomy_terms='.$term_list[0]->slug.'&taxonomy_operator=IN'?>" class="p-type"><?php print $term_list[0]->name; ?></a>
            <?php endif; ?>  
            <a href="<?php print the_permalink(get_the_ID()) ?>" class='p-title'><?php the_title(); ?></a>
          </div>
        </div>
        <a class="p-more-link" href="<?php print the_permalink(get_the_ID()) ?>"><span>DOWNLOAD</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
      </div>  
    </div>
  </div>
</div>