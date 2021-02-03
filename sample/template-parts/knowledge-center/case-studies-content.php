<?php
$taxonomy_string = '';
$fetured_args = array(
  'post_type' => 'case_studies',
  'post_status' => 'publish',
  'numberposts' => -1,
  'meta_query' => array(
    'relation' => 'AND',
     array(
      'key' => 'case_studies_fields_featured',
      'value' => true,
    ),
  ),
);
$featured_posts = get_posts($fetured_args);
$post__not_in = array();
foreach ($featured_posts as &$f_post) {
  $post__not_in[] = $f_post->ID;
  $case_studies_field = get_field('case_studies_fields', $f_post->ID);
  if (isset($case_studies_field['file']['url'])) {
    $f_post->link = $case_studies_field['file']['url'];
    $f_post->file_link = true;
  } else {
    $f_post->file_link = false;
    $f_post->link = $case_studies_field['link'];
  }
  if (isset($case_studies_field['has_page']) && $case_studies_field['has_page']) {
    $f_post->link = get_permalink($f_post->ID);
  }
}
if (count($post__not_in) > 0) {
  $post__not_in = implode(',', $post__not_in);
} else {
  $post__not_in = '';
}
?>

<div data-aos="fade-up" class="archive-posts-list">
<?php 
  print do_shortcode('[ajax_load_more seo="true" css_classes="" container_type="div" post_type="case_studies" custom_args="alm_template:case-studies" posts_per_page="12" '.$taxonomy_string.' scroll="false" post__not_in="'. $post__not_in .'" button_label="LOAD MORE"]');
?>
  
</div>
<?php if (is_array($featured_posts) && count($featured_posts) > 0):?>
  <div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
      <div class="vc_column-inner">
        <div class="wpb_wrapper">
           <h2>Featured</h2>
         </div>
       </div>
     </div>
  </div>

  <div class="archive-featured-posts-list">
    <div class="vc_row wpb_row vc_inner vc_row-fluid flex-row">
      <?php foreach ($featured_posts as $f_post): ?>
        <div class="archive-post-wrapper wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
          <div class="vc_column-inner">
            <div class="wpb_wrapper featured-post post-<?php $f_post->ID?>">
              <div class="p-image">
                <a class="p-image-link" target="_blank" href="<?php print $f_post->link; ?>">
                  <img alt="<?php print petrosoft_get_post_image_alt($f_post->ID);?>" src="<?php print kama_thumb_src('w=296&h=180&post_id='.$f_post->ID);?>" srcset="<?php print kama_thumb_src('w=592&h=360&post_id='.$f_post->ID);?> 2x">
                </a>
              </div>
              <div class="p-content">
                <div class="p-fields">
                  <a target="_blank" href="<?php print $f_post->link; ?>" class='p-title'><?php print $f_post->post_title; ?></a>
                  <a target="_blank" href="<?php print $f_post->link; ?>" class='p-text'><?php print strip_shortcodes(get_the_content('',false,$f_post->ID));?></a>
                </div>  
                <?php if ($f_post->file_link): ?>
                  <a class="p-more-link" target="_blank" href="<?php print $f_post->link; ?>"><span>Download</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
                <?php else: ?>
                  <a class="p-more-link" target="_blank" href="<?php print $f_post->link; ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
                <?php endif; ?>  
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div> 
  </div>
<?php endif; ?>
