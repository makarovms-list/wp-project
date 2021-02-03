<?php
get_header();

$fetured_args = array(
  'post_type' => 'news',
  'post_status' => 'publish',
  'numberposts' => 2,
  'meta_query' => array(
    'relation' => 'AND',
     array(
      'key' => 'news_post_fields_featured',
      'value' => true,
    ),
  ),
);
$featured_posts = get_posts($fetured_args);
?>
<div class="content archive-page knowledge-center news-archive side-block-page">
  <div class="container with-side-block-wrapper">
      <?php print petrosoft_get_knowledge_center_menu(); ?>
      <div class="content__text">
        <div class="vc_row wpb_row vc_row-fluid">
          <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
              <div class="wpb_wrapper">
                <div class="vc_row wpb-paddign-top-0 wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">
                        <?php
                          if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<div class="breadcrumbs" id="breadcrumbs">','</div>' );
                          }
                        ?>
                        <div class="archive-top-featured">
                          <?php if (isset($featured_posts) && is_array($featured_posts) && count($featured_posts) > 0): ?>  
                            <div class="vc_row wpb_row vc_row-fluid">
                              <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                  <div class="wpb_wrapper">
                                     <h2>Featured News</h2>
                                   </div>
                                 </div>
                               </div>
                            </div>
                            <div class="archive-featured-posts-list x2">
                              <div class="vc_row wpb_row vc_inner vc_row-fluid flex-row">
                                <?php foreach ($featured_posts as $f_post): ?>
                                  <?php $term_list = wp_get_post_terms($f_post->ID,'news_category'); ?>
                                  <div class="archive-post-wrapper wpb_column vc_column_container vc_col-sm-6 vc_col-lg-6 vc_col-md-6 vc_col-xs-12">
                                    <div class="vc_column-inner">
                                      <div class="wpb_wrapper featured-post post-<?php $f_post->ID?>">
                                        <div class="p-image">
                                          <a class="p-image-link" href="<?php print the_permalink($f_post->ID) ?>">
                                            <img alt="<?php print petrosoft_get_post_image_alt($f_post->ID);?>" src="<?php print kama_thumb_src('w=296&h=180&post_id='.$f_post->ID);?>" srcset="<?php print kama_thumb_src('w=592&h=360&post_id='.$f_post->ID);?> 2x">
                                          </a>
                                        </div>
                                        <div class="p-content">
                                          <div class="p-fields">
                                            <div class="p-status">
                                              <a href="<?php print the_permalink($f_post->ID) ?>" class="p-date"><?php print get_the_date('M d, Y', $f_post->ID);?></a>
                                                <?php if(isset($term_list[0]->slug)):?>
                                                <div class="seperator">|</div> <a href="<?php print '/news?taxonomy=news_category&taxonomy_terms='.$term_list[0]->slug.'&taxonomy_operator=IN'?>" class="p-category"><?php print $term_list[0]->name; ?></a>
                                               <?php endif; ?>  
                                            </div>
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
                          <?php endif; ?>
                        </div>
                        <h1>News</h1>
                        <?php print petrosoft_get_categories_block('news_category','/news'); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  get_template_part( 'template-parts/knowledge-center/news-content');
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<?php
get_footer();