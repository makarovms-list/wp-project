<div class="related-posts">
  <div class="vc_row wpb-paddign-top-0 wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
      <div class="vc_column-inner">
        <div class="wpb_wrapper">
          <h2><?php print $related_posts_title ?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="vc_row wpb_row vc_inner vc_row-fluid flex-row">
    <?php foreach ($related_posts as $related_post): ?>
      <?php $videos_fields = get_field('videos_fields', $related_post->ID); ?>
      <div class="related-post-wrapper wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
          <div class="vc_column-inner">
            <div class="wpb_wrapper related-post">
              <div class="p-image">
                <a class="p-image-link" href="<?php print the_permalink($related_post->ID) ?>">
                  <img alt="<?php print $videos_fields['catalog_image']['alt'];?>" src="<?php print kama_thumb_src(array('src' => $videos_fields['catalog_image']['url'],'w' => 296,'h' => 180))?>" srcset="<?php print kama_thumb_src(array('src' =>  $videos_fields['catalog_image']['url'],'w' => 592,'h' => 360));?> 2x">
                </a>
              </div>
              <div class="p-content">
                  <a href="<?php print the_permalink($related_post->ID) ?>" class="p-date"><?php print get_the_date('M d, Y', $related_post->ID);?></a>
                  <a href="<?php print the_permalink($related_post->ID) ?>" class='p-title'><?php print $related_post->post_title; ?></a>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
  </div>
</div>