<?php
$taxonomy_string = petrosoft_get_taxonomy_filter_from_params();;
$fetured_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'numberposts' => -1,
  'meta_query' => array(
    'relation' => 'AND',
     array(
      'key' => 'blog_post_fields_featured',
      'value' => true,
    ),
  ),
);
$featured_posts = get_posts($fetured_args);
?>

<div data-aos="fade-up" class="archive-posts-list">
<?php 
  print do_shortcode('[ajax_load_more seo="true" css_classes="" container_type="div" post_type="post" custom_args="alm_template:blog" posts_per_page="12" '.$taxonomy_string.' scroll="false" button_label="LOAD MORE"]');
?>
</div>
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
              <a class="p-image-link" href="<?php print the_permalink($f_post->ID) ?>">
                <img alt="<?php print petrosoft_get_post_image_alt($f_post->ID);?>" src="<?php print kama_thumb_src('w=296&h=180&post_id='.$f_post->ID);?>" srcset="<?php print kama_thumb_src('w=592&h=360&post_id='.$f_post->ID);?> 2x">
              </a>
            </div>
            <div class="p-content">
              <div class="p-fields">
                <a href="<?php print the_permalink($f_post->ID) ?>" class="p-date"><?php print get_the_date('M d, Y', $f_post->ID);?></a>
                <a href="<?php print the_permalink($f_post->ID) ?>" class='p-title'><?php print $f_post->post_title; ?></a>
                <a href="<?php print the_permalink($f_post->ID) ?>" class='p-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('',false,$f_post->ID)), 22, '...');?></a>
              </div>  
              <a class="p-more-link" href="<?php print the_permalink($f_post->ID) ?>"><span>Read more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div> 
</div>