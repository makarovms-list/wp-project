<?php 
$case_studies_field = get_field('case_studies_fields');
if (isset($case_studies_field['file']['url'])) {
  $link = $case_studies_field['file']['url'];
  $file_link = true;
} else {
  $file_link = false;
  $link = $case_studies_field['link'];
}
if (isset($case_studies_field['has_page']) && $case_studies_field['has_page']) {
  $link = get_permalink(get_the_ID());
}
?>  
<div class="wpb_wrapper vc_row wpb_row vc_inner vc_row-fluid case-studies-archive-post archive-post post-<?php print get_the_ID()?>">
      <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-12 vc_col-xs-12">
        <div class="vc_column-inner">
          <div class="wpb_wrapper">
            <div class="p-image">
              <a class="p-image-link" target="_blank" href="<?php print $link; ?>">
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
              <a target="_blank" href="<?php print $link; ?>" class='p-title'><?php the_title(); ?></a>
              <a target="_blank" href="<?php print $link; ?>" class='p-text'><?php print strip_shortcodes(get_the_content(''));?></a>
              <?php if ($file_link): ?>
                <a class="p-more-link" target="_blank" href="<?php print $link; ?>"><span>Download</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
              <?php else: ?>
                <a class="p-more-link" target="_blank" href="<?php print $link; ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
              <?php endif; ?>  
            </div>  
          </div>
        </div>  
      </div>
  </div>